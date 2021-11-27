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

            $data['total'] = Pengaduan::count();
            $data['selesai'] = Pengaduan::where('status', 'terima')->count();
            $data['proses'] = Pengaduan::where('status', 'proses')->count();
            $data['tolak'] = Pengaduan::where('status', 'tolak')->count();

            return view('home', compact('data',));
        }


        return view('home', compact('data'));
    }


    public function auth()
    {
        $data['title'] = "Halaman Utama";
        $data['pengaduan'] = Pengaduan::orderBy('updated_at', 'DESC')->limit(10)->get();
        if (Auth::check()) {
            $data['total'] = Pengaduan::count();
            $data['selesai'] = Pengaduan::where('status', 'terima')->count();
            $data['proses'] = Pengaduan::where('status', 'proses')->count();
            $data['tolak'] = Pengaduan::where('status', 'tolak')->count();

        }

        return view('home', compact('data',));
    }
}
