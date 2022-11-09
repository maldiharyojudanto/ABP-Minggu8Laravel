<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("product.index");
    }

    public function create(){
        return view("product.create");
    }

    public function store(Request $req){

        $new = new Product();
        $new->nama_produk = $req->nama_produk;
        $new->stok = $req->stok;
        $new->save();
        
        return $new;
        //return $req->all(); //default dari sana
    }
}
