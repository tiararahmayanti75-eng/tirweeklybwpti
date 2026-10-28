@extends('layouts.main')

@section('konten')
    <div class="container text-start mt-4">
        <h1 class="display-5 fw-bold mb-3">Halaman Profile</h1>
        <p class="fs-5">Nama : {{ $name }}</p>
        <p class="fs-5"><span>NIM:</span> {{ $nim }}</p>
        <p class="fs-5"><span>Prodi:</span> {{ $prodi }}</p>
        <div class="mt-3">
            <img src="{{ asset($foto) }}" width="250px" alt="Foto Profil" class="rounded shadow" />
        </div>
    </div>
@endsection