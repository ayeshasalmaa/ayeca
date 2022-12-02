<?php 

$koneksi = mysqli_connect('localhost','root','','db_siswa');

function query($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query); // nilai objek
    $kotakbesar = [];
    while ($kotakkecil = mysqli_fetch_assoc($hasil)) { // array assosiatif
        $kotakbesar [] = $kotakkecil;
    }
    return $kotakbesar;
}

function tambah ($post) {
    global $koneksi;

    $nama = $post ["nama"];
    $nis = $post ["nis"];
    $jurusan = $post ["jurusan"];
    $email = $post ["email"];
    // $gambar = $post["gambar"];

    $gambar = upload ();
    if (!$gambar) {
        return false;
    }
   
    $sql = "INSERT INTO tbl_dasis VALUES (
        '','$nama','$nis','$jurusan','$email','$gambar'
    )";
    
    mysqli_query ($koneksi, $sql);

    return mysqli_affected_rows ($koneksi);
}

function upload () {
    $namaFile = $_FILES ["gambar"] ["name"];
    $ukuranFile = $_FILES ["gambar"] ["size"];
    $error = $_FILES ["gambar"] ["error"];
    $tmpName = $_FILES ["gambar"] ["tmp_name"];
    
    if ($error === 4) {
        echo"
        <script>
        alert ('pilih gambar duluuuuuu');
        </script>";
        return false;
    }

    $ekstensiValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode ('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiValid)){
        echo"
        <script>
        alert ('salah, yang bener dong');
        </script>";
        return false;
    }

    if ($ukuranFile > 2000000){
        echo"
        <script>
        alert ('ini kegedean, pilih lagi');
        </script>";
        return false;
    }

    // $namaFileBaru = uniqid();
    // $namaFileBaru .= '.';
    // $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file ($tmpName, 'property/img/' . $namaFile);

    return $namaFile;
    }

    function hapus ($id) {
        global $koneksi;
        mysqli_query ($koneksi, "DELETE FROM tbl_dasis WHERE id = $id");

        return mysqli_affected_rows ($koneksi);
    }

    function ubah ($post) {
        global $koneksi;
        $id = htmlspecialchars ($post ["id"]);
        $nama = htmlspecialchars ($post ["nama"]);
        $nis = htmlspecialchars ($post["nis"]);       
        $jurusan = htmlspecialchars ($post ["jurusan"]);
        $email = htmlspecialchars ($post ["email"]);
        $gambarLama = htmlspecialchars ($post ["gambarLama"]);

        if ( $_FILES ["gambar"]["error"] === 4 ) {
            $gambar = $gambarLama;
        } else {
            $gambar = upload ();
        }

        $sql = "UPDATE tbl_dasis SET
        nama = '$nama',
        nis = '$nis',
        jurusan = '$jurusan',
        email = '$email',
        gambar = '$gambar'        
        WHERE id = $id"; 
        mysqli_query ($koneksi, $sql);

        return mysqli_affected_rows ($koneksi);
    }

    function register ($post) {
        global $koneksi;
        $username = strtolower (stripslashes($post["username"]));
        $password = mysqli_real_escape_string($koneksi, $post["pass"]);
        $password2 = mysqli_real_escape_string($koneksi, $post["pass2"]);

        $result = mysqli_query ($koneksi, "SELECT * FROM tbl_users WHERE username = '$username'");
        if (mysqli_fetch_assoc ($result)) {
            echo "
            <script>
            alert ('username udah dipake, ganti');
            </script>
            ";
            return false;
        }

        if ($password !== $password2) {
            echo "
            <script>
            alert ('konfirm pass yang bener dong, salah nih');
            </script>
            ";
            return false;
        }
        
        $password = password_hash ($password, PASSWORD_DEFAULT);
        mysqli_query ($koneksi, "INSERT INTO tbl_users VALUES ('', '$username', '$password')");
        return mysqli_affected_rows ($koneksi);
    }
?>