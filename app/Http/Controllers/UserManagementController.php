<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($jenis)
    {
        $title = "Kelola Data User " . strtoupper($jenis);
        if ($jenis == "mahasiswa") {
            $users = Mahasiswa::with('user', 'prodi')->get();
        }else{
            $users = Dosen::with('user')->get();
        }

        return view('admin.users.index', compact('title', 'users', 'jenis'));
    }

    public function hapus(Request $request)
    {

        $query = User::where('id', $request->id_user)
            ->delete();

        if ($query) {
            if ($request->jenis == "mahasiswa") {
                Mahasiswa::where('id', $request->id)->delete();
            }else {
                Dosen::where('id', $request->id)->delete();
            }

            return redirect()->back()->with('success', 'Berhasil menghapus user');
        } else {
            return redirect()->back()->with('alert', 'Gagal menghapus user');
        }
    }

    public function resetpw(Request $request)
    {
        $query = User::where('id', $request->id)
            ->update([
                'password' => bcrypt($request->password)
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Password User berhasil diubah');
        } else {
            return redirect()->back()->with('alert', 'Password User gagal diubah');
        }
    }

    public function status(Request $request)
    {
        $ubah_status = "ON";
        if ($request->status == "ON") {
            $ubah_status = "OFF";
        }
        $query = Dosen::where('id', $request->id)
            ->update([
                'status' => $ubah_status
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Status dosen berhasil diubah');
        } else {
            return redirect()->back()->with('alert', 'Status dosen gagal diubah');
        }
    }
}
