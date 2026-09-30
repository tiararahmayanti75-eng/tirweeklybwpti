<?php

use Illuminate\Support\Facades\Route;

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
    return view('berita', [
        "title" => "Berita"
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        "title" => "Contact"
    ]);
});