<?php
// 1. Membuat koneksi ke database Laragon
$host = "localhost";
$user = "root";
$password = "";
$database = "db_toko_kue";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// 2. FITUR ADMIN: Proses kalau tombol "Tambah Menu" diklik
if (isset($_POST['tambah_kue'])) {
    $nama = $_POST['nama_kue'];
    $harga = $_POST['harga'];
    
    if (!empty($nama) && !empty($harga)) {
       if (!empty($nama) && !empty($harga)) {
    mysqli_query($koneksi, "INSERT INTO menu (nama_kue, harga) VALUES ('$nama', '$harga')");
    
    // TAMBAHKAN 2 BARIS INI:
    header("Location: index.php");
    exit;
}
        
        mysqli_query($koneksi, "INSERT INTO menu (nama_kue, harga) VALUES ('$nama', '$harga')");
        
        // JALUR AMAN: Setelah simpan, langsung lempar kembali ke index.php kosongan
        // Ini kunci rahasia agar data tidak akan pernah ke-double saat di-refresh!
        header("Location: index.php");
        exit; 
    }
}

// 3. FITUR PENCARIAN
$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['cari']);
    $ambil_data = mysqli_query($koneksi, "SELECT * FROM menu WHERE nama_kue LIKE '%$keyword%'");
} else {
    $ambil_data = mysqli_query($koneksi, "SELECT * FROM menu");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kue Full Features</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5ebe0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            color: #d4a373;
            text-align: center;
            margin-bottom: 5px;
        }
        .subtitle {
            color: #7f5539;
            text-align: center;
            font-style: italic;
            margin-bottom: 25px;
        }
        
        /* Gaya Form Admin & Pencarian */
        .form-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            border: 1px dashed #d4a373;
        }
        .form-box h3 {
            margin-top: 0;
            color: #7f5539;
            font-size: 16px;
        }
        .input-group {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"] {
            flex: 1;
            padding: 8px 12px;
            border: 1px solid #ccd5ae;
            border-radius: 8px;
            outline: none;
        }
        button {
            background: #d4a373;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #faedcd;
            color: #7f5539;
        }

        /* Gaya List Menu */
        .menu-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .menu-item {
            background: #fefae0;
            padding: 15px 20px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 5px solid #d4a373;
        }
        .nama-kue {
            font-weight: 600;
            color: #4a3728;
        }
        .kanan-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .harga-kue {
            background: #d4a373;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        .btn-pesan {
            background: #25d366;
            color: white;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .btn-pesan:hover {
            background: #128c7e;
        }
        .no-data {
            text-align: center;
            color: #a8dadc;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Toko Kue Premium</h1>
    <div class="subtitle">Semua fitur dalam satu halaman estetik!</div>

    <div class="form-box">
        <h3>🔍 Cari Kue Favoritmu</h3>
        <form action="" method="GET">
            <div class="input-group">
                <input type="text" name="cari" placeholder="Ketik nama kue..." value="<?php echo $keyword; ?>">
                <button type="submit">Cari</button>
                <?php if($keyword != "") { echo "<a href='index.php' style='align-self:center; color:#7f5539;'>Reset</a>"; } ?>
            </div>
        </form>
    </div>

    <div class="form-box">
        <h3>➕ Panel Admin (Tambah Menu Baru)</h3>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" name="nama_kue" placeholder="Nama kue baru..." required>
                <input type="number" name="harga" placeholder="Harga (Angka)..." required>
            </div>
            <button type="submit" name="tambah_kue" style="width: 100%;">Simpan ke Database</button>
        </form>
    </div>

    <div class="menu-list">
        <?php
        // Cek apakah ada data kue di database
        if (mysqli_num_rows($ambil_data) > 0) {
            while($kue = mysqli_fetch_assoc($ambil_data)) {
                // Link format order otomatis ke WhatsApp
                $teks_wa = urlencode("Halo, saya mau pesan kue " . $kue['nama_kue'] . " yang harganya Rp " . number_format($kue['harga'], 0, ',', '.'));
                // Silakan ganti nomor 628xxx di bawah dengan nomor WA kamu sendiri nanti ya!
                $link_wa = "https://wa.me/628123456789?text=" . $teks_wa;

                echo '<div class="menu-item">';
                echo '  <span class="nama-kue">' . $kue['nama_kue'] . '</span>';
                echo '  <div class="kanan-box">';
                echo '      <span class="harga-kue">Rp ' . number_format($kue['harga'], 0, ',', '.') . '</span>';
                // FITUR 3: Tombol Order via WhatsApp
                echo '      <a href="' . $link_wa . '" target="_blank" class="btn-pesan">Order (WA)</a>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<div class="no-data">Kue yang kamu cari tidak ditemukan...</div>';
        }
        ?>
    </div>
</div>

</body>
</html>