<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Magang;
use App\Models\Peminjaman;
use App\Models\Pengaduan;
use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data['title'] = "Halaman Utama";

        if (Auth::check()) {

            $data['pengaduan'] = Pengaduan::orderBy('updated_at', 'DESC')->limit(10)->get();

            // $pengajuan['selesai'] = Pengajuan::where('status', 'selesai')->count();
            // $pengajuan['proses'] = Pengajuan::where('status', 'proses')->count();

            return view('home', compact('data',));
        }


        return view('home', compact('data'));
    }


    public function auth()
    {
        $data['title'] = "Halaman Utama";
        $data['pengaduan'] = Pengaduan::orderBy('updated_at', 'DESC')->limit(10)->get();

        return view('home', compact('data',));
    }
}
