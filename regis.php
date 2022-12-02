<?php 

require 'functions.php'; 

if ( isset ($_POST ["tekan"])) {
    if ( register ($_POST) > 0 ) {
    echo "
    alert ('dah, data user berhasil ditambahin');
    document.location.href = 'login.php'
    </script>
    ";
    return false;
} else {
    echo mysqli_error ($koneksi);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>

    <h1>FORM REGISTER</h1>
    <form action="" method="post">
        <ul>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </ul>
        <ul>
            <label for="pass">Password</label>
            <input type="text" name="pass" id="pass">
        </ul>
        <ul>
            <label for="pass2">Konfirmasi Password</label>
            <input type="text" name="pass2" id="pass2">
        </ul>
        <button type="submit" name="tekan">Kirim</button>
    </form>
    <br>
    <a href="login.php">Kembali ke halaman Login</a>
    
</body>
</html>