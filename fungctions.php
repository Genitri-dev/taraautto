<?php
$connection = mysqli_connect("localhost" , "root" , "", "taraauto");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 
else {
    echo("berhasil terkoneksi ke database");
}

?>