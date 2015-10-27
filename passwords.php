<?php
$salt1 = 'hhsb%@!';
$salt2 = 'fds$!@';
function fixPasswords($password){
	return $password = hash('ripemd128', '$salt1$password$salt2');
}