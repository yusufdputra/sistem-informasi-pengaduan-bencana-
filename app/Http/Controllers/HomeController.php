<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Magang;
use App\Models\Peminjaman;
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

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        
        return view('home');
    }


    public function auth()
    {

        $title = "Dashboard";
        if (Auth::check()) {
            // get status daftar periode saat ini
            $status_daftar =  PeriodeController::cekPeriode();

            // get status magang periode saat ini
            $status_magang = Periode::where('mulai_magang', '<=', Carbon::now())
                ->where('akhir_magang', '>=', Carbon::now())
                ->first();

            if ($status_daftar != null) {
                $jml_daftar = Magang::where('id_periode', $status_daftar['id'])->count();
                $jml_selesai = Magang::where('id_periode', $status_daftar['id'])->where('status_pengajuan', 'selesai')->count();

            }else{
                $jml_daftar = 0;
                $jml_selesai = 0;
            }


            return view('home', compact('title', 'status_daftar', 'status_magang', 'jml_daftar','jml_selesai'));
        }
        // return view('auth.login', compact('title'));
        return view('welcome');
    }
}
