<?php
    #koneksi ke file fungtions
    require "fungctions.php";
    #kondisi jika username sudah di kirim
    if(isset($_POST["register"])){
        if(registrasi($_POST) > 0){
            echo "<script>
            alert('user baru berhasil ditambahkan!');
          </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaraAauto</title>
    <style>
        ol {
            list-style: none;
        }
        li{
            margin : 0px 0px 1em 0px;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method= "get">
        <ol>
            <li>
                <label for="username" > User Name:</label>
                <input type="text" name = "username" id = "username">
            </li>
            <li>
                <label for="phone" >No Hp :</label>
                <input type="text" name = "phone" id = "phone">
            </li>
            <li>
                <label for="password" > Password:</label>
                <input type="password" name = "password" id = "password">
            </li>
            <li>
                <label for="password2" >Ulangi Password :</label>
                <input type="password" name = "password2" id = "password2">
            </li>
            <li>
                <button type="submit" name = "register" >Registrasi</button>
            </li>
        </ol>
    </form>
</body>
</html>