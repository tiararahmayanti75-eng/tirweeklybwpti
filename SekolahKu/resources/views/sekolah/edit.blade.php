<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sekolah - SEKOLAHKU</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-12 max-w-2xl">
        <div class="flex justify-between items-center mb-6">
            <a href="/sekolah" class="text-blue-600 hover:underline text-sm font-semibold">&larr; Kembali ke Daftar Sekolah</a>
            <h1 class="text-2xl font-bold text-gray-800">Edit Data Sekolah</h1>
            <div></div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8 border-t-8 border-blue-600">
            <!-- Menampilkan error validasi jika ada input yang kosong -->
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
                    <strong class="font-bold">Oops! Ada data yang belum lengkap:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/sekolah/{{ $sekolah->id }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah', $sekolah->nama_sekolah) }}" class="w-full px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jenjang</label>
                        <select name="jenjang" class="w-full px-4 py-2 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="SMA" {{ old('jenjang', $sekolah->jenjang) == 'SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="SMK" {{ old('jenjang', $sekolah->jenjang) == 'SMK' ? 'selected' : '' }}>SMK</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Akreditasi</label>
                        <select name="akreditasi" class="w-full px-4 py-2 border rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="A" {{ old('akreditasi', $sekolah->akreditasi) == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('akreditasi', $sekolah->akreditasi) == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ old('akreditasi', $sekolah->akreditasi) == 'C' ? 'selected' : '' }}>C</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi / Alamat</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $sekolah->lokasi) }}" class="w-full px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="4" class="w-full px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $sekolah->deskripsi) }}</textarea>
                </div>

                <div class="flex justify-end gap-4 pt-4">
                    <a href="/sekolah" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-6 py-2.5 rounded-lg text-sm transition">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg text-sm transition shadow-md">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>