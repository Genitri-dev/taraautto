<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    ?>
<!DOCTYPE html>
<?php
    require 'koneksi.php';
    $result = mysqli_query($conn,"SELECT * FROM produk");
    
?>
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
        <tr>
            <td>1</td>
            <td>
                <a href="">Edit</a> 
                    |
                <a href="">Delete</a>
            </td>
            <td>1</td>
            <td>Oli Federal</td>
            <td>25</td>
            <td><img src="img/olifederal.jpeg" alt=""></td>
            <td>45000</td>
        </tr>

    </table>
    <a href="logout.php">Logout</a>
</body>
</html>