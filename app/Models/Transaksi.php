<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'tanggal_pesan',
        'status_transaksi',
        'bukti_pembayaran',
        'status_desainer',
        'maksimal_pembayaran',
        'acc',
        'status_revisi',
        'status_progres',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
