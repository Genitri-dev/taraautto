<!DOCTYPE html>
<?php 
	require 'koneksi.php';
	if( isset($_POST['login']) ) {

		$username = $_POST["username"];
		$password = $_POST["password"];
		#mencari username di dalam tabel user
		$response = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		if( mysqli_num_rows($response) === 1){
			$row = mysqli_fetch_assoc($response);
			if( password_verify($password, $row["password"]) ){
				header("location: index.php");
				exit;
			}
		}
	}


?>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">username / password salah</p>
<?php endif; ?>

<form action="" method="post">

	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
	
</form>




</body>
</html>