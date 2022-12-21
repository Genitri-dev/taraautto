<?php
    require "fungctions.php";

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
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" metho= "post">
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
                <input type="text" name = "password" id = "password">
            </li>
            <li>
                <label for="password2" >Ulangi Password :</label>
                <input type="text" name = "password2" id = "password2">
            </li>
            <li>
                <button name="submit" id = "submit">Kirim</button>
            </li>
        </ol>
    </form>
</body>
</html>