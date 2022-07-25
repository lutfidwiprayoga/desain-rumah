<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Desain extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'desains';
    protected $fillable = [
        'kategori_id',
        'user_id',
        'nama',
        'harga',
        'tipe',
        'foto_desain',
        'tampak_samping_kiri',
        'tampak_samping_kanan',
        'keterangan',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function allData()
    {
        return DB::table('desains')->get();
    }

    public function detailData($id)
    {
        return DB::table('desains')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('desains')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('desains')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('desains')
            ->where('id', $id)
            ->delete();
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
