<?php

namespace App\Http\Controllers;

use App\Exports\PengaduanExport;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArsipController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    setlocale(LC_ALL, 'IND');
    $this->middleware('auth');
    $data['title'] = "Arsip Pengaduan Bencana";
    $data['pengaduan'] = Pengaduan::with('bencana', 'daerah', 'warga')
      ->where('status', 'terima')
      ->orderBy('updated_at', 'DESC')
      ->get();


    return view('admin.arsip.index', compact('data'));
  }

  public function rekap(Request $request)
  {
    // validasi
    $rules = [
      'range_tgl' => 'required',
    ];
    $pesan = [
      'range_tgl.unique' => "Anda harus memilih tanggal yang benar",
    ];
    $validator = Validator::make($request->all(), $rules, $pesan);
    if ($validator->fails()) {
      return redirect()->back()->with('alert', "Anda harus memilih tanggal yang benar");
    }
    return Excel::download(new PengaduanExport($request), 'arsip pengaduan.xlsx');
  }
}
