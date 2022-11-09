<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "Produk";

    public function brand() {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function gudang() {
        return $this->belongsTo(Gudang::class,'gudang_id','id');
    }
}
