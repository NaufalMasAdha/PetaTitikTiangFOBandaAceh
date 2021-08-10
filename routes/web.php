<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MyController;

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

Route::get('/admin', [AdminController::class,'index'])->name("admin_home");
Route::get('/admin/create', [AdminController::class,'create'])->name("admin_create");
Route::post('/admin/create', [AdminController::class,'store'])->name("admin_store");
Route::get('/admin/edit/{id}', [AdminController::class,'edit'])->name("admin_edit");
Route::post('/admin/edit/{id}', [AdminController::class,'update'])->name("admin_update");
Route::delete("/admin/delete/{id}", [AdminController::class, 'delete'])->name("admin_delete");

Route::get('/map', [MapController::class,'index'])->name("map_home");

Route::get('/tiang', [MapController::class,'index_tiang'])->name("daftar_tiang");
Route::get('/tiang/tambah', [MapController::class,'tambah_tiang'])->name("tambah_tiang");
Route::post('/tiang/tambah', [MapController::class,'store_tiang'])->name("store_tiang");
Route::post('/tiang/csv', [MapController::class,'store_csv_tiang'])->name("store_csv_tiang");
Route::get('/tiang/edit/{id}', [MapController::class,'edit_tiang'])->name("edit_tiang");
Route::post('/tiang/edit/{id}', [MapController::class,'update_tiang'])->name("update_tiang");
Route::delete('/tiang/delete{id}', [MapController::class,'delete_tiang'])->name("delete_tiang");

Route::get('/instansi', [MapController::class,'index_instansi'])->name("daftar_instansi");
Route::get('/instansi/tambah', [MapController::class,'tambah_instansi'])->name("tambah_instansi");
Route::post('/instansi/tambah', [MapController::class,'store_instansi'])->name("store_instansi");
Route::post('/instansi/csv', [MapController::class,'store_csv_instansi'])->name("store_csv_instansi");
Route::get('/instansi/edit/{id}', [MapController::class,'edit_instansi'])->name("edit_instansi");
Route::post('/instansi/edit/{id}', [MapController::class,'update_instansi'])->name("update_instansi");
Route::delete('/instansi/delete{id}', [MapController::class,'delete_instansi'])->name("delete_instansi");

Route::get('/importExportView', [MyController::class, 'importExportView']);
Route::get('/export', [MyController::class, 'export'])->name('export');
Route::post('/import', [MyController::class, 'import'])->name('import');

