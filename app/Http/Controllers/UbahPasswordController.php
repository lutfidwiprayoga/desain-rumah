<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{

    // @return void

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // @return \Illuminate\Contracts\Support\Renderable

    public function index()
    {
        return view('frontend.v_change');
    }

    public function ubahpass(Request $request)
    {
        $current_password = auth()->user()->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password lama harus diisi',
            'password.required' => 'Masukkan password baru',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi ulang password baru',
        ]);

        if (Hash::check($request->input('current_password'), $current_password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('successMsg', 'Password berhasil diganti');
        } else {
            return redirect()->back()->with('errorMsg', 'Password lama tidak sesuai');
        }
    }
}
