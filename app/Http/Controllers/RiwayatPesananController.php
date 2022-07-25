<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        $carts = Cart::latest()->get();
        $transaksi = Transaksi::where('status_desainer', 'Diterima')->where('status_transaksi', 'Tervalidasi')->get();
        return view('backend.desainer.v_riwayatAcc', compact('carts', 'transaksi'));
    }
}
