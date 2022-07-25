<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Desain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.v_profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
        //     $user->foto = $request->file('foto')->getClientOriginalName();
        //     $user->save;
        // }
        $file_foto = Request()->foto;
        $filename = Request()->name . '.' . $file_foto->extension();
        $file_foto->move(public_path('foto'), $filename);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->foto = $filename;
        $user->save();
        return redirect()->back();
    }
}
