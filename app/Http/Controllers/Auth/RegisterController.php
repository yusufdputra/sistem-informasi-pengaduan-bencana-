<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }



    public function mahasiswa(Request $request)
    {
        // validasi
        $rules = [
            'nomor_induk' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:5'
        ];
        $pesan = [
            'nomor_induk.unique' => "Nomor induk sudah terdaftar",
            'email.unique' => "Email sudah terdaftar",
            'password.min' => "Minimal 5 karakter",
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // simpan ke user
        $user = new User();
        $user->nomor_induk = $request->nomor_induk;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        //tambah ke role
        $user->assignRole('mahasiswa');
        // simpan ke mhs
        $mhs = Mahasiswa::insert([
            'id_user' => $user->id,
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'id_prodi' => $request->id_prodi,
            'kelas' => $request->kelas,
            'nomor_hp' => $request->nomor_hp,
            'created_at' => Carbon::now(),
        ]);

        if ($mhs || $user) {
            Auth::login($user);
            return redirect()->route('/');
        } else {
            return redirect()->back()->with('alert', 'Akun gagal dibuat');
        }
    }

    public function dosen(Request $request)
    {
        // validasi
        $rules = [
            'nomor_induk' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:5'
        ];
        $pesan = [
            'nomor_induk.unique' => "Nomor induk sudah terdaftar",
            'email.unique' => "Email sudah terdaftar",
            'password.min' => "Minimal 5 karakter",
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // simpan ke user
        $user = new User();
        $user->nomor_induk = $request->nomor_induk;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        //tambah ke role
        $user->assignRole('dosen');
        // simpan ke mhs
        $dsn = Dosen::insert([
            'id_user' => $user->id,
            'nama' => $request->name,
            'id_prodi' => $request->id_prodi,
            'keterangan' => $request->keterangan,
            'nomor_hp' => $request->nomor_hp,
            'status' => "ON",
            'created_at' => Carbon::now(),
        ]);

        if ($dsn || $user) {
            Auth::login($user);
            return redirect()->route('/');
        } else {
            return redirect()->back()->with('alert', 'Akun gagal dibuat');
        }
    }
}
