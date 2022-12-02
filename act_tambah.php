<?php 

require 'functions.php';

$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$jurusan = $_POST['jurusan'];
$email = $_POST['email'];
$gambar = $_POST ["gambar"];

$query = "INSERT INTO tbl_siswa (nama,nisn,jurusan,email,gambar) VALUES('$nama', '$nisn', '$jurusan', '$email', '$gambar')";
tambah ($_POST);

?>