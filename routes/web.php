<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GudangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// latihan product (tidak dipakai)
//Route::get('/product', [ProductController::class, 'index']);
//Route::get('/product/add', [ProductController::class, 'create']);
//Route::post('/product/store', [ProductController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

// views 'hello world'
Route::get('/hello', function () {
    return 'Hello world';
});

Route::middleware(['auth'])->group(function(){
    // views -> produk
    Route::get('/produk', [ProdukController::class, 'index']);
    // Route::get('/produk/create', [ProdukController::class, 'create']);
    Route::post('/produk', [ProdukController::class, 'store']);

    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
    // Route::post('/produk/update/{id}', [ProdukController::class, 'update']);

    Route::get('/produk/delete/{id}', [ProdukController::class, 'delete']);



    // views -> brand
    Route::get('/brand', [BrandController::class, 'index']);
    // Route::get('/brand/create', [BrandController::class, 'create']);
    Route::post('/brand', [BrandController::class, 'store']);

    Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
    // Route::post('/brand/update/{id}', [BrandController::class, 'update']);

    Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);



    // views -> gudang
    Route::get('/gudang', [GudangController::class, 'index']);
    // Route::get('/gudang/create', [GudangController::class, 'create']);
    Route::post('/gudang', [GudangController::class, 'store']);

    //Route::get('/gudang/detail/{id}', [GudangController::class, 'detail']);
    Route::get('/gudang/edit/{id}', [GudangController::class, 'edit']);
    // Route::post('/gudang/update/{id}', [GudangController::class, 'update']);

    Route::get('/gudang/delete/{id}', [GudangController::class, 'delete']);

    // Default home auth
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// views -> tema
Route::get('/temas', function () {
    return view('tema.index');
});

Auth::routes();
