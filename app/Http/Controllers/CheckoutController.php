<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $carts = Cart::with(['user'], ['desain'])->find($id);
        $transaksi = Transaksi::where('id', $carts->transaksi_id)->first();
        return view('frontend.v_checkout', compact('transaksi', 'carts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update($request->all());
        if ($request->hasFile('bukti_pembayaran')) {
            $request->file('bukti_pembayaran')->move('bukti_pembayaran/', $request->file('bukti_pembayaran')->getClientOriginalName());
            $transaksi->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $transaksi->save();
        }
        if ($transaksi) {
            return redirect()->route('detailCart')->with('Sukses', 'Bukti Berhasil di update');
        } else {
            return redirect()->route('detailCart')->with('Error', 'Bukti gagal di update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
