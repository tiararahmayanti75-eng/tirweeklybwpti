<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEKOLAHKU - Platform Transparansi & Direktori Pendidikan Menengah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <span class="bg-blue-600 text-white font-bold px-3 py-1.5 rounded-lg shadow">S</span>
                <span class="text-xl font-extrabold text-gray-900 tracking-wide">SEKOLAHKU</span>
            </div>
            <nav class="hidden md:flex space-x-8 text-sm font-medium text-gray-600">
                <a href="/" class="hover:text-blue-600 transition">Beranda</a>
                <a href="/sekolah" class="hover:text-blue-600 transition">Daftar Sekolah</a>
                <a href="/perbandingan" class="hover:text-blue-600 transition">Perbandingan</a>
                <a href="#" class="hover:text-blue-600 transition">Tentang Kami</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow container mx-auto px-6 py-12 flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 space-y-6">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">Direktori SMA dan SMK</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                Temukan Sekolah Terbaik untuk <span class="text-blue-600">Masa Depanmu.</span>
            </h1>
            <p class="text-gray-600 text-base leading-relaxed">
                Jelajahi, bandingkan, dan temukan SMA atau SMK yang sesuai dengan minat, kebutuhan, dan impian masa depanmu di platform SEKOLAHKU.
            </p>
            
            <!-- Form Pencarian Aktif -->
            <form action="/sekolah" method="GET" class="flex items-center bg-white shadow-md rounded-xl p-2 max-w-lg border border-gray-200 w-full">
                <input type="text" name="search" placeholder="Cari nama sekolah atau lokasi..." class="w-full px-4 py-2 text-sm focus:outline-none text-gray-700">
                <select name="jenjang" class="px-3 py-2 text-sm text-gray-600 bg-gray-50 border-x border-gray-200 focus:outline-none">
                    <option value="">Jenjang</option>
                    <option value="SMA">SMA</option>
                    <option value="SMK">SMK</option>
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition ml-2">Cari</button>
            </form>
        </div>

        <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100 text-center max-w-sm w-full">
                <div class="text-4xl mb-3">🏫</div>
                <h3 class="text-xl font-bold text-gray-800">SEKOLAHKU</h3>
                <p class="text-xs text-gray-500 mt-2">Platform Transparansi & Direktori Pendidikan Menengah</p>
                <a href="/sekolah" class="mt-6 inline-block bg-blue-50 hover:bg-blue-100 text-blue-600 text-sm font-bold px-5 py-2.5 rounded-xl transition">
                    Lihat Semua Sekolah &rarr;
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-6 mt-auto">
        <div class="container mx-auto px-6 text-center text-xs text-gray-400">
            &copy; 2026 SEKOLAHKU. Dibuat dengan Laravel & Semangat Belajar!
        </div>
    </footer>

</body>
</html>