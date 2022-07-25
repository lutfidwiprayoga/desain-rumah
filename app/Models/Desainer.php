<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desainer extends Model
{
    use HasFactory;
    protected $table = 'desainers';
    protected $fillable = [
        'user_id',
        'portfolio',
        'caption',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
