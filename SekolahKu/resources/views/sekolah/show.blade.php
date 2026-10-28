<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sekolah - SEKOLAHKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-12 max-w-2xl">
        <div class="mb-6">
            <a href="/sekolah" class="text-blue-600 hover:underline text-sm font-semibold">&larr; Kembali ke Daftar Sekolah</a>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8 border-t-8 border-blue-600">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-xs font-semibold px-3 py-1 bg-blue-100 text-blue-800 rounded-full">{{ $sekolah->jenjang }}</span>
                    <h1 class="text-3xl font-bold text-gray-800 mt-3">{{ $sekolah->nama_sekolah }}</h1>
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $sekolah->lokasi }}</p>
                </div>
                <div class="text-right">
                    <span class="text-xs text-gray-400">Akreditasi</span>
                    <p class="text-2xl font-extrabold text-green-600">{{ $sekolah->akreditasi }}</p>
                </div>
            </div>

            <hr class="my-6">

            <div class="space-y-4">
                <h3 class="text-lg font-bold text-gray-700">Tentang Sekolah</h3>
                <p class="text-gray-600 leading-relaxed text-sm">{{ $sekolah->deskripsi }}</p>
            </div>

            <!-- Tombol Aksi Edit & Hapus -->
            <div class="flex gap-4 mt-8 pt-6 border-t border-gray-100">
                <a href="/sekolah/{{ $sekolah->id }}/edit" class="bg-amber-500 hover:bg-amber-600 text-white font-semibold px-4 py-2 rounded-lg text-sm transition shadow">Edit Sekolah</a>
                
                <form action="/sekolah/{{ $sekolah->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus sekolah ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition shadow">Hapus Sekolah</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>