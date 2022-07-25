<?php

namespace App\Http\Controllers;

use App\Models\Desain;
use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DesainController extends Controller
{

    public function __construct()
    {
        $this->Desain = new Desain();

        $this->middleware(['auth', 'verified']);
    }

    // All Data Desain
    public function desain()
    {
        $user = User::select('id', 'name')->where('level', '2')->get();
        $desains = Desain::with('kategori')->get();
        return view('v_desain', compact('desains', 'user'));
    }

    // Detail Data
    public function detail($id)
    {
        if (!$this->Desain->detailData($id)) {
            abort(404);
        }

        $data =  [
            'desain' => $this->Desain->detailData($id),
        ];
        return view('backend.desain.v_detail_desain', $data);
    }
}
