<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Produk;
use App\Models\Brand;
use DataTables;

class GudangController extends Controller
{
    public function index(Request $req) {
        // $produk = Produk::all();
        // $brand = Brand::all();

        $list = Gudang::with('produk.brand')->get();
        // return view("gudang.index",compact('list','produk','brand'));
        if($req->ajax()) {
            $list = Gudang::with('produk.brand')->get();

            return Datatables::of($list)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                            $btn = '<a href="javascript:void(0)" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#detailModal-'.$row->id.'"><i class="fas fa-file"></i> Detail</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editGudang"><i class="fas fa-pen-to-square"></i> Edit</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm hapusGudang"><i class="fas fa-trash"></i> Delete</a> ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view("gudang.index",compact('list'));
    }

    public function create() {
        // return view("gudang.create");
    }

    public function store(Request $req) {
        // $new = new Gudang();
        // $new->nama_gudang = $req->nama_gudang;
        // $new->alamat_gudang = $req->alamat_gudang;
        // $new->save();
        // return redirect("/gudang");
        Gudang::updateOrCreate([
            'id' => $req->gudang_id
        ],
        [
            'nama_gudang' => $req->nama_gudang, 
            'alamat_gudang' => $req->alamat_gudang
        ]);        

        return response()->json(array(
            "success"=>true,
            "message"=>"Gudang saved successfully."
        ));
    }

    public function detail($id) {
        $produk = Produk::all();
        $brand = Brand::all();

        $detail = Gudang::find($id); // mencari berdasarkan id produk
        return view('gudang.detail',compact('detail','produk','brand')); // compact join dengan produk
    }

    public function edit($id) {
        // $detail = Gudang::find($id); 
        // return view("gudang.edit",compact('detail'));
        $gudang = Gudang::find($id);
        return response()->json($gudang);
    }

    public function update($id, Request $req) {
        // $cek = Gudang::find($id);
        
        // if($cek) {

        //     $cek->nama_gudang = $req->nama_gudang;
        //     $cek->alamat_gudang = $req->alamat_gudang;
        //     $cek->save();

        //     return redirect("/gudang");

        // } else {
            
        //     echo "Data tidak ditemukan";

        // }
    }

    public function delete($id) {
        // $cek = Gudang::find($id);

        // if($cek) {

        //     $cek->delete();
        //     return redirect("/gudang");

        // } else {

        //     echo "Data tidak ditemukan";
        
        // }
        Gudang::find($id)->delete();
        return response()->json(array(
            "success"=>true,
            'message'=>'Product deleted successfully.'
        ));
    }
}
