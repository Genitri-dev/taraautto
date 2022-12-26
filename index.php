<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    require 'koneksi.php';
    $produk = mysqli_query($conn,"SELECT * FROM produk ORDER BY namaproduk");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>index</h1>
    <table border = "1" cellpadding = "10" cellspacing = "8">
        <tr>
            <th>NO</th>
            <th>Aksi</th>
            <th>Id Produk</th>
            <th>Nama Produk</th>
            <th>Stok Produk</th>
            <th>Gambar Produk</th>
            <th>Harga Produk</th>
        </tr>
         <!--menampilkan tabel dari database  -->
         <?php $i = 1; ?>
         <?php foreach( $produk as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">Edit</a> 
                    |
                <a href="">Delete</a>
            </td>
            <td> <?= $row["produkid"]; ?> </td>
            <td> <?= $row["namaproduk"]; ?> </td>
            <td> <?= $row["stokproduk"]; ?> </td>
            <td> <img src="./img/<?= $row['gabarproduk']?>"></td>
            <td> <?= $row["hargaproduk"]; ?> </td>
        </tr>
        <?php $i++; ?>
	    <?php endforeach; ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>