@extends('layouts.main')

@section('konten')
    <div class="container mt-4 text-start">
        <div class="mb-4">
            <h1>{{ $singlenews["judul"] }}</h1>
            <h5 class="text-muted">Ditulis oleh: {{ $singlenews["penulis"] }}</h5>
        </div>
        
        <div class="mb-4">
            <p>{{ $singlenews["konten"] }}</p>
        </div>
        
        <a href="/berita" class="btn btn-secondary">&larr; Kembali ke Daftar Berita</a>
    </div>
@endsection