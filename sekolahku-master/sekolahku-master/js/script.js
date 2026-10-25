
/* =====================================
   SEKOLAHKU - JAVASCRIPT
===================================== */

// 1. MENU HAMBURGER UNTUK HP

const menuToggle = document.querySelector(".menu-toggle");
const navMenu = document.querySelector(".nav-menu");

if (menuToggle && navMenu) {
    menuToggle.addEventListener("click", function () {
        navMenu.classList.toggle("show");

        // Memperbarui label aksesibilitas menu
        const menuTerbuka = navMenu.classList.contains("show");

        menuToggle.setAttribute(
            "aria-expanded",
            menuTerbuka ? "true" : "false"
        );

        menuToggle.setAttribute(
            "aria-label",
            menuTerbuka ? "Tutup menu" : "Buka menu"
        );
    });

    // Menutup menu setelah salah satu tautan dipilih
    const navLinks = navMenu.querySelectorAll("a");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            navMenu.classList.remove("show");
            menuToggle.setAttribute("aria-expanded", "false");
            menuToggle.setAttribute("aria-label", "Buka menu");
        });
    });
}


// 2. FITUR PENCARIAN SEKOLAH


const searchForm = document.getElementById("searchForm");

if (searchForm) {
    searchForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const inputNama = document.getElementById("searchInput");
        const pilihanJenjang = document.getElementById("jenjang");

        const namaSekolah = inputNama
            ? inputNama.value.trim()
            : "";

        const jenjangSekolah = pilihanJenjang
            ? pilihanJenjang.value
            : "";

        if (namaSekolah === "" && jenjangSekolah === "") {
            alert("Masukkan nama sekolah atau pilih jenjang SMA/SMK terlebih dahulu!");
            return;
        }

        const parameter = new URLSearchParams();

        if (namaSekolah !== "") {
            parameter.set("q", namaSekolah);
        }

        if (jenjangSekolah !== "") {
            parameter.set("jenjang", jenjangSekolah);
        }

        // Untuk sementara, tampilkan hasil pencarian
        // karena halaman daftar sekolah belum dibuat.
        const hasil = [];

        if (namaSekolah !== "") {
            hasil.push("Nama sekolah: " + namaSekolah);
        }

        if (jenjangSekolah !== "") {
            hasil.push("Jenjang: " + jenjangSekolah);
        }

        alert(
            "Pencarian SekolahKu\n\n" +
            hasil.join("\n") +
            "\n\nData pencarian berhasil dibaca!"
        );

        console.log("Parameter pencarian:", parameter.toString());
    });
}


// 3. TAHUN OTOMATIS DI FOOTER

const yearElement = document.getElementById("currentYear");

if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
}


// 4. EFEK TAUTAN NAVIGASI AKTIF

const currentPage = window.location.pathname;

document.querySelectorAll(".nav-link").forEach(function (link) {
    const linkPath = new URL(link.href, window.location.origin).pathname;

    if (linkPath === currentPage) {
        link.classList.add("active");
    }
});