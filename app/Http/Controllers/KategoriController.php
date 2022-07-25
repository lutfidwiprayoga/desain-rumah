<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Desain;

class KategoriController extends Controller
{
    public function index($id)
    {
        $latests = Desain::where('kategori_id', $id)->latest()->get();
        return view('frontend.v_kategori', compact('latests'));
    }
}
