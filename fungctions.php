<?php
// koneksi
$conn = mysqli_connect("localhost" , "root" , "", "taraauto");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 
else {
    echo("berhasil terkoneksi ke database");
}
//registrasi
function registrasi($data){

      global $conn;

      $username = strtolower (stripslashes ($data["username"]));
      $phone = $data ["phone"];
      $password = mysqli_real_escape_string($conn ,$data["password"]);
      $password2 = mysqli_real_escape_string($conn ,$data["password2"]);

      #cek apakah username sudah terdaftar atau belum 
      $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    	if( mysqli_fetch_assoc($result) ) {
    		echo "<script>
    				alert('username sudah terdaftar')
    		      </script>";
    		return false;
    	}

      #cek konfirmasi password
      if ( $password !== $password2 ){
        echo '<script language="javascript">alert("pw tidak sama");</script>'; 
      }

      #enkripsi passworld
      $hassedpassword = password_hash($password, PASSWORD_DEFAULT);

      #menambahkan user ke data base
      $sql = "INSERT INTO `user` (`userid`, `username`, `userphone`, `userpassword`)  VALUES(NULL, '$username','$phone' ,'$hassedpassword') ";
      if ($conn->query($sql) === TRUE) {
      echo "berhasil terdaftar";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
      return mysqli_affected_rows($conn);
}
//login 
?>