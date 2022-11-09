<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Produk;

class BrandController extends Controller
{
    public function index() {
        $list = Brand::with('produk')->get();
        return view("brand.index",compact('list'));
    }

    public function create() {
        return view("brand.create");
    }

    public function store(Request $req) {

        $new = new Brand();
        $new->nama_brand = $req->nama_brand;
        $new->save();

        return redirect("/brand");
    }

    public function edit($id) {
        //$detail = Brand::where("id",$id)->get();
        $detail = Brand::find($id); // find dapat dipakai jika primary key
        return view("brand.edit",compact('detail'));
    }

    public function update($id, Request $req) {

        $cek = Brand::find($id);
        
        if($cek) {

            $cek->nama_brand = $req->nama_brand;
            $cek->save();

            return redirect("/brand");

        } else {
            
            echo "Data tidak ditemukan";

        }
    }

    public function delete($id) {

        $cek = Brand::find($id);

        if($cek) {

            $cek->delete();
            return redirect("/brand");

        } else {

            echo "Data tidak ditemukan";
        
        }
    }
}
