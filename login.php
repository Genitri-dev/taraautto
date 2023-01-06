<?php
	session_start();
	
	if (isset($_SESSION["login"])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<?php 
	require 'koneksi.php';

	if( isset($_POST["login"]) ) {
		//untuk form
		$username = $_POST["username"];
		$password = $_POST["password"];
		//untuk mengambil username
		$_SESSION['username'] = $username;
		//fungsi login
		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	
		// cek username
		if( mysqli_num_rows($result) === 1 ) {
			//set sesion
			$_SESSION["login"] = true;
			// cek password
			$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"]) ) {
				header("Location: index.php");
				exit;
			}

		}
	
		$error = true;
	
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tara Auto</title>
	<link rel="stylesheet" href="style/style.css">
	<!-- Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<?php if( isset($error) ) : ?>
	<script>
		alert('username / password salah');
	</script>
         			
<?php endif; ?>
<body class="LoginRegis">
	<div id="f_wrapper">
         <form id="f_login" action="" method="post">
         	<!-- <img id="f_img" src="f_style/autoshop.jpg" alt=""> -->
         		<h1>Tara Auto  <br> Login</h1>
         		<ul>
         			<li>
         				<input type="text" name="username" id="username" placeholder="User Name">
         			</li>
         			<li>
         				<input type="password" name="password" id="password" placeholder="Password">
         			</li>
         			<li>
         				<button type="submit" name="login">Login</button>
         			</li>
         			<li>
         				<a id="forward" href="registrasi.php">Registrasi Akun Baru</a>
         			</li>
         		</ul>
         </form>
     </div>
</body>
</html>