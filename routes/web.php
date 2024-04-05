<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PeminjamDetailsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route untuk menyimpan pengguna baru
Route::post('/users', [UserController::class, 'store']);
Route::resource('bk', BukuController::class);
Route::resource('ktgr', KategoriController::class);
Route::resource('pnrbt', PenerbitController::class);
Route::resource('aggt', AnggotaController::class);
Route::resource('pmnjm', PeminjamController::class);
Route::resource('pmdetails', PeminjamDetailsController::class);
// Route::post('/cek-stock-buku', 'PeminjamanController@cekStockBuku');
Route::post('/cek-stock-buku', [PeminjamController::class, 'cekStockBuku'])->name('cek-stock-buku');
Route::post('/update-stok', [PeminjamController::class, 'updateStokBuku'])->name('updateStokBuku');
Route::get('/pmdetails/getHistoryPeminjam', [PeminjamDetailsController::class, 'getHistoryPeminjam'])->name('getHistoryPeminjam');
Route::get('/getCodePeminjam', [PeminjamController::class, 'getCodePeminjam']);
Route::get('/getCodeBuku', [BukuController::class, 'getCodeBuku']);
Route::get('/getCodeAnggota', [AnggotaController::class, 'getCodeAnggota']);
Route::get('/getCodeKategori', [KategoriController::class, 'getCodeKategori']);
Route::get('/getCodePenerbit', [PenerbitController::class, 'getCodePenerbit']);

//Route::get('/home', [UserController::class, 'home'])->name('admin.home');
Route::get('/home', [UserController::class, 'user'])->name('user.home');
Route::get('/home', [UserController::class, 'home'])->name('admin.home');
