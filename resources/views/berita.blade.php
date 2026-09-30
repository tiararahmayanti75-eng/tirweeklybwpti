@extends('layouts.main')

@section('konten')
    <div class="container mt-4 mb-5 text-start">
        
        <!-- Header Judul -->
        <div class="mb-4 border-bottom pb-3">
            <h1 class="fw-bold text-primary">🌐 Portal Berita Teknologi & Tren Global</h1>
            <p class="text-muted">Informasi dan wawasan terbaru seputar perkembangan teknologi, software development, dan tren digital dunia.</p>
        </div>

        <!-- Berita Utama (Featured News) -->
        <div class="card bg-dark text-white border-0 shadow-lg mb-4 rounded-4 overflow-hidden">
            <div class="card-body p-5">
                <span class="badge bg-danger mb-3 px-3 py-2 fs-6">🔥 Tren Global</span>
                <h2 class="display-6 fw-bold mb-3">Dominasi Laravel 11 dalam Pengembangan Web Modern</h2>
                <p class="fs-5 text-light opacity-75">Framework PHP terus mendominasi industri pembuatan aplikasi web berkat efisiensi struktur kodenya, fitur keamanan tingkat lanjut, serta kemudahan integrasi dengan API modern.</p>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <span class="small text-white-50">📅 30 September 2026 | Kategori: Software Engineering</span>
                    <a href="#" class="btn btn-light fw-bold px-4">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Berita Pendukung (List Model) -->
        <h3 class="fw-bold mb-3">Artikel & Wawasan Lainnya</h3>
        <div class="list-group shadow-sm rounded-4 overflow-hidden">
            <a href="#" class="list-group-item list-group-item-action p-4 border-0 border-bottom">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <h4 class="mb-1 fw-bold text-dark">Perkembangan Artificial Intelligence di Sektor Industri</h4>
                    <small class="text-muted">📅 28/09/2026</small>
                </div>
                <p class="mb-1 text-secondary">Bagaimana implementasi kecerdasan buatan dan machine learning mengubah cara perusahaan mengoptimalkan produktivitas dan otomatisasi kerja.</p>
                <span class="badge bg-primary mt-2">Artificial Intelligence</span>
            </a>
            
            <a href="#" class="list-group-item list-group-item-action p-4 border-0">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <h4 class="mb-1 fw-bold text-dark">Pentingnya Keamanan Siber untuk Aplikasi Skala Kecil</h4>
                    <small class="text-muted">📅 25/09/2026</small>
                </div>
                <p class="mb-1 text-secondary">Tips dan praktik terbaik bagi para pengembang web pemula dalam mengamankan data pengguna dari risiko serangan siber modern.</p>
                <span class="badge bg-secondary mt-2">Cybersecurity</span>
            </a>
        </div>

    </div>
@endsection