<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Tambahkan baris ini supaya Model tahu nama tabelnya 'berita' (tanpa s)
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'penulis',
        'konten',
    ];

    public static function ambilData()
    {
        return self::all();
    }

    public static function getBerita($slug)
    {
        return self::where('slug', $slug)->first();
    }
}