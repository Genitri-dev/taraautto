<?php
 require 'koneksi.php';
 ini_set('display_errors', 1);
error_reporting(-1);
//registrasi
function registrasi($data){

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
?>