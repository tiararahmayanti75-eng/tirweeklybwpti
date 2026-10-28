<?php
session_start();

// 1. PROTEKSI HALAMAN: Jika admin belum login, tendang balik ke login.php
if (!isset($_SESSION['login_admin'])) {
    header("Location: login.php");
    exit;
}

// 2. KONEKSI DATABASE
$host = "localhost";
$user = "root";
$password = "";
$database = "db_counseling";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// 3. AMBIL DATA PASIEN BERDASARKAN ID DI URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "SELECT * FROM pendaftaran WHERE id = '$id'";
    $eksekusi = mysqli_query($koneksi, $query);
    $pasien = mysqli_fetch_assoc($eksekusi);

    // Jika data tidak ada di database
    if (!$pasien) {
        echo "<script>alert('Data pasien tidak ditemukan!'); window.location.href='admin.php';</script>";
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}

// 4. PROSES SIMPAN PERUBAHAN DATA (UPDATE)
if (isset($_POST['simpan'])) {
    $id_pasien = $_POST['id'];
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    $query_update = "UPDATE pendaftaran SET nama_lengkap = '$nama_lengkap', status = '$status' WHERE id = '$id_pasien'";
    
    if (mysqli_query($koneksi, $query_update)) {
        echo "<script>alert('Data pasien berhasil diperbarui!'); window.location.href='admin.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien - Counseling</title>
    <style>
        /* TEMA WARNA SENADA DENGAN ADMIN.PHP */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #fce4ec; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .box-edit { 
            width: 100%;
            max-width: 450px; 
            background: #ffffff; 
            padding: 35px; 
            border-radius: 16px; 
            box-shadow: 0 8px 24px rgba(136, 14, 79, 0.08); 
            box-sizing: border-box;
        }

        h2 { 
            color: #880e4f; 
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            font-size: 24px;
            font-weight: 600;
        }

        .form-group { 
            margin-bottom: 20px; 
        }

        .form-group label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 600; 
            color: #4a148c;
            font-size: 14px;
        }

        .form-group input[type="text"],
        .form-group select { 
            width: 100%; 
            padding: 12px 15px; 
            border: 1px solid #e1bee7; 
            border-radius: 8px; 
            box-sizing: border-box; 
            font-size: 14px;
            color: #333;
            outline: none;
            transition: all 0.3s;
        }

        .form-group input[type="text"]:focus,
        .form-group select:focus {
            border-color: #ba68c8;
            box-shadow: 0 0 5px rgba(186, 104, 200, 0.4);
        }

        .btn-simpan { 
            width: 100%;
            padding: 12px; 
            background-color: #9c27b0; 
            color: white; 
            border: none; 
            border-radius: 25px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 14px;
            margin-top: 10px;
            letter-spacing: 0.5px;
            transition: background 0.3s, transform 0.2s;
        }

        .btn-simpan:hover { 
            background-color: #880e4f;
            transform: translateY(-1px);
        }

        .btn-batal { 
            display: block; 
            text-align: center; 
            margin-top: 15px; 
            font-size: 13px; 
            color: #ad1457; 
            text-decoration: none;
            font-weight: 500;
        }

        .btn-batal:hover { 
            color: #880e4f;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="box-edit">
    <h2>Edit Data Pasien</h2>
    
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($pasien['id']); ?>">

        <div class="form-group">
            <label>Nama Lengkap Pasien</label>
            <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($pasien['nama_lengkap']); ?>" required>
        </div>

        <div class="form-group">
            <label>Status Pasien</label>
            <select name="status">
                <option value="Menunggu Jadwal" <?= ($pasien['status'] == 'Menunggu Jadwal') ? 'selected' : ''; ?>>Menunggu Jadwal</option>
                <option value="Sedang Berjalan" <?= ($pasien['status'] == 'Sedang Berjalan') ? 'selected' : ''; ?>>Sedang Berjalan</option>
                <option value="Selesai Konseling" <?= ($pasien['status'] == 'Selesai Konseling') ? 'selected' : ''; ?>>Selesai Konseling</option>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn-simpan">Simpan Perubahan</button>
        <a href="admin.php" class="btn-batal">Kembali ke Admin</a>
    </form>
</div>

</body>
</html>