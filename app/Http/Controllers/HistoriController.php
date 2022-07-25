<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function histori()
    {
        $keranjang = Cart::with(['transaksi'], ['desain'])->whereHas('transaksi', function ($query) {
            return $query->where('status_transaksi', '=', 'Tervalidasi');
        })->get();
        return view('v_histori', compact('keranjang'));
    }

    public function detail($id)
    {
        $detail = Cart::find($id);
        return view('layout_admin.v_histrans', compact('detail'));
    }
}
