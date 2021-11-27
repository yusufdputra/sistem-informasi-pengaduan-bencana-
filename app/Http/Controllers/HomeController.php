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




    public function auth()
    {
        setlocale(LC_ALL, 'IND');
        $data['title'] = "Halaman Utama";
        $data['header'] = "Menu Layanan";
        $data['pengaduan'] = Pengaduan::orderBy('updated_at', 'DESC')->limit(10)->get();
        if (Auth::check()) {
            $data['header'] = "Rekap Pengaduan Bulan ".Carbon::now()->formatLocalized('%B %Y');
            $data['total'] = Pengaduan::whereMonth('updated_at', Carbon::now()->month)->count();
            $data['terima'] = Pengaduan::where('status', 'terima')->whereMonth('updated_at', Carbon::now()->month)->count();
            $data['proses'] = Pengaduan::where('status', 'proses')->whereMonth('updated_at', Carbon::now()->month)->count();
            $data['tolak'] = Pengaduan::where('status', 'tolak')->whereMonth('updated_at', Carbon::now()->month)->count();

        }

        return view('home', compact('data',));
    }
}
