<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Data Sekolah";
        $sekolah = Sekolah::all();


        return view('admin.sekolah.index', compact('title', 'sekolah'));
    }

    public function store(Request $request)
    {
        // validasi
        $validasi = Sekolah::where('nama', strtoupper($request->nama))->first();
        if ($validasi != null) {
            return redirect()->back()->with('alert', 'Sekolah gagal disimpan. Nama Sekolah sudah terdaftar.');
        } 

        $where = [
            'id' => $request->id
        ];

        $values = [
            'nama' => strtoupper($request->nama),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];

        $query = Sekolah::updateOrInsert($where, $values);

        if ($query) {
            return redirect()->back()->with('success', 'Sekolah berhasil disimpan');
        } else {
            return redirect()->back()->with('alert', 'Sekolah gagal disimpan');
        }
    }

    public function hapus(Request $request)
    {
        $query = Sekolah::where('id', $request->id)->delete();

        if($query){
            return redirect()->back()->with('success', 'Berhasil menghapus Sekolah');
        }else{
            return redirect()->back()->with('alert', 'Gagal menghapus Sekolah');
        }
    }
}
