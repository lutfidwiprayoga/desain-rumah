<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * 
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cart = Cart::get();
        $koclok = Cart::with(['transaksi'], ['desain'])->whereHas('transaksi', function ($query) {
            return $query->where('status_transaksi', '=', 'Pengajuan')->where('user_id', Auth::user()->id);
        })->get();
        if (Auth::user()->level == '1') {
            return view('v_home', compact('cart'));
        } elseif (Auth::user()->level == '2') {
            return view('backend.desainer.v_dashdesainer');
        } elseif (Auth::user()->level == '3') {
            return view('frontend.v_beranda', compact('koclok'));
        }
    }
}
