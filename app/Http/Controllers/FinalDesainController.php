<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalDesainController extends Controller
{
    public function index()
    {
        $selesai = Cart::with(['transaksi'], ['desain'])
            ->where('user_id', Auth::user()->id)
            ->join('transaksis', 'carts.transaksi_id', '=', 'transaksis.id')
            ->join('progres', 'carts.id', '=', 'progres.cart_id')
            ->where('transaksis.status_revisi', '=', 'Selesai')
            ->get();
        return view('backend.konsumen.v_selesai', compact('selesai'));
    }
}
