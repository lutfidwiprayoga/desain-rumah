<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Desain;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmPaymentController extends Controller
{

    public function index()
    {
        $cart = Cart::with('transaksi')
            ->join('transaksis', 'carts.transaksi_id', '=', 'transaksis.id')
            ->get();
        return view('layout_admin.v_validasi', compact('cart'));
    }


    public function accpayment($id)
    {
        $keranjang = Cart::find($id);
        $transaksi = Transaksi::where('id', $id)->first();
        // dd($transaksi);
        $transaksi->status_transaksi = 'Tervalidasi';
        $transaksi->save();
        return redirect()->back();
    }

    public function declinepayment($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->status_transaksi = 'Ditolak';
        $transaksi->save();
        return redirect()->back();
    }
}
