<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapController;

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
    return view('auth/login');
})->middleware('guest');;

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home ', [HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [AdminController::class,'index'])->name("admin_home");
Route::get('/admin/create', [AdminController::class,'create'])->name("admin_create");
Route::post('/admin/create', [AdminController::class,'store'])->name("admin_store");
Route::get('/admin/edit/{id}', [AdminController::class,'edit'])->name("admin_edit");
Route::post('/admin/edit/{id}', [AdminController::class,'update'])->name("admin_update");
Route::delete("/admin/delete/{id}", [AdminController::class, 'delete'])->name("admin_delete");

Route::get('/map/home', [MapController::class,'index'])->name("map_home");

Route::get('/map/tiang/', [MapController::class,'index_tiang'])->name("daftar_tiang");
Route::get('/map/tiang/tambah', [MapController::class,'map_tambah_tiang'])->name("tambah_tiang");
Route::post('/map/tiang/tambah', [MapController::class,'map_tambah_tiang'])->name("store_tiang");
Route::get('/map/tiang/edit/{id}', [MapController::class,'map_edit_tiang'])->name("edit_tiang");
Route::post('/map/tiang/edit/{id}', [MapController::class,'map_edit_tiang'])->name("update_tiang");
Route::delete('/map/tiang/delete{id}', [MapController::class,'map_edit_tiang'])->name("delete_tiang");

Route::get('/map/instansi/', [MapController::class,'index_instansi'])->name("daftar_instansi");
Route::get('/map/instansi/tambah', [MapController::class,'map_tambah_instansi'])->name("tambah_instansi");
Route::post('/map/instansi/tambah', [MapController::class,'map_tambah_instansi'])->name("store_instansi");
Route::get('/map/instansi/edit/{id}', [MapController::class,'map_edit_instansi'])->name("edit_instansi");
Route::post('/map/instansi/edit/{id}', [MapController::class,'map_edit_instansi'])->name("update_instansi");
Route::delete('/map/instansi/delete{id}', [MapController::class,'map_edit_instansi'])->name("delete_instansi");

