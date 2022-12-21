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

      $username = strtolower (stripslashes ($data ["username"]));
      $username = $data ["username"];
      $password = mysqli_real_escape_string($conn ,$data ["password"]);
      $password2 = mysqli_real_escape_string($conn ,$data ["password2"]);

      #cek konfirmasi password
      if ($password !== $password2){
        echo "<script>
				alert('passworld tidak sama');
			  </script>";
        return false;
      }

}
?>