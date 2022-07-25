<?php

namespace App\Http\Controllers;

use App\Models\Desainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $desainer = Desainer::where('user_id', Auth::user()->id)->get();
        return view('backend.desainer.v_portfolio', compact('desainer'));
    }

    public function add()
    {
        return view('backend.desainer.v_addPort');
    }

    public function insert(Request $request)
    {
        Request()->validate([
            'portfolio' => 'required|mimes:jpg,jpeg,png|max:2000',
            'caption' => 'required',
        ], [
            'portfolio.required' => 'Wajib Diisi',
            'portfolio.mimes' => 'Harus memiliki format jpg,jpeg,dan png',
            'portfolio.max' => 'Ukuran portfolio maksimal 2MB',
            'caption.required' => 'Wajib Diisi'
        ]);

        $portfolio = new Desainer();
        $portfolio->caption = $request->caption;
        $portfolio->user_id = auth()->user()->id;
        if ($request->hasFile('portfolio')) {
            $request->file('portfolio')->move('portfolio/', $request->file('portfolio')->getClientOriginalName());
            $portfolio->portfolio = $request->file('portfolio')->getClientOriginalName();
        }
        $portfolio->save();


        return redirect()->route('desainer.portfolio');
    }
}
