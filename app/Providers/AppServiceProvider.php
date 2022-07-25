<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Desain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $desain = null;
            $koclok = null;
            if (Auth::user() != null) {
                if (Auth::user()->level == 2) {
                    $desain = Desain::whereIn('user_id', Auth::user()->desains->pluck('id')->toArray())->get();
                    // $koclok = Cart::with(['transaksi'], ['desain'])->where('user_id', Auth::user()->id)->whereHas('transaksi', function ($query) {
                    //     return $query->where('status_transaksi', '=', 'Pengajuan');
                    // })->get();
                    $koclok = Cart::latest()->whereIn('desain_id', Auth::user()->desains->pluck('id')->toArray())->get();
                    // $cart = Cart::with(['user'])->join('desains', 'carts.desain_id', '=', 'desains.id')
                    //     ->whereIn('desains.user_id', '=', Auth::user()->desains->pluck('id')->toArray())
                    //     ->get();
                } elseif (Auth::user()->level == 3) {
                    // $cart = Cart::join('desains', 'carts.desain_id', '=', 'desains.id')
                    //     ->join('users', 'carts.user_id', '=', 'users.id')
                    //     ->join('transaksis', 'carts.transaksi_id', '=', 'transaksis.id')
                    //     ->get();
                    $desain = Desain::get();
                    $koclok = Cart::with(['transaksi'], ['desain'])->whereHas('transaksi', function ($query) {
                        return $query->where('status_transaksi', '=', 'Pengajuan');
                    })->get();
                }
            }
            $view->with(['koclok' => $koclok, 'desain' => $desain]);
        });
    }
}
