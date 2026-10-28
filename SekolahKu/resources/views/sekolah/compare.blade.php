<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbandingan Sekolah - SEKOLAHKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <a href="/" class="text-blue-600 hover:underline font-semibold">&larr; Beranda</a>
            <h1 class="text-3xl font-bold text-center text-blue-600">Perbandingan Sekolah</h1>
            <div></div>
        </div>

        <!-- Form Pilih Sekolah untuk Dibandingkan -->
        <form action="/perbandingan" method="GET" class="bg-white p-6 rounded-xl shadow-md mb-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Sekolah Pertama</label>
                <select name="sekolah_1" class="w-full px-4 py-2 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Sekolah --</option>
                    @foreach($sekolahs as $item)
                        <option value="{{ $item->id }}" {{ request('sekolah_1') == $item->id ? 'selected' : '' }}>{{ $item->nama_sekolah }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Sekolah Kedua</label>
                <select name="sekolah_2" class="w-full px-4 py-2 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Sekolah --</option>
                    @foreach($sekolahs as $item)
                        <option value="{{ $item->id }}" {{ request('sekolah_2') == $item->id ? 'selected' : '' }}>{{ $item->nama_sekolah }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2 flex justify-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-2.5 rounded-lg text-sm transition shadow">Bandingkan Sekarang</button>
            </div>
        </form>

        <!-- Hasil Perbandingan (Side-by-Side) -->
        @if($sekolah1 && $sekolah2)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Sekolah 1 -->
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-blue-500">
                    <span class="text-xs font-semibold px-2.5 py-1 bg-blue-100 text-blue-800 rounded-full">{{ $sekolah1->jenjang }}</span>
                    <h2 class="text-2xl font-bold mt-3 text-gray-800">{{ $sekolah1->nama_sekolah }}</h2>
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $sekolah1->lokasi }}</p>
                    <hr class="my-4">
                    <div class="space-y-3 text-sm">
                        <p><strong>Akreditasi:</strong> <span class="text-green-600 font-bold">{{ $sekolah1->akreditasi }}</span></p>
                        <p><strong>Deskripsi:</strong> {{ $sekolah1->deskripsi }}</p>
                    </div>
                </div>

                <!-- Sekolah 2 -->
                <div class="bg-white rounded-xl shadow-md p-6 border-t-4 border-indigo-500">
                    <span class="text-xs font-semibold px-2.5 py-1 bg-indigo-100 text-indigo-800 rounded-full">{{ $sekolah2->jenjang }}</span>
                    <h2 class="text-2xl font-bold mt-3 text-gray-800">{{ $sekolah2->nama_sekolah }}</h2>
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $sekolah2->lokasi }}</p>
                    <hr class="my-4">
                    <div class="space-y-3 text-sm">
                        <p><strong>Akreditasi:</strong> <span class="text-green-600 font-bold">{{ $sekolah2->akreditasi }}</span></p>
                        <p><strong>Deskripsi:</strong> {{ $sekolah2->deskripsi }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow p-8 text-center text-gray-500">
                <p>Silakan pilih dua sekolah di atas lalu klik "Bandingkan Sekarang" untuk melihat perbandingannya.</p>
            </div>
        @endif
    </div>
</body>
</html>