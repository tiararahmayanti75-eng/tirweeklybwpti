// Mengambil elemen dari HTML berdasarkan ID
const tombol = document.getElementById('btnAksi');
const judul = document.getElementById('judul');
const pesan = document.getElementById('pesan Tambahan');

// Memberikan perintah saat tombol diklik
tombol.addEventListener('click', function() {
    // 1. Mengubah teks judul
    judul.innerText = "Sistem Aktif!";

    // 2. Mengubah warna judul
    judul.style.color = "#6c5ce7";

    // 3. Menampilkan pesan sukses
    pesan.innerText = "Prototype berhasil dijalankan! Javascript sudah terhubung.";

    // 4. Menampilkan log di console browser (F12)
    console.log("Tombol telah ditekan dan fungsi berjalan.";)
});