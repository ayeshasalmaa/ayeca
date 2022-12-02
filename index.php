<?php 
// koneksi ke database

require 'functions.php';

$hasil = query ("SELECT * FROM tbl_dasis");

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
        h1 {
            text-align: center;
            font-size: 50px;
            font-family: arial;
        }
        table {
            text-align: center;
        }
    </style>
</head>
<body>

<h1>DAFTAR DATA SISWA</h1>
<br>
<a   href="tambah.php">Tambah Data Siswa</a>
<br><br>
<table bgcolor=cornsilk border="1">
    <tr>
        <td>Id: </td>
        <td>Nama: </td>
        <td>Nis: </td>
        <td>Jurusan: </td>
        <td>Email: </td>
        <td>Gambar: </td>
        <td>Aksi: </td>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($hasil as $cetak) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $cetak ['nama'] ?></td>
        <td><?= $cetak ['nis'] ?></td>
        <td><?= $cetak ['jurusan'] ?></td>
        <td><?= $cetak ['email'] ?></td>
        <td><img src="property/img/<?= $cetak['gambar'] ?>" alt="" width="100"></td>
        <td>
            <a href="ubah.php?id=<?= $cetak ['id'] ?>">Ubah</a>
            <a href="hapus.php?id=<?= $cetak ['id'] ?>"
            onclick="return confirm ('yakin dek?')">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?> 
    
</table>

</body>
</html>