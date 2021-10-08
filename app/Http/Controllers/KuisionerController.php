<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuisionerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id_mhs = null)
    {
        $title = "Isi Kuisioner";
        // cek kuisioner dengan id mhs
        $kuisioner = Kuisioner::with('mhs')->where('id_mahasiswa', $id_mhs)->first();
        $jawaban = null;
        if ($kuisioner != null) {
            $jawaban = unserialize($kuisioner->jawaban);
        }

        $mhs = Mahasiswa::with('user')->find($id_mhs)->first();
        return view('umum.kuisioner.form', compact('title', 'kuisioner', 'mhs', 'jawaban'));
        // if (Auth::user()->roles[0]['name'] == 'mahasiswa') {

        // }
        
    }

    public function store(Request $request)
    {
        $where = [
            'id_mahasiswa' => $request->id_mahasiswa
        ];

        $jawaban = [
            $request->q_1,
            $request->q_2,
            $request->q_3,
            $request->q_4,
            $request->q_5,
            $request->q_6,
            $request->q_7,
            $request->q_8,
            $request->q_9,
            $request->q_10,
            $request->q_11,
            $request->q_12,
            $request->q_13,
            $request->q_14,
        ];

        $values = [
            'id_mahasiswa' => $request->id_mahasiswa,
            'jawaban' => serialize($jawaban),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $query = Kuisioner::updateOrInsert($where, $values);

        if ($query) {
            return redirect()->route('pengajuanMagang.tambah')->with('success', 'Pengisian kuisioner berhasil disimpan');
        } else {
            return redirect()->back()->with('alert', 'Pengisian kuisioner gagal disimpan');
        }
    }
}
