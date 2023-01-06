<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    echo "Welcome, " . $_SESSION['username']." ";
    require 'koneksi.php';
    $produk = mysqli_query($conn,"SELECT * FROM produk ORDER BY namaproduk");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tara Auto</title>
    <link rel="stylesheet" href="style/style.css">
	<!-- Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <h1 id="judul" ><span id="judul2">Stok</span> Produk</h1>
    <div id="tambah_wp">    
        <a id="tambah" href="tambah.php"> 
            <svg xmlns="http://www.w3.org/2000/svg" id="svg_add" height="48" width="48"><path d="M22.5 38V25.5H10v-3h12.5V10h3v12.5H38v3H25.5V38Z"/></svg> 
            <p>Tambahkan Produk</p>
        </a>
    </div>
    <a href="logout.php">Logout</a>
    <br> <br>
    <div id="prod_out1">
        <!--menampilkan tabel dari database  -->
        <?php foreach( $produk as $row ) : ?>
            <div id="prod_out2">
                <div id="wpin_index">
                    <h3 id="namaproduk"><?= $row["namaproduk"]; ?> </h3>
                    <img id ="img_indx"src="./img/<?= $row['gambarproduk']?>" width="40%">
                    <p id="harga"><?= $row["hargaproduk"]; ?> </p>
                    <p id="stok">Stok : <?= $row["stokproduk"]; ?> </p>
                    <p id="history">Last Update by : <?= $row["nama"]; ?></p>
                    <p id="actions"><a id="a_edit" href="ubah.php?id=<?= $row['produkid']?>">Edit Produk</a> 
                    <a id="a_dell" href="hapus.php?id=<?= $row['produkid']?>" 
                    onclick="return confirm('Apakah Produk Akan Di Hapus');">Dellete Produk</a></p>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</body>
</html>