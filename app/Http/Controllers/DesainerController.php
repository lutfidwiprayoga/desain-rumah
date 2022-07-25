<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desainer;
use App\Models\User;

class DesainerController extends Controller
{
    public function __construct()
    {
        $this->Desainer = new Desainer();

        $this->middleware(['auth', 'verified']);
    }


    // All Data Desainer
    public function desainer()
    {
        $data =  [
            'desainer' => $this->Desainer->allData(),
        ];
        $user = User::where('level', 2)->get();
        return view('v_desainer', compact('user', 'data'));
    }

    // // Add Data
    // public function add()
    // {
    //     return view('backend.desainer.v_add_desainer');
    // }

    // public function insert()
    // {
    //     Request()->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users,email',
    //         'password' => 'required|max:8',
    //         'no_hp' => 'required|max:12',
    //         'alamat' => 'required',
    //         'nik' => 'required|unique:users,nik',
    //         'jenis_kelamin' => 'required',
    //         'foto' => 'required|mimes:jpg,jpeg,png|max:1000',
    //     ], [
    //         'name' => 'Wajib Diisi',
    //         'email' => 'Wajib Diisi',
    //         'email' => 'Email Sudah Digunakan',
    //         'no_hp' => 'Wajib Diisi',
    //         'alamat' => 'Wajib Diisi',
    //         'nik' => 'Wajib Diisi',
    //         'nik' => 'NIK Sudah Digunakan',
    //         'jenis_kelamin' => 'Wajib Diisi',
    //     ]);

    //     $file = Request()->foto;
    //     $fileName = Request()->email . '.' . $file->extension();
    //     $file->move(public_path('foto'), $fileName);

    //     $data = [
    //         'name' => Request()->name,
    //         'email' => Request()->email,
    //         'password' => Request()->password,
    //         'no_hp' => Request()->no_hp,
    //         'alamat' => Request()->alamat,
    //         'nik' => Request()->nik,
    //         'level' => Request()->level,
    //         'foto' => $fileName,
    //     ];

    //     $this->Desainer->addData($data);
    //     return redirect()->route('desainer')->with('pesan', 'Data Berhasil Ditambahkan');
    // }

    // //Detail Desainer
    public function detail($id)
    {
        $data =  [
            'desainer' => $this->Desainer->detailData($id),
        ];
        return view('v_desainer', $data);
    }

    // Delete Desainer
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('desainer')->with('pesan', 'Data berhasil dihapus');
    }
}
