<?php
 	require 'koneksi.php';
 	ini_set('display_errors', 1);
	error_reporting(-1);
	$verfi = 0;
	//query
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
}
//registrasi
function registrasi($data){
	 	 #variable	
	     global $conn;
     	 $username = $data["username"];
		 $name = $data["nama"];
     	 $phone = $data["phone"];
     	 $password = $data["password"];
         $password2 =$data["password2"];
		    #cek apakah username sudah terdaftar atau belum 
	  		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    	    if( mysqli_fetch_assoc($result) ) {
    	    	echo "<script>
				alert('username sudah terdaftar')
				</script>";
    	    	return false;
    	    }
			// cek form sudah di isi atau belum
			if (empty($username && $password)){
				echo "<script>
    	    			alert('username dan password harus di isi')
    	    	      </script>";
    	    	return false;
			} 
			// cek konfirmasi password
   	
			if( $password !== $password2 ) {
				
				echo "<script>
	  			alert('konfirmasi password tidak sesuai!');
	  	      </script>";
	
			  return false;
			}
			// enkripsi password
			$password = password_hash($password, PASSWORD_DEFAULT);
			// tambahkan userbaru ke database
			mysqli_query($conn, "INSERT INTO `user` (`userid`, `username`, `nama`, `userphone`, `password`) VALUES (NULL, '{$username}', '{$name}', '{$phone}', '{$password}')");
			return mysqli_affected_rows($conn);
}

//menambahkan 
function tambah ($data){
	global $conn;
	$namaproduk =  htmlspecialchars($data["namaproduk"]);
	$stokproduk =  htmlspecialchars($data["stokproduk"]);
    $hargaproduk = htmlspecialchars($data["hargaproduk"]);

	print_r($_FILES['gambarproduk']);
	// upload gambar
	$gambarproduk = upload();
	if( !$gambarproduk ){
		return false;
	}

	//memasukan data ke data base
	$query = "INSERT INTO `produk`
			 VALUES 
			 (NULL,'$namaproduk','$stokproduk','$gambarproduk','$hargaproduk')
			 ";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function upload() {
	global $verfi;
	$namaFile = $_FILES['gambarproduk']['name'];
	$ukuranFile = $_FILES['gambarproduk']['size'];
	$error = $_FILES['gambarproduk']['error'];
	$tmpName = $_FILES['gambarproduk']['tmp_name'];
	// di upload atau tidak
	if ( $error === 4 ){
		echo"
			<script>
				alert('Gambar Tidak Bole Kosong');
			</script>
		";
		return false;
	}
	
	//hanya boleh upload gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	
	$ekstensiGambar = explode('.', $namaFile);
	
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}
	//jika ukuran gambar terlalubesar 
	else if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
		exit();
	} else {
		//lolos pengecekan gambar lolos di upload 
		// generate nama gambar baru 
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
		return $namaFileBaru;
	}
}

//hapus produk
function hapus ($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE produkid = $id");
	return mysqli_affected_rows($conn);
}


//ubah informasi produk
function ubah ($data){
	global $conn;
	$id = $data["produkid"];
	$namaproduk =  ($data["namaproduk"]);
	$stokproduk =  ($data["stokproduk"]);
    $hargaproduk = ($data["hargaproduk"]);
	$gambarLama = ($data["gambarLama"]);
	$gambarproduk = isset ($data["gambarproduk"]);
	//cek user memasukan gambar baru atau tidak
	if ($_FILES["gambarproduk"]["error"] === 4) {
		$gambarproduk = $gambarLama;
	} else {
		$gambarproduk = upload();
	}
	
	
	//memasukan data ke data base
	$query = "UPDATE `produk` SET 
	`namaproduk` = '$namaproduk', 
	`stokproduk` = '$stokproduk', 
	`gambarproduk` = '$gambarproduk', 
	`hargaproduk` = '$hargaproduk'
	 WHERE `produk`.`produkid` = $id ";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

?>