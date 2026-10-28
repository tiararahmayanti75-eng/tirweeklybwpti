<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekolah - SEKOLAHKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <a href="/" class="text-blue-600 hover:underline font-semibold">&larr; Beranda</a>
            <h1 class="text-3xl font-bold text-center text-blue-600">Direktori SEKOLAHKU</h1>
            <a href="/sekolah-tambah" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition shadow">+ Tambah Sekolah</a>
        </div>

        <!-- Form Pencarian dan Filter -->
        <form action="/sekolah" method="GET" class="bg-white p-4 rounded-xl shadow-md mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama sekolah atau lokasi..." class="w-full md:w-1/2 px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <select name="jenjang" class="w-full md:w-1/4 px-4 py-2 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Jenjang</option>
                <option value="SMA" {{ request('jenjang') == 'SMA' ? 'selected' : '' }}>SMA</option>
                <option value="SMK" {{ request('jenjang') == 'SMK' ? 'selected' : '' }}>SMK</option>
            </select>

            <div class="flex gap-2 w-full md:w-auto">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg text-sm transition w-full md:w-auto">Cari</button>
                <a href="/sekolah" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-4 py-2 rounded-lg text-sm transition text-center">Reset</a>
            </div>
        </form>
        
        <!-- Daftar Card Sekolah -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($sekolahs as $sekolah)
                <a href="/sekolah/{{ $sekolah->id }}" class="bg-white rounded-lg shadow-md p-6 border-t-4 border-blue-500 hover:shadow-xl transition block">
                    <span class="text-xs font-semibold px-2 py-1 bg-blue-100 text-blue-800 rounded-full">{{ $sekolah->jenjang }}</span>
                    <h2 class="text-xl font-bold mt-3 text-gray-800">{{ $sekolah->nama_sekolah }}</h2>
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $sekolah->lokasi }}</p>
                    <p class="text-xs font-medium text-green-600 mt-1">Akreditasi: {{ $sekolah->akreditasi }}</p>
                    <p class="text-gray-600 mt-3 text-sm">{{ $sekolah->deskripsi }}</p>
                </a>
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-xl shadow">
                    <p class="text-gray-500 text-lg">Sekolah yang kamu cari tidak ditemukan.</p>
                </div>
            @endforelse
        </div>

        <!-- Tombol Pagination -->
        <div class="mt-8">
            {{ $sekolahs->links() }}
        </div>
    </div>
</body>
</html>