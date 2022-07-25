<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Desain;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'alamat',
        'nik',
        'jenis_kelamin',
        'no_rekening',
        'foto',
        'level',
        'profile',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relasi desain
    public function desains()
    {
        return $this->hasMany(Desain::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function desainers()
    {
        return $this->hasMany(Desainer::class);
    }
}
