<?php
session_start();

// Proteksi: Harus login admin
if (!isset($_SESSION['login_admin'])) {
    header("Location: login.php");
    exit;
}

$host = "localhost";
$user = "root";
$password = "";
$database = "db_counseling";
$koneksi = mysqli_connect($host, $user, $password, $database);

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id = '$id'");
    $pasien = mysqli_fetch_assoc($query);

    if (!$pasien) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Data Pasien - <?= htmlspecialchars($pasien['nama_lengkap']); ?></title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; padding: 40px; background: #fff; }
        .invoice-box { max-width: 800px; margin: auto; border: 1px solid #ddd; padding: 30px; border-radius: 8px; }
        .header { text-align: center; border-bottom: 3px double #880e4f; padding-bottom: 10px; margin-bottom: 30px; }
        .header h2 { margin: 0; color: #880e4f; }
        .header p { margin: 5px 0 0 0; font-size: 14px; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        table td { padding: 12px; vertical-align: top; }
        table td.label { width: 30%; font-weight: bold; color: #4a148c; border-bottom: 1px solid #eee; }
        table td.value { border-bottom: 1px solid #eee; }
        .footer { text-align: right; margin-top: 50px; font-size: 14px; }
        .signature { margin-top: 70px; display: inline-block; text-align: center; width: 200px; border-top: 1px solid #333; padding-top: 5px; }
        
        /* Trigger Print Otomatis */
        @media print {
            body { padding: 0; }
            .invoice-box { border: none; padding: 0; }
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <div class="header">
        <h2>SISTEM INFORMASI LAYANAN COUNSELING</h2>
        <p>Lembar Bukti Pendaftaran Konseling Resmi Pasien</p>
    </div>

    <table>
        <tr>
            <td class="label">ID Pendaftaran</td>
            <td class="value">#00<?= htmlspecialchars($pasien['id']); ?></td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap Pasien</td>
            <td class="value"><strong><?= htmlspecialchars($pasien['nama_lengkap']); ?></strong></td>
        </tr>
        <tr>
            <td class="label">Alamat Email</td>
            <td class="value"><?= htmlspecialchars($pasien['email']); ?></td>
        </tr>
        <tr>
            <td class="label">Jadwal Konseling</td>
            <td class="value"><?= htmlspecialchars($pasien['hari']); ?>, <?= htmlspecialchars($pasien['tanggal']); ?> (Jam <?= htmlspecialchars($pasien['jam']); ?> WIB)</td>
        </tr>
        <tr>
            <td class="label">Pilihan Psikolog</td>
            <td class="value"><?= htmlspecialchars($pasien['pilihan_psikolog']); ?></td>
        </tr>
        <tr>
            <td class="label">Jenis Layanan</td>
            <td class="value"><?= htmlspecialchars($pasien['jenis_layanan']); ?> (<?= htmlspecialchars($pasien['jenis_konseling']); ?>)</td>
        </tr>
        <tr>
            <td class="label">Status Sesi Pasien</td>
            <td class="value" style="font-weight: bold; color: #ad1457;"><?= htmlspecialchars($pasien['status'] ?: 'Menunggu Jadwal'); ?></td>
        </tr>
    </table>

    <div class="footer">
        <p>Dicetak pada tanggal: <?= date('d-m-Y'); ?></p>
        <p>Petugas Administrasi,</p>
        <div class="signature">Tim Layanan Counseling</div>
    </div>
</div>

<script>
    // Membuka dialog print otomatis saat halaman dimuat
    window.onload = function() {
        window.print();
    }
</script>
</body>
</html>