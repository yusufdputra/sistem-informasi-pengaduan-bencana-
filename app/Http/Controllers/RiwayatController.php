<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Riwayat Magang Mahasiswa";
        $riwayat = Magang::with('mhs', 'dsn')
            ->where('status_pengajuan', '=', 'selesai')
            ->where('nilai_pembimbing', '!=', NULL)
            ->orderBy('id_periode', 'DESC')
            ->get();
        return view('admin.riwayat.index', compact('title', 'riwayat'));
    }
}
