<?php
/*
Currently the default password hashing method is using BCRYPT
This may change in the future if vulnerabilities are found
in BCRYPT

Other options such as PASSWORD_BCRYPT and PASSWORD_ARGON2ID
may be used instead of PASSWORD_DEFAULT
*/
$passwordHash = password_hash('password123', PASSWORD_DEFAULT);
$passwordCandidate = 'password123'; // Password is correct here

/* 
Check the password using password_verify
password_verify() returns bool(true) if the password is correct
If the password is not correct, it returns bool(false)
*/
if (password_Verify($passwordCandidate, $passwordHash)) {
	echo 'Valid password!';
} else {
	echo 'Invalid password!';
}
?>