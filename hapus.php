<?php

require 'functions.php';

$id = $_GET ["id"];
if ( hapus ($id) > 0 ) {
    echo "
    <script>
    alert ('gini dong, berhasil')
    document.location.href = 'index.php'
    </script>
    ";
} else {
    echo "
    <script>
    alert ('gagal nih, ulang')
    document.location.href = 'index.php'
    </script>
    ";
}

?>