<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsumenOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function proses()
    {
        return view('backend.konsumen.v_proses');
    }

    public function selesai()
    {
        return view('backend.konsumen.v_selesai');
    }
}
