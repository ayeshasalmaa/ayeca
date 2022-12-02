<?php

session_start();
require 'functions.php';

if ( isset ($_POST ["submit"])) {
    $username = $_POST ["username"];
    $password = $_POST ["pass"];
    // var_dump ($username);
    // var_dump ($password);
    // exit;
    // ambil data dari database berdasarkan username
    $data = mysqli_query ($koneksi, "SELECT * FROM tbl_users WHERE username = '$username'");
    // $test = mysqli_num_rows($data);
    // var_dump (mysqli_num_rows($data));
    // exit;
    if ( mysqli_num_rows($data) === 1 ) {
        // cek password menggunakan fungsi verify
        // parameter pertama adalah password yang ditulis user
        // parameter kedua adalah password yang diambil dari database
        $cekData = mysqli_fetch_assoc ($data);
        // var_dump ($cekData);
        // exit;
        if ( password_verify ($password, $cekData ["pass"])) {
            $_SESSION ["username"] = $cekData ["username"];
            $_SESSION ["login"] = true;
            header ("Location: index.php");
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
</head>
<body>

    <h1>FORM LOGIN</h1>
    <?php if ( isset ($error)) { ?>
        <p style = "color:red; font-style:italic;">Username / Password salah</p>
    <?php } ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off">
            </li>
            <li>
                <label for="pass">Password</label>
                <input type="text" name="pass" id="pass">
            </li>
            <li>
                <button type="submit" name="submit">Kirim</button>
            </li>
        </ul>
    </form>
    <a href="regis.php">Sign Up</a>
    
</body>
</html>