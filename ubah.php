<?php

require 'functions.php';

// tangkap data id dari URL
$id = $_GET ["id"];
// var_dump ($id);
// exit;

// lakukan query data berdasarkan id 
$siswa = query ("SELECT * FROM tbl_dasis WHERE id = $id") [0];
// var_dump ($siswa);
// exit;

// cek apakah tombol kirim sudah ditekan
if (isset ($_POST ["tekan"])) {
    // var_dump ($_POST);
    // exit;
    // cek apakah data berhasil diubah
    if (ubah ($_POST) > 0) {
        echo "
        <script>
        alert ('nah, udah berhasil diubah ya dek')
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert ('salah nih, gagal');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    
     <h1>FORM UBAH</h1>

     <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $siswa ["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $siswa ["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" value="<?= $siswa ["nama"]; ?>">
            </li>
            <li>
                <label for="nis">Nisn: </label>
                <input type="text" name="nis" id="nis" value="<?= $siswa ["nis"]; ?>">
            </li>
            <li>
                <label for="jur">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $siswa ["jurusan"]; ?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= $siswa ["email"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <img src="<?= $siswa ["gambar"]; ?>" alt="" width="75"  >
                <input type="file" name="gambar" id="gambar" value="<?= $siswa ["gambar"]; ?>">
            </li>
            <button type="submit" name="tekan">Kirim Data</button>
        </ul>
     </form>

</body>
</html>