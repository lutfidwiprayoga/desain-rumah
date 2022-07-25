<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Progres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresDesainController extends Controller
{
    public function index()
    {
        $cart = Cart::with(['transaksi'], ['desain'])->where('user_id', Auth::user()->id)->whereHas('transaksi', function ($query) {
            return $query->where('status_transaksi', '=', 'Tervalidasi');
        })->get();
        return view('backend.konsumen.v_proses', compact('cart'));
    }

    public function revisi($id)
    {
        $cart = Cart::find($id);
        $progres = Progres::where('cart_id', $cart->id)->first();
        return view('backend.konsumen.v_progresDesain', compact('progres', 'cart'));
    }

    public function komentar1(Request $request, $id)
    {
        $progres = Progres::find($id);
        $progres->komentar_1 = $request->komentar_1;
        $progres->save();
        return redirect()->back();
    }
    public function komentar2(Request $request, $id)
    {
        $progres = Progres::find($id);
        $progres->komentar_2 = $request->komentar_2;
        $progres->save();
        return redirect()->back();
    }
    public function komentar3(Request $request, $id)
    {
        $progres = Progres::find($id);
        $progres->komentar_3 = $request->komentar_3;
        $progres->save();
        return redirect()->back();
    }
}
