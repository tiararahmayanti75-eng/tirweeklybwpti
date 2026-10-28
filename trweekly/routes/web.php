<?php

use Illuminate\Support\Facades\Route;
use App\Models\Berita;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/profile', function () {
    return view('profile', [
        "title" => "Profile",
        "name" => "Tiara Rahmayanti",
        "nim" => "13242520014",
        "prodi" => "Teknologi Informasi",
        "foto" => "images/foto.jpeg"
    ]);
});

Route::get('/berita', function () {
    $data_berita = Berita::ambilData(); // Ambil data berita di sini
    
    return view('berita', [
        "title" => "Berita",
        "beritas" => $data_berita
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact"
    ]);
});

// Routing untuk handling 1 berita (Detail Berita)
Route::get('/berita/{slug}', function ($slug) {
    // Memanggil method getBerita yang ada di Model Berita
    $singlenews = Berita::getBerita($slug);

    return view('beritatunggal', [
        "title" => $singlenews['judul'] ?? "Detail Berita",
        "berita" => $singlenews
    ]);
});