<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    if( isset($_POST["submit"]) ){
        //apakah data berhasil di masukan atau tidak
        if( tambah($_POST) > 0){
            echo "
                <script>
                    alert('Produk Baru Berhasil Di Tambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "produk tidak berhasil di tambahkan";
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tara Auto</title>
</head>
<body>
    <h1>tambah.php</h1> <a href="logout.php">Logout</a>

    <form action="" method="POST" enctype="multipart/form-data" >
    <ul>
			<li>
				<label for="namaproduk">Nama Produk : </label>
				<input type="text" name="namaproduk" id="namaproduk" required>
			</li>
			<li>
				<label for="stokproduk">Stok Produk : </label>
				<input type="text" name="stokproduk" id="stokproduk" required>
			</li>
			<li>
				<label for="gambarproduk">Gabar Produk :</label>
				<input type="file" name="gambarproduk" id="gambarproduk" required>
			</li>
			<li>
				<label for="hargaproduk">Harga Produk :</label>
				<input type="text" name="hargaproduk" id="hargaproduk" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Produk!</button>
			</li>
		</ul>
    </form>
</body>
</html>