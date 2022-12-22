<?php
if( isset($_POST["register"]) ){
        if( registrasi ($_POST) > 0){
        } else {
            echo mysqli_error($conn);
        }
    }