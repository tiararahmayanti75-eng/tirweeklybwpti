<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $sekolah_id)
    {
        $request->validate([
            'nama_pengulas' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required',
        ]);

        Review::create([
            'sekolah_id' => $sekolah_id,
            'nama_pengulas' => $request->nama_pengulas,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect('/sekolah/' . $sekolah_id)->with('success', 'Ulasan berhasil dikirim!');
    }
}