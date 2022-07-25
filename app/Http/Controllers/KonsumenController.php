<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\User;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function __construct()
    {
        $this->Konsumen = new Konsumen();

        $this->middleware(['auth', 'verified']);
    }


    // All Data Konsumen
    public function konsumen()
    {
        $data = [
            'konsumen' => $this->Konsumen->allData(),
        ];
        $user = User::where('level', 3)->get();
        return view('v_konsumen', compact('user', 'data'));
    }

    // Detail Konsumen
    public function detail($id)
    {
        $data =  [
            'konsumen' => $this->Konsumen->detailData($id),
        ];
        return view('v_desainer', $data);
    }
}
