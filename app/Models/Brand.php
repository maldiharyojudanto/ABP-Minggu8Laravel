<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "Brand";
    protected $fillable = [
        'nama_brand'
    ];

    public function produk() {
        return $this->hasMany(Produk::class,'brand_id','id');
    }

    public function gudang() {
        return $this->hasManyThrough(Gudang::class,
            Produk::class,
            'brand_id', // Foreign key on users table...
            'id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'gudang_id' // Local key on users table...
        );
    }
}
