<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');

Route::get('/admin/home', [AdminController::class,'index'])->name("admin_home");
Route::get('/admin/create', [AdminController::class,'create'])->name("admin_add");
Route::post('/admin/create', [AdminController::class,'store'])->name("admin_store");
Route::get('/admin/edit/{id}', [AdminController::class,'edit'])->name("admin_edit");
Route::post('/admin/edit/{id}', [AdminController::class,'update'])->name("admin_update");
Route::delete("/admin/delete/{id}", [AdminController::class, 'delete'])->name("admin_delete");

Route::get('/map/home', [MapController::class,'index'])->name("map_home");