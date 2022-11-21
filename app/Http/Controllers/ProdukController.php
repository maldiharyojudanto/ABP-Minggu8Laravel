<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Brand;
use App\Models\Gudang;
use DataTables;

class ProdukController extends Controller
{
    public function index(Request $req) {
        $brand = Brand::all();
        $gudang = Gudang::all();

        // $list = Produk::with('brand:id,nama_brand','gudang:id,nama_gudang,alamat_gudang')->get();
        // return view("produk.index",compact('list','brand','gudang'));
        if($req->ajax()) {
            $list = Produk::with('brand:id,nama_brand','gudang:id,nama_gudang,alamat_gudang')->get();

            return Datatables::of($list)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduk"><i class="fas fa-pen-to-square"></i> Edit</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm hapusProduk"><i class="fas fa-trash"></i> Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view("produk.index",compact('brand','gudang'));
    }

    public function create() {
        // $brand = Brand::all();
        // $gudang = Gudang::all();

        // return view("produk.create",compact('brand','gudang'));
    }

    public function store(Request $req) {
        // $produk = new Produk();
        // $produk->nama_produk = $req->nama_produk;
        // $produk->stok = $req->stok;
        // $produk->brand_id = $req->brand_id;
        // $produk->gudang_id = $req->gudang_id;
        // $produk->harga = $req->harga;
        // $produk->save();
        // return redirect("/produk");
        Produk::updateOrCreate([
            'id' => $req->produk_id
        ],
        [
            'nama_produk' => $req->nama_produk, 
            'stok' => $req->stok,
            'brand_id' => $req->brand_id,
            'gudang_id' => $req->gudang_id,
            'harga' => $req->harga
        ]);        

        return response()->json(array(
            "success"=>true,
            "message"=>"Produk saved successfully."
        ));
    }

    public function edit($id) {
        // $brand = Brand::all();
        // $gudang = Gudang::all();

        // $detail = Produk::find($id);
        // return view("produk.edit",compact('detail','brand','gudang'));
        $produk = Produk::find($id);
        return response()->json($produk);
    }

    public function update($id, Request $req) {
        // $cek = Produk::find($id);
        
        // if($cek) {

        //     $cek->nama_produk = $req->nama_produk;
        //     $cek->stok        = $req->stok;
        //     $cek->brand_id    = $req->brand_id;
        //     $cek->gudang_id   = $req->gudang_id;
        //     $cek->harga       = $req->harga;
        //     $cek->save();

        //     return redirect("/produk");

        // } else {
            
        //     echo "Data tidak ditemukan";

        // }
    }

    public function delete($id) {
        // $cek = Produk::find($id);

        // if($cek) {

        //     $cek->delete();
        //     return redirect("/produk");

        // } else {

        //     echo "Data tidak ditemukan";
        
        // }
        Produk::find($id)->delete();
        return response()->json(array(
            "success"=>true,
            'message'=>'Product deleted successfully.'
        ));
    }
}