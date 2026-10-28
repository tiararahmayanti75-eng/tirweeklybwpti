<?php
// Koneksi ke database (Pastikan namanya db_counseling)
$conn = new mysqli("localhost", "root", "", "db_counseling"); 

if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor_wa = $_POST['nomor_wa']; // Disesuaikan dengan database: nomor_wa
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $psikolog = $_POST['psikolog'];
    $layanan = $_POST['layanan'];
    $media = $_POST['media'];
    $keluhan = $_POST['keluhan']; 

    // Query disesuaikan dengan struktur asli di HeidiSQL kamu
    $query = "INSERT INTO pendaftaran (nama_lengkap, email, nomor_wa, hari, tanggal, jam, pilihan_psikolog, jenis_layanan, jenis_konseling, keluhan, status) 
              VALUES ('$nama', '$email', '$nomor_wa', '$hari', '$tanggal', '$jam', '$psikolog', '$layanan', '$media', '$keluhan', 'Menunggu Jadwal')";
    
    if ($conn->query($query)) {
        echo "<script>alert('Pendaftaran Berhasil!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Format Pendaftaran Counseling - Kalih Aksa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f0f6;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .form-container {
            background: #ffffff;
            max-width: 600px;
            width: 100%;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #eae2ec;
            padding-bottom: 15px;
        }
        .header h2 {
            color: #4a154b;
            margin: 0 0 5px 0;
        }
        .header p {
            color: #6c757d;
            font-size: 14px;
            margin: 0;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form-group input[type="file"] {
            font-size: 14px;
        }
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }
        .radio-group label {
            font-weight: normal;
            cursor: pointer;
        }
        .btn-submit {
            background-color: #4a154b;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .btn-submit:hover {
            background-color: #631d64;
        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="header">
        <h2>Format Pendaftaran Counseling</h2>
        <p>Silakan isi format di atas agar kami dapat cek ketersediaan waktu.</p>
    </div>

    <form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="foto_ktp">Silahkan kirimkan foto KTP (Guna Kepentingan administrasi)</label>
            <input type="file" id="foto_ktp" name="foto_ktp" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="name_lengkap">Nama Lengkap</label>
            <input type="text" id="name_lengkap" name="name_lengkap" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
            <label for="tempat_tanggal_lahir">Tempat, Tanggal Lahir</label>
            <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" placeholder="Contoh: Semarang, 06 Februari 2005" required>
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Contoh: Mahasiswa / Karyawan" required>
        </div>

        <div class="form-group">
            <label for="warna_favorite">Warna Favorit</label>
            <input type="text" id="warna_favorite" name="warna_favorite" placeholder="Masukkan warna favorit" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="contoh@email.com" required>
        </div>

        <div class="form-group">
            <label for="nomor_wa">Nomor Telepon/WhatsApp</label>
            <input type="text" id="nomor_wa" name="nomor_wa" placeholder="Contoh: 081234567890" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki</label>
                <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
            </div>
        </div>

        <div class="form-group">
            <label for="jenis_layanan">Jenis Layanan</label>
            <select id="jenis_layanan" name="jenis_layanan" required>
                <option value="">-- Pilih Layanan --</option>
                <option value="Konseling Online">Konseling Online</option>
                <option value="Konseling Offline">Konseling Offline</option>
                <option value="Peer Counseling">Peer Counseling</option>
                <option value="Konseling Couple">Konseling Couple</option>
                <option value="Konseling Family">Konseling Family</option>
                <option value="Psikotes Anak">Psikotes Anak</option>
                <option value="Hypnotherapy">Hypnotherapy</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jenis Konseling</label>
            <div class="radio-group">
                <label><input type="radio" name="jenis_konseling" value="Online" required> Online</label>
                <label><input type="radio" name="jenis_konseling" value="Offline"> Offline</label>
            </div>
        </div>

        <div class="form-group">
            <label for="hari">Hari</label>
            <select id="hari" name="hari" required>
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
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" required>
        </div>

        <div class="form-group">
            <label for="jam">Jam</label>
            <select id="jam" name="jam" required>
                <option value="">-- Pilih Jam Sesi --</option>
                <option value="09.00-11.00">09.00-11.00</option>
                <option value="11.00-13.00">11.00-13.00</option>
                <option value="13.00-15.00">13.00-15.00</option>
                <option value="15.00-17.00">15.00-17.00</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keluhan">Deskripsi singkat masalah/keluhan</label>
            <textarea id="keluhan" name="keluhan" rows="4" placeholder="Ceritakan singkat masalah/keluhan yang ingin dikonsultasikan..." required></textarea>
        </div>

        <div class="form-group">
            <label for="pilihan_psikolog">Pilihan Psikolog</label>
            <select id="pilihan_psikolog" name="pilihan_psikolog" required>
                <option value="Psikolog Rekomendasi (Otomatis)">Psikolog Rekomendasi (Otomatis)</option>
                <option value="Debby Ivana Korry, M.Psi., Psikolog">Debby Ivana Korry, M.Psi., Psikolog</option>
                <option value="Marsela Rizky Amalia, M.Psi., Psikolog">Marsela Rizky Amalia, M.Psi., Psikolog</option>
                <option value="Kanti Nuarisha, M.Psi., Psikolog">Kanti Nuarisha, M.Psi., Psikolog</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sumber_info">Mengetahui Kalihaksa dari</label>
            <input type="text" id="sumber_info" name="sumber_info" placeholder="Contoh: Instagram, Teman, Website" required>
        </div>

        <button type="submit" class="btn-submit">Kirim Pendaftaran</button>
    </form>
</div>

</body>
</html>