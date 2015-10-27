
<?php

function hashPasswords($password,$username)
	{
		$salt1 = 'hhsb%@!';
		$message = $salt1.$password.$username;
		return $password = hash('ripemd128', $message);
	}