<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $this->middleware('auth');
    $data['title'] = "Arsip Pengaduan Bencana";
    $data['pengaduan'] = Pengaduan::with('bencana', 'daerah', 'warga')
      ->where('status', 'terima')
      ->orderBy('updated_at', 'DESC')
      ->get();


    return view('admin.arsip.index', compact('data'));
  }
}
