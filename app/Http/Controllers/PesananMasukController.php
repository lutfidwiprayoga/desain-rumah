<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PesananMasukController extends Controller
{
    public function index($id)
    {
        $carts = Cart::with(['transaksi'], ['desain'])->whereHas('transaksi', function ($query) {
            return $query->where('acc', '=', null);
        })->find($id);
        return view('backend.desainer.v_validasi', compact('carts'));
    }


    public function accdesain($id)
    {
        $cart = Cart::find($id);
        $transaksi = Transaksi::where('id', $cart->transaksi_id)->first();
        // dd($transaksi);
        $transaksi->status_desainer = 'Diterima';
        $transaksi->status_revisi = 'Proses';
        $transaksi->acc = 1;
        $transaksi->save();
        return redirect()->back();
    }

    public function declinedesain($id)
    {
        $cart = Cart::find($id);
        $transaksi = Transaksi::where('id', $cart->transaksi_id)->first();
        $transaksi->status_desainer = 'Ditolak';
        $transaksi->acc = 1;
        $transaksi->save();
        return redirect()->back();
    }
}
