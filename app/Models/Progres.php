<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'progres';
    protected $fillable = [
        'id',
        'desain_id',
        'cart_id',
        'progres_1',
        'progres_2',
        'progres_3',
        'komentar_1',
        'komentar_2',
        'komentar_3',
        'final_desain'
    ];

    public function desain()
    {
        return $this->belongsTo(Desain::class, 'desain_id', 'id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
    public function prints()
    {
        return $this->hasMany(PrintPDF::class);
    }
}
