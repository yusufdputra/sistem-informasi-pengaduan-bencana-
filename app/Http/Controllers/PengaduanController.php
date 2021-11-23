<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\Daerah;
use App\Models\Korban;
use App\Models\Pengaduan;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
  public function index()
  {
    $this->middleware('auth');
    $data['title'] = "Kelola Pengaduan Bencana";
    $data['pengaduan'] = Pengaduan::with('bencana', 'daerah', 'warga')->where('status', 'proses')->get();


    return view('admin.pengaduan.index', compact('data'));
  }

  public function detail($id)
  {
    $this->middleware('auth');
    $data['title'] = "Detail Pengaduan Bencana";
    $data['pengaduan'] = Pengaduan::with('bencana', 'daerah', 'warga')->where('id', $id)->first();
    $korban_arr = unserialize($data['pengaduan']->id_korban);

    $data['korban'] = [];
    foreach ($korban_arr as $key => $value) {
      $data['korban'][$key] = Korban::find($value);
    }


    return view('admin.pengaduan.detail', compact('data'));
  }

  public function tambah()
  {
    $data['title'] = "Form Pengaduan Bencana";
    $data['bencana'] = Bencana::all();
    $data['daerah'] = Daerah::all();
    $data['pengaduan'] = null;
    return view('pengaduan.form', compact('data'));
  }
  public function store(Request $request)
  {
    // validation
    $rules = PengaduanController::rules();
    $pesan = PengaduanController::msg();


    $validator = Validator::make($request->all(), $rules, $pesan);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    $target = "Pengaduan/" . $request->nik;
    try {
      // upload file ktp
      $uploadKTP = UploadFileController::cekFile($request->file('foto_ktp'), $request->foto_ktp_lama, $request->has('foto_ktp_lama'), $target);
      // upload sisi 1
      $uploadSisi1 = UploadFileController::cekFile($request->file('sisi_1'), $request->sisi_1_lama, $request->has('sisi_1_lama'), $target);
      // upload sisi 2
      $uploadSisi2 = UploadFileController::cekFile($request->file('sisi_2'), $request->sisi_2_lama, $request->has('sisi_2_lama'), $target);
      // upload sisi 3
      $uploadSisi3 = UploadFileController::cekFile($request->file('sisi_3'), $request->sisi_3_lama, $request->has('sisi_3_lama'), $target);
      // upload sisi 4
      $uploadSisi4 = UploadFileController::cekFile($request->file('sisi_4'), $request->sisi_4_lama, $request->has('sisi_4_lama'), $target);

      // simpan ke tabel warga

      $whereWarga = [
        'nik' => $request->nik
      ];

      $valuesWarga = [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'foto_ktp' => $uploadKTP,
        'created_at'   => Carbon::now(),
        'updated_at'   => Carbon::now(),
      ];

      $warga = Warga::updateOrInsert($whereWarga, $valuesWarga);

      // simpan ke tabel korban
      $dataKorban = [
        ['jenis' => 'meninggal', 'jumlah' => $request->jml_ninggal, 'keterangan' => $request->ket_ninggal],
        ['jenis' => 'luka', 'jumlah' => $request->jml_luka, 'keterangan' => $request->ket_luka],
        ['jenis' => 'hilang', 'jumlah' => $request->jml_hilang, 'keterangan' => $request->ket_hilang],
      ];

      foreach ($dataKorban as $key => $value) {
        $idKorban[] = Korban::insertGetId([
          'jenis' => $value['jenis'],
          'jumlah' => $value['jumlah'],
          'keterangan' => $value['keterangan'],
        ]);
      }


      $wherePengaduan = [
        'id' => $request->id
      ];

      if (!isset($request->bencana_lain)) {
        $bencana = null;
      } else {
        $bencana = $request->bencana_lain;
      }


      $valuesPengaduan = [
        'nik_warga' => $request->nik,
        'id_bencana' => $request->id_bencana,
        'bencana_lain' => $bencana,
        'id_daerah' => $request->id_daerah,
        'almt_lengkap' => $request->alamat_kjd,
        'tgl_kejadian' => $request->tgl_kejadian,
        'jam_kejadian' => $request->jam_kejadian,
        'penyebab' => $request->penyebab,
        'jns_kerusakan' => $request->jns_kerusakan,
        'penanggulangan' => $request->penanggulangan,
        'bantuan' => $request->bantuan,
        'kerugian' => $request->kerugian,
        'id_korban' => serialize($idKorban),
        'foto1' => $uploadSisi1,
        'foto2' => $uploadSisi2,
        'foto3' => $uploadSisi3,
        'foto4' => $uploadSisi4,
        'keterangan' => $request->keterangan,
        'status' => 'proses',
        'created_at'   => Carbon::now(),
        'updated_at'   => Carbon::now(),
      ];


      $pengaduan = Pengaduan::updateOrInsert($wherePengaduan, $valuesPengaduan);

      if ($pengaduan) {
        return redirect()->back()->with('success', 'Berhasil disimpan');
      } else {
        return redirect()->back()->with('alert', 'Gagal disimpan');
      }
    } catch (\Throwable $th) {

      return redirect()->back()->with('alert', 'Gagal disimpan. Terjadi kesalahan saat menyimpan gambar.' . $th);
    }
  }


  static function rules()
  {
    $rules = [
      'foto_ktp' => 'max:1024',
      'sisi_1' => 'max:1024',
      'sisi_2' => 'max:1024',
      'sisi_3' => 'max:1024',
      'sisi_4' => 'max:1024',
    ];
    return $rules;
  }

  static function msg()
  {
    $pesan = [
      'foto_ktp.max' => "Maksimal ukuran file 1MB",
      'sisi_1.max' => "Maksimal ukuran file 1MB",
      'sisi_2.max' => "Maksimal ukuran file 1MB",
      'sisi_3.max' => "Maksimal ukuran file 1MB",
      'sisi_4.max' => "Maksimal ukuran file 1MB",
    ];
    return $pesan;
  }

  public function updateStatus(Request $request )
  {
    $query = Pengaduan::where('id', $request->id)
      ->update([
        'status' => $request->status,
        'alasan_tolak' => $request->alasan_tolak
      ]);
    if ($query) {
      return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil di'.$request->status);
    } else {
      return redirect()->back()->with('alert', 'Ooppss... terjadi kesalahan');
    }
  }
}
