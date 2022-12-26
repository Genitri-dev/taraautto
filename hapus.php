<?php
    require 'functions.php';

    $id = $_GET["id"];
    
    if( hapus($id) > 0 ) {
        echo "
            <script>
                alert('Produk Derhasil Dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pata Gagal Hapus!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    
?>