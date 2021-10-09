<?php

namespace App\Http\Controllers;

use App\Models\Lookbook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LookBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id_pengajuan)
    {
        $title = "Lookbook";
        $lookbooks = Lookbook::where('id_magang', $id_pengajuan)->get();

        return view('mahasiswa.lookbook.index', compact('title', 'lookbooks', 'id_pengajuan'));
    }

    public function store(Request $request)
    {
        // upload file pdf
        try {
            // upload file baru
            $file = $request->file('file_laporan');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file_path = $file->storeAs('uploads/lookbook', $file_name, 'public');

            $query = Lookbook::insert([
                'id_magang'      => $request->id_pengajuan,
                'url_laporan'    => $file_path,
                'keterangan'     => $request->keterangan,
                'created_at'     => $request->tgl_kegiatan

            ]);
            if ($query) {
                return redirect()->back()->with('success', 'Berhasil ditambahkan');
            } else {
                return redirect()->back()->with('alert', 'Gagal ditambahkan');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Pengajuan magang gagal dikirim. Terjadi kesalahan saat upload file.');
        }
    }

    public function hapus(Request $request)
    {
        // hapus file
        try {
            unlink(storage_path('app/public/' . $request->url_laporan));
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Gagal menghapus Lookbook');
        }
        $query = Lookbook::where('id', $request->id)->delete();
        if($query){
            return redirect()->back()->with('success', 'Berhasil menghapus Lookbook');
        }else{
            return redirect()->back()->with('alert', 'Gagal menghapus Lookbook');
        }
    }
}
