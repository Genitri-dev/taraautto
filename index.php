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
    <h1>Stok Produk</h1>
    <a href="tambah.php">Tambahkan Produk</a>
    <br> <br>
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
                <a href="ubah.php?id=<?= $row['produkid']?>">Edit</a> 
                    |
                <a href="hapus.php?id=<?= $row['produkid']?>" onclick="return confirm('Apakah Produk Akan Di Hapus');">Delete</a>
            </td>
            <td> <?= $row["produkid"]; ?> </td>
            <td> <?= $row["namaproduk"]; ?> </td>
            <td> <?= $row["stokproduk"]; ?> </td>
            <td> <img src="./img/<?= $row['gambarproduk']?>" width="40%"></td>
            <td> <?= $row["hargaproduk"]; ?> </td>
        </tr>
        <?php $i++; ?>
	    <?php endforeach; ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>