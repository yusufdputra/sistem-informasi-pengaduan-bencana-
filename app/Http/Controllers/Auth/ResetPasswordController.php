<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reset(Request $request)
    {
        if (Hash::check($request->pass_lama, Auth::user()->password)) {
            User::where('id', Auth::user()->id)->update([
                'password' => bcrypt($request->pass_baru),
                'updated_at' => Carbon::now()
            ]);          
            return redirect()->back()->with('success', 'Berhasil mengubah kata sandi.');
        }
        return redirect()->back()->with('alert', 'Kata sandi lama tidak sesuai.');
    }
}
