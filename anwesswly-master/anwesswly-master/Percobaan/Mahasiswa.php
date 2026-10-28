<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1 align="center">
        Web Teknologi lnfomasi UNIMUS 2026
    </h1>
    <table border="1" align="center" cellspacing="10px">
        <tr>
            <td><a href="index.html">Home</a>
            </td>
            <td><a href="profile.html">Profile</a>
            </td>
            <td><a href="contact.html">Contact</a>
            </td>
            <td>
                <a href="mahasiswa.html">Data Mahasiswa</a>
            </td>
        </tr>
    </table>
    <h2>
        Data Mahasiswa
    </h2>
    <a href="TambahData.php" class="ButtonTambahData"> <button type="button">Tambah Data</button>
</a>
    <table border="1" celpadding="5px">
        <tr>
           <th>No</th>
           <th>Nama</th>
           <th>Nim</th>
           <th>Jurusan</th>
           <th>Email</th>
           <th>No.Hp</th>
           <th>Foto</th>
           <th>Aksi</th>
        </tr>
       <?php
       $no=1;
       foreach($mahasiswa as $mhs):
         ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?php echo $mhs["nama"]; ?></td>
            <td><?php echo $mhs["nim"]; ?></td>
            <td align="center"><?php echo $mhs["jurusan"]; ?></td>
            </tr>
            <tr>
                <td>2.1</td>
                <td rowspan="2" colspan="2"></td>
                <td>2.4</td>
            </tr>
            <tr>
                <td>3.1</td>
                <td>3.4</td>
            </tr>
            <tr>
                <td>4.1</td>
                <td>4.2</td>
                <td>4.3</td>
                <td>4.4</td>
            </tr>
    </table>
</body>

</html>