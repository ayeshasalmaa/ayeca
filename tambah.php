<?php 
// query ke database

// $sql = "INSERT INTO tbl_dasis VALUES()";

require 'functions.php';

if (isset ( $_POST ["tekan"])) 

{
    if (tambah ($_POST) > 0){
        echo "
            <script>
            alert ('nah, gini dong bener')
            document.location.href ='index.php';
            </script>
            ";
    }else {
        echo "
            <script>
            alert ('salah nih, gimanasi');        
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Siswa</title>
</head>
<body>

    <h1>Form Tambah</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="nis">Nisn: </label>
                <input type="text" name="nis" id="nis">
            </li>
            <li>
                <label for="jur">Jurusan: </label>
                <input type="text" name="jurusan" id="jur">
            </li>
            <li>
                <label for="jur">Email: </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="tekan">Kirim Data</button>
            </li>
        </ul>

    </form>
</body>
</html>