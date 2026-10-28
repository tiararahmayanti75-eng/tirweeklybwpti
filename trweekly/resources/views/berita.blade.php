@extends('layouts.main')

@section('konten')
    <div class="container mt-4 text-start">
        <h1 class="mb-4">Daftar Berita</h1>
        
        @foreach ($beritas as $berita)
            <article class="mb-5">
                <h2>
                    <a href="/berita/{{ $berita['slug'] ?? '#' }}" class="text-decoration-none">
                        {{ $berita['judul'] ?? 'Judul Tidak Tersedia' }}
                    </a>
                </h2>
                <h5 class="text-muted">
                    Ditulis oleh: {{ $berita['penulis'] ?? 'Anonim' }}
                </h5>
                <p>
                    {{ $berita['konten'] ?? ($berita['isi'] ?? 'Konten belum tersedia.') }}
                </p>
                <a href="/berita/{{ $berita['slug'] ?? '#' }}" class="btn btn-primary btn-sm">Baca Selengkapnya &rarr;</a>
            </article>
            <hr class="my-4">
        @endforeach
    </div>
@endsection