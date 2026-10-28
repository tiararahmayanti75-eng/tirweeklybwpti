<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Static_;

class BeritaController extends Controller
{
    public function tampilberita()
    {
        return view('berita', [
            "title" => "Berita",
            "beritas" => Berita::all(),
        ]);
    }
}
public static function getBerita($slug)
{
    $beritas = self::$data_berita; // Ambil semua data berita
    $singlenews = [];

    foreach ($beritas as $berita) {
        if ($berita['slug'] == $slug) {
            $singlenews = $berita;
            break; // Hentikan perulangan jika data sudah ketemu
        }
    }

    return $singlenews;
}

