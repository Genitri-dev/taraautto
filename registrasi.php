<!DOCTYPE html>
<?php
    #koneksi ke file fungtions
    require "functions.php";
    #kondisi jika username sudah di kirim
    if( isset($_POST["register"]) ) {
    	if( registrasi($_POST) ) {
    		echo "user berhasil di tambahkan";
            header("location: ./index.php");
            exit();
    	} else {
    		echo mysqli_error($conn);
    	}
    }
    #kondisi jika form kosong 
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaraAauto</title>
    <link rel="stylesheet" href="style/style.css">
	<!-- Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body class="LoginRegis">
    <div id="f_wrapper">
        <form id="f_regis" action="" method= "post">
            <h1>Halaman Registrasi</h1>
            <ul>
                <li>
                    <input type="text" name = "username" id = "username" placeholder="User Name">
                </li>
                <li>
                    <input type="text" name = "nama" id = "nama" placeholder="Nama">
                </li>
                <li>
                    <input maxlength="12" type="text" name = "phone" id = "phone" placeholder="No Hanphone">
                </li>
                <li>
                    <input type="password" name = "password" id = "password" placeholder="Password">
                </li>
                <li>
                    <input type="password" name = "password2" id = "password2" placeholder="Re Password">
                </li>
                <li>
                    <button type="submit" name = "register" >Registrasi</button>
                </li>
                <li>
         			<a id="forward" href="login.php">Login</a>
         		</li>
            </ul>
        </form>
    </div>
</body>
</html>

