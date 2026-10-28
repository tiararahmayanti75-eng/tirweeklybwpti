<?php
// PROSES SIMPAN DATA PENDAFTARAN KE DATABASE
$host = "localhost";
$user = "root";
$password = "";
$database = "db_counseling";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['kirim'])) {
    $nama_lengkap     = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $email            = mysqli_real_escape_string($koneksi, $_POST['email']);
    $hari             = mysqli_real_escape_string($koneksi, $_POST['hari']);
    $tanggal          = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jam              = mysqli_real_escape_string($koneksi, $_POST['jam']);
    $pilihan_psikolog = mysqli_real_escape_string($koneksi, $_POST['pilihan_psikolog']);
    $jenis_layanan    = mysqli_real_escape_string($koneksi, $_POST['jenis_layanan']);
    $jenis_konseling   = mysqli_real_escape_string($koneksi, $_POST['jenis_konseling']);
    
    // Status awal otomatis terisi "Menunggu Jadwal" saat pasien mendaftar
    $status_awal      = "Menunggu Jadwal";

    $query_input = "INSERT INTO pendaftaran (nama_lengkap, email, hari, tanggal, jam, pilihan_psikolog, jenis_layanan, jenis_konseling, status) 
                    VALUES ('$nama_lengkap', '$email', '$hari', '$tanggal', '$jam', '$pilihan_psikolog', '$jenis_layanan', '$jenis_konseling', '$status_awal')";

    if (mysqli_query($koneksi, $query_input)) {
        echo "<script>
                alert('Pendaftaran Berhasil! Jadwal Anda telah disimpan.');
                window.location.href = 'daftar.php';
              </script>";
        exit;
    } else {
        echo "<script>alert('Gagal mengirim pendaftaran. Silakan coba lagi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Format Pendaftaran Counseling</title>
    <style>
        /* GRADASI LATAR BELAKANG UNGU-PINK SESUAI CONTOH FOTO */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f3e5f5 0%, #fce4ec 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
            box-sizing: border-box;
        }

        /* KOTAK PUTIH UTAMA (CARD FORM) */
        .wrapper-form {
            width: 100%;
            max-width: 550px;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(136, 14, 79, 0.06);
            box-sizing: border-box;
        }

        /* JUDUL FORM */
        h2 {
            color: #4a148c;
            margin-top: 0;
            margin-bottom: 8px;
            text-align: center;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .subtitle {
            text-align: center;
            color: #880e4f;
            font-size: 14px;
            margin-bottom: 35px;
            font-weight: 500;
        }

        /* GRUP INPUT */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a148c;
            font-size: 13.5px;
        }

        /* INPUT DAN SELECT BOX MINIMALIS */
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group input[type="time"],
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e1bee7;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333333;
            background-color: #fafafa;
            outline: none;
            transition: all 0.3s ease;
        }

        /* EFEK SAAT INPUT DI-KLIK (FOCUS) */
        .form-group input:focus,
        .form-group select:focus {
            border-color: #ba68c8;
            background-color: #ffffff;
            box-shadow: 0 0 8px rgba(186, 104, 200, 0.25);
        }

        /* BARIS INPUT KEMBAR (HARI & TANGGAL) */
        .row-inputs {
            display: flex;
            gap: 15px;
        }

        .row-inputs .form-group {
            flex: 1;
        }

        /* TOMBOL KIRIM BERGAYA PILL */
        .btn-kirim {
            width: 100%;
            padding: 14px;
            background-color: #9c27b0;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 700;
            font-size: 15px;
            margin-top: 15px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(156, 39, 176, 0.2);
            transition: all 0.3s ease;
        }

        /* EFEK HOVER TOMBOL */
        .btn-kirim:hover {
            background-color: #880e4f;
            box-shadow: 0 6px 20px rgba(136, 14, 79, 0.25);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<div class="wrapper-form">
    <h2>Format Pendaftaran</h2>
    <div class="subtitle">Silakan lengkapi formulir konseling di bawah ini</div>
    
    <form action="" method="POST">
        
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" required>
        </div>

        <div class="form-group">
            <label>Alamat Email</label>
            <input type="email" name="email" placeholder="contoh@email.com" required>
        </div>

        <div class="row-inputs">
            <div class="form-group">
                <label>Hari</label>
                <select name="hari" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
            </div>
        </div>

        <div class="form-group">
            <label>Jam Sesi Konseling</label>
            <input type="time" name="jam" required>
        </div>

        <div class="form-group">
            <label for="pilihan_psikolog">Pilihan Psikolog</label>
            <select id="pilihan_psikolog" name="pilihan_psikolog" required>
                <option value="">-- Pilih Dokter / Psikolog --</option>
                <option value="Debby Ivana Korry, M.Psi., Psikolog">Debby Ivana Korry, M.Psi., Psikolog (Industri & Organisasi)</option>
                <option value="Marsela Rizky Amalia, M.Psi., Psikolog">Marsela Rizky Amalia, M.Psi., Psikolog (Klinis Dewasa)</option>
                <option value="Kanti Nuarisha, M.Psi., Psikolog">Kanti Nuarisha, M.Psi., Psikolog (Klinis Dewasa)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Layanan</label>
            <select name="jenis_layanan" required>
                <option value="">-- Pilih Layanan --</option>
                <option value="Mental Health Counseling">Mental Health Counseling</option>
                <option value="Career & Development">Career & Development</option>
                <option value="Relationship Counseling">Relationship Counseling</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Media Konseling</label>
            <select name="jenis_konseling" required>
                <option value="">-- Pilih Media --</option>
                <option value="Offline Meeting (Tatap Muka)">Offline Meeting (Tatap Muka)</option>
                <option value="Online Chatting (WhatsApp)">Online Chatting (WhatsApp)</option>
                <option value="Online Video Call (Zoom)">Online Video Call (Zoom)</option>
            </select>
        </div>

        <button type="submit" name="kirim" class="btn-kirim">Kirim Pendaftaran</button>
    </form>
</div>

</body>
</html>