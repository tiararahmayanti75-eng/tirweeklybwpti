<?php
$conn = new mysqli("localhost", "root", "", "db_counseling"); 

// Statistik data
$total_pendaftar = $conn->query("SELECT id FROM pendaftaran")->num_rows;
$menunggu = $conn->query("SELECT id FROM pendaftaran WHERE status='Menunggu Jadwal'")->num_rows;
$sedang_proses = $conn->query("SELECT id FROM pendaftaran WHERE status='Sedang Proses'")->num_rows;
$selesai = $conn->query("SELECT id FROM pendaftaran WHERE status='Selesai Konseling'")->num_rows;

// List pendaftar
$pendaftar_list = $conn->query("SELECT * FROM pendaftaran ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Admin - Counseling</title>
    
    <!-- PANGGIL SWEETALERT2 UNTUK POP-UP INTERAKTIF -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { font-family: Arial, sans-serif; background-color: #fceeff; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        h2 { text-align: center; color: #4a154b; }
        h4 { text-align: center; color: #777; margin-top: -10px; }
        
        .stats-grid { display: flex; gap: 15px; justify-content: space-between; margin-bottom: 25px; }
        .stat-box { flex: 1; padding: 15px; border-radius: 8px; color: white; text-align: center; font-weight: bold; }
        .bg-total { background-color: #6a0dad; }
        .bg-tunggu { background-color: #ffa500; }
        .bg-proses { background-color: #007bff; }
        .bg-selesai { background-color: #28a745; }
        
        /* Pembungkus Tabel Responsive */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            margin-top: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px; 
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 13px;
            white-space: normal;
            word-break: break-word;
        }
        th { background-color: #8a2be2; color: white; }
        tr:hover { background-color: #f9f2ff; }
        
        .col-nama { width: 120px; }
        .col-kontak { width: 140px; }
        .col-jadwal { width: 130px; }
        .col-psikolog { width: 150px; } 
        .col-layanan { width: 130px; }
        .col-keluhan { width: 200px; } 
        
        .btn { padding: 6px 12px; color: white; text-decoration: none; border-radius: 4px; font-size: 12px; display: inline-block; margin-bottom: 2px; }
        .btn-pdf { background-color: #dc3545; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-hapus { background-color: #6c757d; cursor: pointer; border: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Counseling</h2>
    <h4>Admin Page</h4>
    
    <div class="stats-grid">
        <div class="stat-box bg-total">Total Pendaftar<br><?php echo $total_pendaftar; ?> Data</div>
        <div class="stat-box bg-tunggu">Menunggu Jadwal<br><?php echo $menunggu; ?> Data</div>
        <div class="stat-box bg-proses">Sedang Proses<br><?php echo $sedang_proses; ?> Data</div>
        <div class="stat-box bg-selesai">Selesai Konseling<br><?php echo $selesai; ?> Data</div>
    </div>
    
    <h3>Daftar Pendaftaran Konseling</h3>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th class="col-nama">Nama Pasien</th>
                    <th class="col-kontak">Kontak Pasien</th>
                    <th class="col-jadwal">Jadwal Konseling</th>
                    <th class="col-psikolog">Psikolog</th>
                    <th class="col-layanan">Layanan & Media</th>
                    <th class="col-keluhan">Keluhan</th>
                    <th>Status Pasien</th>
                    <th>Aksi Management</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while($row = $pendaftar_list->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><strong><?php echo $row['nama_lengkap']; ?></strong></td>
                    <td>
                        <?php echo $row['email']; ?><br>
                        <small style="color: #25D366; font-weight: bold;">WA: <?php echo $row['nomor_wa']; ?></small>
                    </td>
                    <td>
                        <?php echo $row['hari']; ?>, <?php echo date('d-m-Y', strtotime($row['tanggal'])); ?><br>
                        <small>Jam: <?php echo $row['jam']; ?> WIB</small>
                    </td>
                    <td><?php echo $row['pilihan_psikolog']; ?></td>
                    <td>
                        <?php echo $row['jenis_layanan']; ?><br>
                        <small style="color: #6a0dad;">Media: <?php echo $row['jenis_konseling']; ?></small>
                    </td>
                    <td><i style="color: #555;"><?php echo $row['keluhan']; ?></i></td>
                    <td>
                        <span style="font-weight: bold; color: <?php echo ($row['status'] == 'Selesai Konseling') ? 'green' : (($row['status'] == 'Sedang Proses') ? 'blue' : 'orange'); ?>">
                            <?php echo $row['status']; ?>
                        </span>
                    </td>
                    <td>
                        <a href="cetak.php?id=<?php echo $row['id']; ?>" class="btn btn-pdf">Cetak PDF</a>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                        
                        <!-- TOMBOL HAPUS DENGAN SWEETALERT2 -->
                        <button class="btn btn-hapus" onclick="konfirmasiHapus('<?php echo $row['id']; ?>', '<?php echo $row['nama_lengkap']; ?>')">Hapus</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- JAVASCRIPT ANIMASI POP-UP KONFIRMASI HAPUS DATA -->
<script>
function konfirmasiHapus(id, nama) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data pendaftaran atas nama " + nama + " akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545', // Warna merah untuk hapus
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus Data!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika admin klik setuju, halaman langsung dialihkan ke file hapus.php bawaanmu
            window.location.href = 'hapus.php?id=' + id;
        }
    });
}
</script>

</body>
</html>