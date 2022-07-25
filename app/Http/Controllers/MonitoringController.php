<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $cart = Cart::get();
        return view('layout_admin.v_monitoring', compact('cart'));
    }
}
