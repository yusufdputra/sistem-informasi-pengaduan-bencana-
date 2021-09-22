<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Periode Magang";
        $periode = Periode::orderBy('updated_at', 'DESC')->get();

        // get status daftar periode saat ini
        $status_daftar = Periode::where('mulai_daftar', '<=', Carbon::now())
            ->where('akhir_daftar', '>=', Carbon::now())
            ->first();

        // get status daftar periode saat ini
        $status_magang = Periode::where('mulai_magang', '<=', Carbon::now())
            ->where('akhir_magang', '>=', Carbon::now())
            ->first();


        return view('admin.periode.index', compact('title', 'periode', 'status_daftar', 'status_magang'));
    }

    public function store(Request $request)
    {
        // pendaftaran
        $daftar_start = date('Y-m-d', strtotime($request->daftar_start));
        $daftar_end = date('Y-m-d', strtotime($request->daftar_end));

        // magang
        $magang_start = date('Y-m-d', strtotime($request->magang_start));
        $magang_end = date('Y-m-d', strtotime($request->magang_end));

        $where = [
            'id' => $request->id
        ];

        $values = [
            'mulai_daftar' => $daftar_start,
            'akhir_daftar' => $daftar_end,
            'mulai_magang' => $magang_start,
            'akhir_magang' => $magang_end,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];
        
        $query = Periode::updateOrInsert($where, $values);

        if ($query) {
            return redirect()->back()->with('success', 'Periode berhasil disimpan');
        } else {
            return redirect()->back()->with('alert', 'Periode gagal disimpan');
        }
    }

    public function getPeriodeById($id)
    {
        $periode = Periode::where('id', $id)->first();
        $mulai_daftar = date('d-M-Y', strtotime($periode->mulai_daftar));
        $akhir_daftar = date('d-M-Y', strtotime($periode->akhir_daftar));
        $mulai_magang = date('d-M-Y', strtotime($periode->mulai_magang));
        $akhir_magang = date('d-M-Y', strtotime($periode->akhir_magang));
        return compact('mulai_daftar', 'akhir_daftar', 'mulai_magang', 'akhir_magang');
    }

    public function hapus(Request $request)
    {
        $query = Periode::where('id', $request->id)->delete();

        if($query){
            return redirect()->back()->with('success', 'Berhasil menghapus periode');
        }else{
            return redirect()->back()->with('alert', 'Gagal menghapus periode');
        }
    }
}
