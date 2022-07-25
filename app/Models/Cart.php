<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'transaksi_id',
        'desain_id',
        'user_id',
        'jendela',
        'pintu',
        'kamar_mandi',
        'harga',
        'total',
        'permintaan',
    ];

    public function desain()
    {
        return $this->belongsTo(Desain::class, 'desain_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function progres()
    {
        return $this->hasMany(Progres::class);
    }
    public function prints()
    {
        return $this->hasMany(PrintPDF::class);
    }
}
