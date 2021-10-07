<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\Mahasiswa;
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
        // if ($id_mhs == null) {
        //     $id_mhs = Mahasiswa::with('user')->where('id_user', Auth::user()->id)->first();
        // }
        $kuisioner = Kuisioner::with('mhs')->where('id_mahasiswa', $id_mhs)->get();
        if (Auth::user()->roles[0]['name'] == 'mahasiswa') {
            $mhs = Mahasiswa::with('user')->find($id_mhs)->first();

            return view('umum.kuisioner.form', compact('title', 'kuisioner', 'mhs'));
        }
        

    }
}
