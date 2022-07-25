<?php

namespace App\Http\Controllers;

use App\Mail\FinalDesain;
use App\Models\Cart;
use App\Models\Progres;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProgresController extends Controller
{
    public function index()
    {
        $cart = Cart::latest()->with(['transaksi'], ['desain'])->whereHas('transaksi', function ($query) {
            return $query->where('status_transaksi', '=', 'Tervalidasi')->where('status_desainer', '=', 'Diterima');
        })->get();
        $transaksi = Transaksi::with('carts')->where('status_desainer', 'Diterima')->where('status_transaksi', 'Tervalidasi')->get();
        return view('backend.desainer.v_progres', compact('cart', 'transaksi'));
    }

    public function upload($id)
    {
        $cart = Cart::find($id);
        $progres = Progres::where('cart_id', $cart->id)->first();
        return view('backend.desainer.v_upload', compact('progres', 'cart'));
    }

    public function progres1(Request $request, $id)
    {
        $cart = Cart::find($id);
        $progres = Progres::where('cart_id', $cart->id)->first();
        if ($request->file('progres_1') == "") {
            $progres->progres_1 = $request->progres_1;
        } else {
            $filename = $request->file('progres_1')->getClientOriginalName();
            $request->file('progres_1')->move("progres_1/", $filename);
            $progres->progres_1 = $filename;
            $progres->save();
        }
        $transaksi = Transaksi::where('id', $cart->transaksi_id)->first();
        $transaksi->status_progres = 'Mengerjakan Progres 1';
        $transaksi->save();
        return redirect()->back();
    }
    public function progres2(Request $request, $id)
    {
        $cart = Cart::find($id);
        $progres = Progres::where('cart_id', $cart->id)->first();
        if ($request->file('progres_2') == "") {
            $progres->progres_2 = $request->progres_2;
        } else {
            $filename = $request->file('progres_2')->getClientOriginalName();
            $request->file('progres_2')->move("progres_2/", $filename);
            $progres->progres_2 = $filename;
            $progres->save();
        }
        $transaksi = Transaksi::where('id', $cart->transaksi_id)->first();
        $transaksi->status_progres = 'Mengerjakan Progres 2';
        $transaksi->save();
        return redirect()->back();
    }
    public function progres3(Request $request, $id)
    {
        $cart = Cart::find($id);
        $progres = Progres::where('cart_id', $cart->id)->first();
        if ($request->file('progres_3') == "") {
            $progres->progres_3 = $request->progres_3;
        } else {
            $filename = $request->file('progres_3')->getClientOriginalName();
            $request->file('progres_3')->move("progres_3/", $filename);
            $progres->progres_3 = $filename;
            $progres->save();
        }
        $transaksi = Transaksi::where('id', $cart->transaksi_id)->first();
        $transaksi->status_progres = 'Mengerjakan Progres 3';
        $transaksi->save();
        return redirect()->back();
    }

    public function final(Request $request, $id)
    {
        $koclok = Cart::find($id);
        $progres = Progres::where('cart_id', $koclok->id)->first();
        if ($request->file('final_desain') == "") {
            $progres->final_desain = $request->final_desain;
        } else {
            $filename = $request->file('final_desain')->getClientOriginalName();
            $request->file('final_desain')->move("final_desain/", $filename);
            $progres->final_desain = $filename;
            $progres->save();
        }
        $transaksi = Transaksi::where('id', $koclok->transaksi_id)->first();
        $transaksi->status_revisi = 'Selesai';
        $transaksi->status_progres = 'Desain Selesai';
        $transaksi->save();
        $final = array(
            'nama_konsumen' => $koclok->user->name,
        );
        Mail::to($koclok->user->email)->send(new FinalDesain($final));
        return redirect()->back();
    }
}
