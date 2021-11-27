<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        setlocale(LC_ALL, 'IND');
    }

    public function index()
    {
        $data['title'] = "Kelola Data Admin ";

        $data['admin'] = User::select('id', 'username', 'created_at')
            ->whereHas(
                'roles',
                function ($admin) {
                    $admin->where('name', 'admin');
                }
            )->orderBy('created_at', 'DESC')->get();

        return view('admin.users.index', compact('data'));
    }

    public function store(Request $request)
    {
        // validasi
        $rules = [
            'username' => 'unique:users',
        ];
        $pesan = [
            'username.unique' => "username sudah terdaftar",
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->with('alert', "Username sudah terdaftar. Gunakan yang lain.");
        }
        $query = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        $query->assignRole('admin');

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menambah akun');
        } else {
            return redirect()->back()->with('alert', 'Gagal menambah akun');
        }
    }

    public function hapus(Request $request)
    {

        $query = User::where('id', $request->id)
            ->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus akun');
        } else {
            return redirect()->back()->with('alert', 'Gagal menghapus akun');
        }
    }

    public function resetpw(Request $request)
    {
        $query = User::where('id', $request->id)
            ->update([
                'password' => bcrypt($request->password)
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Kata sandi berhasil diubah');
        } else {
            return redirect()->back()->with('alert', 'Kata sandi gagal diubah');
        }
    }
}
