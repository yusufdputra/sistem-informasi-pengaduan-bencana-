<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PDF;

class CetakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cetak($id)
    {
        setlocale(LC_ALL, 'IND');
        $data ['pengaduan'] = Pengaduan::with('warga', 'bencana', 'daerah')->find($id);

        $pdf = PDF::loadview('admin.cetak.satu', compact('data'))->setPaper('a4', 'potrait');

        return $pdf->stream();
        // return $pdf->download('pengajuan_'.$jenis_surat.'.pdf');
    }
}
