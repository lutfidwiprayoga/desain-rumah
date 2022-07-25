<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintPDF extends Model
{
    use HasFactory;
    protected $table = 'print_p_d_f_s';
    protected $fillable = ['cart_id', 'progres_id', 'desain_id'];
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }
    public function progres()
    {
        return $this->belongsTo(Progres::class, 'progres_id', 'id');
    }
    public function desain()
    {
        return $this->belongsTo(Desain::class, 'desain_id', 'id');
    }
}
