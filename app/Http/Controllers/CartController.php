<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Desain;
use App\Models\PrintPDF;
use App\Models\Progres;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request)
    {
        if (Auth::user() == null) {
            return redirect('/login');
        }

        $desain = Desain::find($request->input('desain_id'));
        $tanggal_pesan = Carbon::now()->format('Y-m-d H:i:s');
        $transaksis = new Transaksi();
        $transaksis->tanggal_pesan = $tanggal_pesan;
        $transaksis->status_transaksi = 'Pengajuan';
        $transaksis->status_desainer = 'Menunggu Verifikasi';
        $transaksis->bukti_pembayaran = null;
        $exp = strtotime('+5 hours', strtotime($transaksis->tanggal_pesan));
        $transaksis->maksimal_pembayaran = date("Y-m-d H:i:s", $exp);
        $transaksis->save();
        $cart = Cart::create([
            'transaksi_id' => $transaksis->id,
            'desain_id' => $request->input('desain_id'),
            'user_id' => Auth::user()->id,
            // 'jendela' => $request->input('jendela'),
            // 'pintu' => $request->input('pintu'),
            // 'kamar_mandi' => $request->input('kamar_mandi'),
            'harga' => $request->harga,
            'permintaan' => $request->permintaan,
        ]);

        $progres = new Progres();
        $progres->desain_id = $desain->id;
        $progres->cart_id = $cart->id;
        $progres->progres_1 = null;
        $progres->progres_2 = null;
        $progres->progres_3 = null;
        $progres->komentar_1 = null;
        $progres->komentar_2 = null;
        $progres->komentar_3 = null;
        $progres->save();

        $print = new PrintPDF();
        $print->cart_id = $cart->id;
        $print->desain_id = $desain->id;
        $print->progres_id = $progres->id;
        $print->save();

        return redirect()->back()->with('pesan', 'Desain berhasil ditambahkan kedalam keranjang');
    }

    public function detail()
    {
        // $koclok = Cart::with(['desain'])->where('user_id', Auth::user()->id)
        //     ->get();
        $koclok = Cart::with(['transaksi'], ['desain'])->whereHas('transaksi', function ($query) {
            return $query->where('status_transaksi', '=', 'Pengajuan');
        })->get();
        $desain = Desain::with('carts')->get();
        return view('frontend.v_detailCart', compact('koclok', 'desain'));
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
