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
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user', [App\Http\Controllers\usercontroller::class, 'index'])->middleware(['CheckLevel:admin'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\usercontroller::class, 'create'])->middleware(['CheckLevel:admin'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\usercontroller::class, 'store'])->middleware(['CheckLevel:admin'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\usercontroller::class, 'edit'])->middleware(['CheckLevel:admin'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\usercontroller::class, 'update'])->middleware(['CheckLevel:admin'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\usercontroller::class, 'show'])->middleware(['CheckLevel:admin'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\usercontroller::class, 'destroy'])->middleware(['CheckLevel:admin'])->name('user.delete');

Route::get('pengaduan', [App\Http\Controllers\pengaduancontroller::class, 'index'])->middleware(['CheckLevel:admin'])->name('pengaduan.index');
Route::get('pengaduan/create', [App\Http\Controllers\pengaduancontroller::class, 'create'])->middleware(['auth'])->name('pengaduan.create');
Route::post('pengaduan/store', [App\Http\Controllers\pengaduancontroller::class, 'store'])->middleware(['CheckLevel:admin'])->name('pengaduan.store');
Route::get('pengaduan/edit/{id}', [App\Http\Controllers\pengaduancontroller::class, 'edit'])->middleware(['CheckLevel:admin'])->name('pengaduan.edit');
Route::put('pengaduan/update/{id}', [App\Http\Controllers\pengaduancontroller::class, 'update'])->middleware(['CheckLevel:admin'])->name('pengaduan.update');
Route::get('pengaduan/show/{id}', [App\Http\Controllers\pengaduancontroller::class, 'show'])->middleware(['CheckLevel:admin'])->name('pengaduan.show');
Route::delete('pengaduan/delete/{id}', [App\Http\Controllers\pengaduancontroller::class, 'destroy'])->middleware(['CheckLevel:admin'])->name('pengaduan.delete');
