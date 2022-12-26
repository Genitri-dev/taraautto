<?php
 	require 'koneksi.php';
 	ini_set('display_errors', 1);
	error_reporting(-1);

//registrasi
function registrasi($data){
	 	 #variable	
	     global $conn;
     	 $username = $data["username"];
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
			mysqli_query($conn, "INSERT INTO user (userid, username, userphone, password) VALUES (NULL, '{$username}', '{$phone}', '{$password}')");
			return mysqli_affected_rows($conn);
}

//menambahkan 
function tambah ($data){
	global $conn;
	$namaproduk =  htmlspecialchars($data["namaproduk"]);
	$stokproduk =  htmlspecialchars($data["stokproduk"]);
	$gambarproduk =  htmlspecialchars($data["gambarproduk"]);
    $hargaproduk = htmlspecialchars($data["hargaproduk"]);

	//memasukan data ke data base
	$qery = "INSERT INTO `produk`
			 VALUES 
			 (NULL,'$namaproduk','$stokproduk','$gambarproduk','$hargaproduk')
			 ";
	mysqli_query($conn,$qery);
	return mysqli_affected_rows($conn);
}

//hapus produk
function hapus ($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE produkid = $id");
	return mysqli_affected_rows($conn);
}
?>