<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desain;
use App\Models\Desainer;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function pemesanan()
    {
        $latests = Desain::latest()->get();
        $kategoris = Kategori::orderBy('nama', 'asc')->get();
        $user = User::where('level', '2')->get();
        return view('frontend.v_pemesanan_new', compact('latests', 'kategoris', 'user'));
    }

    // Detail Desain Frontend
    public function detailDesain($id)
    {
        $dd = Desain::with('user')->findOrFail($id);
        return view('frontend.v_detailDesain', compact('dd'));
    }

    public function infoDesainer($id)
    {
        $user_desainer = User::find($id);
        $produk = Desain::where('user_id', $user_desainer->id)->get();
        $desainer = Desainer::where('user_id', $user_desainer->id)->get();
        return view('frontend.v_info_desainer', compact('produk', 'user_desainer', 'desainer'));
    }
}
