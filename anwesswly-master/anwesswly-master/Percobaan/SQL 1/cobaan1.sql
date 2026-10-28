-- Tulis query SQL Anda di sini...
-- Contoh: SELECT * FROM customer;
-- Langkah 1: Membuat tabel produk
CREATE TABLE produk (
  produk_id INTEGER PRIMARY KEY,
  nama_produk VARCHAR(255),
  kategori VARCHAR(100),
  harga INTEGER,
  stok INTEGER,
);

-- Langkah 2: Memasukkan data contoh ke dalam tabel 
INSERT INTO produk (produk_id, nama_id, kategori, harga, stok)
VALUES
(1, 'Batik Pekalongan Premium', 'Fashion', 450000, 25),
(2, 'Kopi Toraja Arabica 250gram', 'Makanan & Minuman', 85000, 100):

-- Langkah 3: Menampilkan data untuk mengecek hasilnya 
SELECT * FROM produk;