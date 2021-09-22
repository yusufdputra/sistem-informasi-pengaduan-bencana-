<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
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


    public function auth()
    {

        $title = "Dashboard";
        if (Auth::check()) {
            // get status daftar periode saat ini
            $status_daftar = Periode::where('mulai_daftar', '<=', Carbon::now())
                ->where('akhir_daftar', '>=', Carbon::now())
                ->first();

            // get status magang periode saat ini
            $status_magang = Periode::where('mulai_magang', '<=', Carbon::now())
                ->where('akhir_magang', '>=', Carbon::now())
                ->first();

            return view('home', compact('title', 'status_daftar', 'status_magang'));
        }
        return view('auth.login', compact('title'));
    }
}
