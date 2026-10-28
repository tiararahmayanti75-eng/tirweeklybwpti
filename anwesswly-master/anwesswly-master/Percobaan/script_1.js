// Aksi untuk tombol utama
const tombol = document.getElementById('btnAksi');
const pesan = document.getElementById('pesanTambahan');

tombol.addEventListener('click', function() {
    pesan.innerText = "Selamat menjelajahi Alpha Nexus! Kamu berada di jalur yang benar.";
});

// Aksi untuk semua link di navigasi
const menuLinks = document.querySelectorAll('.nav-item');

menuLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        // Mencegah link pindah halaman untuk percobaan ini
        event.preventDefault();
        console.log("Kamu mengklik menu: " + this.innerText);
        alert("Kamu memilih menu " + this.innerText + ". Fitur ini segera hadir!");
    });
});

// Ambil elemen yang ingin diubah isinya
const juduLHallaman = document.querySelector('h1');
const deskripsiHalaman = document.querySelector('p');

// Fungsi untuk mengubah konten saat menu dikilik
const menuLinks = document.querySelectorAll('.nav-item');

menuLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah refresh halaman 

        if (namaMenu === "Home") {
            juduLHallaman.innerText = "Alpha Nexus";
            deskripsiHalaman.innerHTML = "Welcome to my <strong>Creative Sandbox</strong>.";
        } else if (namaMenu === "Projects") {
            juduLHallaman.innerText = "Koleksi Proyek";
            deskripsiHalaman.innerText = "Di sini adalah daftar proyek coding yang sedang saya kerjakan.";
        } else if (namaMenu === "About") {
            juduLHallaman.innerText = "Tentang Saya";
            deskripsiHalaman.innerText = "Saya adalah seorang caon developer yang sedang belajar web developer."
        }
        elsel
        if (namaMenu === "Contact") {
            juduLHallaman.innerText = "Hubungi Saya";
            deskripsiHalaman.innerText = "Kirim pesan ke:email@tiararahlmayanti75@gmaillllll.com"
        }
    });
});

const btnExplore = document.getElementById('btnAksi');

btnExplore.addEventListener('click', function() {
    let teks = "Memulai inisialisasi sistem... 100% Aktif!";
    let i = 0;
    const target = document.getElementById('pesanTambahan');
    target.innerText = ""; // Kosongkan dulu

    function mengetik() {
        if (i < teks.length) {
            target.innerText += teks.charAt(i);
            i++;
            setTimeout(mengetik, 50); // Kecepatan mengetik
        }
    }
    mengetik();
});

function ubahKonten(menu) {
    const judul = document.querySelector('h1');
    const subjudul = document.querySelector('p');

    if (menu === 'Projects') {
        judul.innerText = "Koleksi Proyek";
        subjudul.innerText = "Ini adalah daftar eksperimen coding saya.";
    } else if (menu === 'About') {
        judul.innerText = "Tentang Alpha Nexus";
        subjudul.innerText = "Web ini dibuat untuk belajar Web Development dari nol.";
    } else {
        judul.innerText = "Alpha Nexus";
        subjudul.innerHTML = "Welcome to my <strong>Creative Sandbox</strong>.";
    }
}