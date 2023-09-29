<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BulanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengingatController;
use App\Http\Controllers\TransaksiController;
use App\Models\pemasukan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout']);

//     //kategori

// });
//auth
Route::get('/user/all', [AuthController::class, 'index']);
Route::get('/user/{id}', [AuthController::class, 'indexUser']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/changerole', [AuthController::class, 'changeRole']);

//bulan
Route::get('/bulan', [BulanController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'indexUser']);
Route::get('/kategori/pemasukan/{id}', [KategoriController::class, 'indexUserPemasukan']);
Route::get('/kategori/pengeluaran/{id}', [KategoriController::class, 'indexUserPengeluaran']);
Route::post('/bulan', [BulanController::class, 'store']);
Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
Route::post('/kategori/delete/{id}', [KategoriController::class, 'destroy']);



//kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'indexUser']);
Route::get('/kategori/pemasukan/{id}', [KategoriController::class, 'indexUserPemasukan']);
Route::get('/kategori/pengeluaran/{id}', [KategoriController::class, 'indexUserPengeluaran']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
Route::post('/kategori/delete/{id}', [KategoriController::class, 'destroy']);

//Pengingat

Route::get('/pengingat/{id}', [PengingatController::class, 'indexUser']);
Route::post('/pengingat', [PengingatController::class, 'store']);
Route::post('/pengingat/update/{id}', [PengingatController::class, 'update']);
Route::post('/pengingat/delete/{id}', [PengingatController::class, 'destroy']);

//transaksi
Route::get('/transaksi/{id}', [TransaksiController::class, 'indexUser']);
Route::get('/transaksi/pengeluaran/{id}', [TransaksiController::class, 'indexUserPengeluaran']);
Route::get('/transaksi/pemasukan/{id}', [TransaksiController::class, 'indexUserPemasukan']);
Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::post('/transaksi/delete/{id}', [TransaksiController::class, 'destroy']);
Route::post('/transaksi', [TransaksiController::class, 'store']);