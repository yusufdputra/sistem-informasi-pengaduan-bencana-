<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Program Studi";
        $prodi = Prodi::all();


        return view('admin.prodi.index', compact('title', 'prodi'));
    }

    public function store(Request $request)
    {
        // validasi
        $validasi = Prodi::where('nama', strtoupper($request->nama))->first();
        if ($validasi != null) {
            return redirect()->back()->with('alert', 'Program studi gagal disimpan. Nama program studi sudah terdaftar.');
        } 

        $where = [
            'id' => $request->id
        ];

        $values = [
            'nama' => strtoupper($request->nama),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];

        $query = Prodi::updateOrInsert($where, $values);

        if ($query) {
            return redirect()->back()->with('success', 'Program studi berhasil disimpan');
        } else {
            return redirect()->back()->with('alert', 'Program studi gagal disimpan');
        }
    }

    public function hapus(Request $request)
    {
        $query = Prodi::where('id', $request->id)->delete();

        if($query){
            return redirect()->back()->with('success', 'Berhasil menghapus program studi');
        }else{
            return redirect()->back()->with('alert', 'Gagal menghapus program studi');
        }
    }
}
