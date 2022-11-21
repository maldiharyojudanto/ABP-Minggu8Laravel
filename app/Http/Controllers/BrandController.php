<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Produk;
use DataTables;

class BrandController extends Controller
{
    public function index(Request $req) {
        // $list = Brand::withCount('produk')->withcount(['gudang' => function($query) {
        //     $query->select(Brand::raw('count(distinct(gudang_id))'));
        // }])->get();
        // return view("brand.index",compact('list'));
        if($req->ajax()) {
            $list = Brand::withCount('produk')->withcount(['gudang' => function($query) {
                $query->select(Brand::raw('count(distinct(gudang_id))'));
            }])->get();

            return Datatables::of($list)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBrand"><i class="fas fa-pen-to-square"></i> Edit</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm hapusBrand"><i class="fas fa-trash"></i> Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view("brand.index");
    }

    public function create() {
        // return view("brand.create");
    }

    public function store(Request $req) {
        // $new = new Brand();
        // $new->nama_brand = $req->nama_brand;
        // $new->save();
        // return redirect("/brand");
        Brand::updateOrCreate([
            'id' => $req->brand_id
        ],
        [
            'nama_brand' => $req->nama_brand
        ]);        

        return response()->json(array(
            "success"=>true,
            "message"=>"Brand saved successfully."
        ));
    }

    public function edit($id) {
        // $detail = Brand::find($id);
        // return view("brand.edit",compact('detail'));
        $brand = Brand::find($id);
        return response()->json($brand);
    }

    public function update($id, Request $req) {
        // $cek = Brand::find($id);
        
        // if($cek) {

        //     $cek->nama_brand = $req->nama_brand;
        //     $cek->save();

        //     return redirect("/brand");

        // } else {
            
        //     echo "Data tidak ditemukan";

        // }
    }

    public function delete($id) {
        // $cek = Brand::find($id);

        // if($cek) {

        //     $cek->delete();
        //     return redirect("/brand");

        // } else {

        //     echo "Data tidak ditemukan";
        
        // }
        Brand::find($id)->delete();
        return response()->json(array(
            "success"=>true,
            'message'=>'Product deleted successfully.'
        ));
    }
}
