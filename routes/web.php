<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang');
Route::get('/barang/cari', [App\Http\Controllers\BarangController::class, 'cari']);
Route::get('/supplier/cari', [App\Http\Controllers\SupplierController::class, 'cari']);
Route::post('/barang', [App\Http\Controllers\BarangController::class, 'create'])->name('add.brg');
Route::get('/barang/{id}/edit', [App\Http\Controllers\BarangController::class, 'edit']);
Route::post('/barang/{id}/update', [App\Http\Controllers\BarangController::class, 'update'])->name('update.brg');
Route::get('/barang/delete/{id}', [App\Http\Controllers\BarangController::class, 'delete']);
Route::get('/barang/exportpdf', [App\Http\Controllers\BarangController::class, 'exportpdf']);

Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/cari', [App\Http\Controllers\SupplierController::class, 'cari']);
Route::post('/supplier', [App\Http\Controllers\SupplierController::class, 'create'])->name('add.spp');
Route::get('/supplier/{id}/edit', [App\Http\Controllers\SupplierController::class, 'edit']);
Route::post('/supplier/{id}/update', [App\Http\Controllers\SupplierController::class, 'update'])->name('update.spp');
Route::get('/supplier/delete/{id}', [App\Http\Controllers\SupplierController::class, 'delete']);
Route::get('/supplier/exportpdf', [App\Http\Controllers\SupplierController::class, 'exportpdf']);

Route::get('/penjual', [App\Http\Controllers\PenjualController::class, 'index'])->name('penjual');
Route::get('/penjual/cari', [App\Http\Controllers\PenjualController::class, 'cari']);
Route::post('/penjual', [App\Http\Controllers\PenjualController::class, 'create'])->name('add.pen');
Route::get('/penjual/{id}/edit', [App\Http\Controllers\PenjualController::class, 'edit']);
Route::post('/penjual/{id}/update', [App\Http\Controllers\PenjualController::class, 'update'])->name('update.pen');
Route::get('/penjual/delete/{id}', [App\Http\Controllers\PenjualController::class, 'delete']);
Route::get('/penjual/exportpdf', [App\Http\Controllers\PenjualController::class, 'exportpdf']);

Route::get('/pembeli', [App\Http\Controllers\PembeliController::class, 'index'])->name('pembeli');
Route::get('/pembeli/cari', [App\Http\Controllers\PembeliController::class, 'cari']);
Route::post('/pembeli', [App\Http\Controllers\PembeliController::class, 'create'])->name('add.pem');
Route::get('/pembeli/{id}/edit', [App\Http\Controllers\PembeliController::class, 'edit']);
Route::post('/pembeli/{id}/update', [App\Http\Controllers\PembeliController::class, 'update'])->name('update.pem');
Route::get('/pembeli/delete/{id}', [App\Http\Controllers\PembeliController::class, 'delete']);
Route::get('/pembeli/exportpdf', [App\Http\Controllers\PembeliController::class, 'exportpdf']);



