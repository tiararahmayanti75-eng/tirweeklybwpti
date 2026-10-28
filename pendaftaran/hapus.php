<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_counseling";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Eksekusi query hapus
    $query = "DELETE FROM pendaftaran WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data pasien berhasil dihapus!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='admin.php';</script>";
    }
} else {
    header("Location: admin.php");
    exit;
}
?>