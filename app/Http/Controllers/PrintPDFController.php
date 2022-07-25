<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PrintPDF;
use App\Models\Progres;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PrintPDFController extends Controller
{
    public function print($id)
    {
        $oalah = Cart::find($id);
        $emboh = Progres::find($id);
        $print = PrintPDF::where('progres_id', $emboh->id)->first();
        $data = array(
            'print' => $emboh->final_desain,
        );
        $print = PDF::loadView('backend.konsumen.v_print', compact('oalah', 'print', 'data', 'emboh'));
        return $print->download('desain.pdf');
    }
}
