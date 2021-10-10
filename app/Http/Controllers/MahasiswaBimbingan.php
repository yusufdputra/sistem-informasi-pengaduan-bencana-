<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaBimbingan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Mahasiswa Bimbingan";

        // dapatkan id dosen
        $id_dsn = Dosen::select('id')->where('id_user', Auth::user()->id)->first();
        $periode = PeriodeController::cekPeriode();

        // dapatkan data magang user mahasiswa
        if ($periode != null) {
            $mhs = Magang::with('mhs', 'sekolah')
                ->where('id_dosen', $id_dsn->id)
                ->where('id_periode', $periode->id)
                ->where('nilai_pembimbing', '=' , NULL)
                ->orderBy('updated_at', 'ASC')
                ->get();
        }else{
            $mhs = [];
        }


        return view('dosen.bimbingan.index', compact('title', 'mhs'));
    }

    public function inputNilai(Request $request)
    {
        $query = Magang::where('id', $request->id_pengajuan)
            ->update([
                'status_pengajuan'  => 'selesai',
                'nilai_pembimbing' => $request->nilai_pembimbing
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Nilai berhasil ditambahkan');
        } else {
            return redirect()->back()->with('alert', 'Nilai gagal ditambahkan');
        }
    }
}
