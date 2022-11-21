<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = "Gudang";
    protected $fillable = [
        'nama_gudang',
        'alamat_gudang'
    ];

    public function produk() {
        return $this->hasMany(Produk::class,'gudang_id','id');
    }
}
