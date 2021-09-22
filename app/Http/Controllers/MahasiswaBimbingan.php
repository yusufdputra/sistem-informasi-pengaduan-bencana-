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
        
        // dapatkan data magang user mahasiswa
        $mhs = Magang::with('mhs')
            ->where('id_dosen', $id_dsn->id)
            ->orderBy('updated_at', 'ASC')
            ->get();


        return view('dosen.bimbingan.index', compact('title', 'mhs'));
    }
}
