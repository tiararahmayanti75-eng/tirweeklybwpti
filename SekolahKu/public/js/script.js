/* =====================================
   SEKOLAHKU - JAVASCRIPT UTAMA
===================================== */

document.addEventListener("DOMContentLoaded", function () {
    console.log("Website SEKOLAHKU berhasil dimuat!");

    // Contoh validasi sederhana pada form pencarian
    const searchForm = document.querySelector(".search-box");
    if (searchForm) {
        searchForm.addEventListener("submit", function (e) {
            const inputKeyword = searchForm.querySelector("input[type='search']").value.trim();
            
            if (inputKeyword === "") {
                e.preventDefault();
                alert("Silakan ketik nama sekolah atau lokasi terlebih dahulu!");
            }
        });
    }
});