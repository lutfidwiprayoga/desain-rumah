<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function user()
    {
        return view('v_user');
    }

    // edit profil
    public function editprofil()
    {
        $data = 'My Profil';
        $tol = User::where('id', Auth::user()->id)->first();
        return view('frontend.v_change', compact('data', 'tol'));
    }

    // edit profil (post)
    public function ubahprofil(Request $request)
    {

        request()->validate([
            'foto' => 'mimes:jpg,jpeg,png|max:1000',
        ], [
            'foto.mimes' => 'Format harus Jpg,Jpeg,Png',
            'foto.max' => 'Maksimal 1MB',
        ]);

        $id_user = Auth::user()->id;
        $user = User::find($id_user);


        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
            $user->save;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->nik = $request->nik;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_rekening = $request->no_rekening;
        $user->profile = $request->profile;
        $user->save();
        return redirect()->route('profil.edit')->with('successData', 'Profil berhasil diperbarui');
    }
}
