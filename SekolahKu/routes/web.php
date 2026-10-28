<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman daftar sekolah
Route::get('/sekolah', [SekolahController::class, 'index']);

// Route untuk form tambah sekolah baru
Route::get('/sekolah-tambah', [SekolahController::class, 'create']);
Route::post('/sekolah', [SekolahController::class, 'store']);

// Route untuk Perbandingan Sekolah
Route::get('/perbandingan', [SekolahController::class, 'compare']);

// Route untuk Edit dan Hapus Sekolah
Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit']);
Route::put('/sekolah/{id}', [SekolahController::class, 'update']);
Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy']);

// Route untuk halaman detail berdasarkan ID sekolah (Letakkan di bawah rute edit agar tidak konflik)
Route::get('/sekolah/{id}', [SekolahController::class, 'show']);