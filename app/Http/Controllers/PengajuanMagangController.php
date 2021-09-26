<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Magang;
use App\Models\Mahasiswa;
use App\Models\Periode;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanMagangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Pengajuan Magang";
        // get status daftar periode saat ini
        $status_daftar = Periode::where('mulai_daftar', '<=', Carbon::now())
            ->where('akhir_daftar', '>=', Carbon::now())
            ->first();

        // get status magang periode saat ini
        $status_magang = Periode::where('mulai_magang', '<=', Carbon::now())
            ->where('akhir_magang', '>=', Carbon::now())
            ->first();

        if (Auth::user()->roles[0]['name'] == 'mahasiswa') {
            // dapatkan id mahasiswa
            $id_mhs = Mahasiswa::select('id')->where('id_user', Auth::user()->id)->first();
            // dapatkan data magang user mahasiswa
            $pengajuan = Magang::with('mhs', 'dsn')
                ->where('id_mahasiswa', $id_mhs->id)
                ->orderBy('updated_at', 'DESC')
                ->get();

            // cek apakah sudah ada pengajuan di periode ini
            $status = Magang::where('id_mahasiswa', $id_mhs->id)
                ->whereBetween('created_at', [$status_daftar['mulai_daftar'], $status_daftar['akhir_daftar']])->first();

            return view('umum.pengajuan.index', compact('title', 'pengajuan', 'status_daftar','status_magang', 'status'));
        }
        if (Auth::user()->roles[0]['name'] == 'admin') {
            $pengajuan = Magang::with('mhs', 'dsn')
                ->where('status_pengajuan', '!=', 'selesai')
                ->orderBy('updated_at', 'DESC')
                ->get();
            return view('umum.pengajuan.index', compact('title', 'pengajuan', 'status_daftar','status_magang'));
        }
    }

    public function tambah()
    {
        $title = "Pengajuan Magang Baru";
        $dosen = Dosen::where('status', 'ON')->get();
        $prodi = Prodi::all();
        $mhs = Mahasiswa::with('user')->where('id_user', Auth::user()->id)->first();
        // get status daftar periode saat ini
        $periode = Periode::where('mulai_daftar', '<=', Carbon::now())
            ->where('akhir_daftar', '>=', Carbon::now())
            ->first();
        $pengajuan = null;
        if ($periode != null) {
            return view('mahasiswa.pengajuan.form', compact('title', 'pengajuan', 'dosen', 'prodi', 'mhs', 'periode'));
        }else{
            return redirect()->back()->with('alert', 'Waktu pendaftaran ditutup.');
        }
    }

    public function store(Request $request)
    {

        //cek apakah ada pengajuan yang masih di proses
        $validasi = Magang::where('id_mahasiswa', $request->id_mahasiswa)
            ->where('status_pengajuan', 'proses')
            ->first();
        if ($validasi != null) {
            return redirect()->back()->with('alert', 'Sudah ada pengajuan yang sedang di proses.');
        }

        try {
            // jika file sebelumnya ada dan tidak ada upload file baru
            if ($request->url_transkrip_lama != null && $request->trankrip == null) {
                $file_path =  $request->url_transkrip_lama;
            }

            // jika file sebelumnya ada dan ada upload baru
            else if ($request->trankrip != null) {
                if ($request->url_transkrip_lama != null) {
                    // hapus file yg lama
                    unlink(storage_path('app/public/' . $request->url_transkrip_lama));
                }
                // upload file baru
                $file = $request->file('trankrip');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file_path = $file->storeAs('uploads', $file_name, 'public');
                $file_path = $file_path;
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Pengajuan magang gagal dikirim. Terjadi kesalahan saat upload file.');
        }

        $where = [
            'id' => $request->id_pengajuan
        ];

        $nilai_matkul = [
            $request->nilai_matkul_1,
            $request->nilai_matkul_2,
            $request->nilai_matkul_3
        ];

        $values = [
            'id_mahasiswa'          => $request->id_mahasiswa,
            'nilai_matkul'          => serialize($nilai_matkul) ,
            'url_transkrip'         => $file_path,
            'ipk'                   => $request->ipk,
            'nama_sekolah'          => $request->nama_sekolah,
            'id_periode'            => $request->id_periode,
            'status_pengajuan'      => 'proses',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ];
        $query = Magang::updateOrInsert($where, $values);

        if ($query) {
            return redirect()->route('pengajuanMagang.index')->with('success', 'Pengajuan berhasil dikirim');
        } else {
            return redirect()->back()->with('alert', 'Pengajuan magang gagal dikirim');
        }
    }

    public function getPengajuanById($id)
    {
        return Magang::find($id);
    }

    public function detail($id)
    {
        $title = "Detail Pengajuan";
        $pengajuan = Magang::where('id', $id)->with('mhs', 'dsn')->first();
        $dosen = Dosen::where('status', 'ON')->get();

        // extract array nilai matkul
        $nilai_matkul = unserialize($pengajuan['nilai_matkul']);
        if (Auth::user()->roles[0]['name'] == 'admin') {
            return view('admin.pengajuan.detail', compact('title', 'pengajuan', 'dosen', 'nilai_matkul'));
        }
        if (Auth::user()->roles[0]['name'] == 'mahasiswa') {
            $prodi = Prodi::all();
            $mhs = Mahasiswa::with('user')->where('id_user', Auth::user()->id)->first();
            // get status daftar periode saat ini
            $periode = Periode::where('mulai_daftar', '<=', Carbon::now())
                ->where('akhir_daftar', '>=', Carbon::now())
                ->first();
            return view('mahasiswa.pengajuan.form', compact('title', 'pengajuan', 'dosen', 'mhs', 'periode', 'prodi', 'nilai_matkul'));
        }
    }

    public function proses(Request $request)
    {
        $query = Magang::where('id', $request->id_pengajuan)
            ->update([
                'status_pengajuan'  => $request->proses,
                'id_dosen'     => $request->id_dosen,
                'keterangan_status' => $request->keterangan
            ]);

        if ($query) {
            return redirect()->route('pengajuanMagang.index')->with('success', 'Pengajuan berhasil diproses');
        } else {
            return redirect()->back()->with('alert', 'Terjadi Kesalahan!');
        }
    }

    public function uploadLaporan(Request $request)
    {
        $query = Magang::where('id', $request->id_pengajuan)
            ->update([
                'status_pengajuan'  => 'selesai',
                'url_laporan' => $request->url_laporan
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Laporan berhasil diupload');
        } else {
            return redirect()->back()->with('alert', 'Laporan gagal diupload');
        }
    }
}
