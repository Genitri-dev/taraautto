<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';
    // abildata id di urtl
    $id = $_GET["id"];
    // query data produk berdasarkan id
    $prd = query("SELECT * FROM produk WHERE produkid = $id")[0];
    if( isset($_POST["submit"]) ) {

        // cek apakah data berhasil diubah atau tidak
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";  
        } 
        else {
            echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
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
    <h1>tambahkan produk baru </h1> <a href="logout.php">Logout</a>
    <form action="" method="POST" enctype="multipart/form-data">
    <ul>
        <input type="hidden" name="produkid" value="<?= $prd['produkid']?>">
        <input type="hidden" name="gambarLama" value="<?= $prd['gambarproduk']?>">
			<li>
				<label for="namaproduk">Nama Produk : </label>
				<input type="text" name="namaproduk" id="namaproduk" required value="<?= $prd["namaproduk"]; ?>">
			</li>
			<li>
				<label for="stokproduk">Stok Produk : </label>
				<input type="number" name="stokproduk" id="stokproduk" required value="<?= $prd["stokproduk"]; ?>">
			</li>
			<li>
				<label for="gambarproduk">Gabar Produk :</label> <br>
                <img src="./img/<?= $prd['gambarproduk']?>" width="10%" alt="<?= $prd["gambarproduk"]; ?>"> <br>
				<input type="file" name="gambarproduk" id="gambarproduk">
			</li>
			<li>
				<label for="hargaproduk">Harga Produk :</label>
				<input type="number" name="hargaproduk" id="hargaproduk" required value="<?= $prd["hargaproduk"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Detail Produk!</button>
			</li>
		</ul>
    </form>
</body>
</html>