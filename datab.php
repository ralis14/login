<?php

//common functions to log in andregister php files found below

// hashes password with salt password ad username
	function hashPasswords($password,$username)
	{
		$salt1 = 'hhsb%@!';
		$message = $salt1.$password.$username;
		return $password = hash('ripemd128', $message);
	}

	function cleanString($string)
	{
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = htmlentities($string);
		return $string;
	}

	//database settings found below

//my xampp database
	// $host = "localhost";
	// $dbname = "test";
	// $user = 'root';
	// $pass = 'root';
// school database
	$host = "earth.cs.utep.edu";
	$dbname = "wb_ragomez9";
	$user = 'wb_ragomez9';
	$pass = 'cs5339!wb_ragomez9';



		try{
		$db = new PDO("mysql:host=".$host.";dbname=".$dbname,"$user", "$pass");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}catch(Exception $e){
	echo " Exception: Database Connection Error\n";
		exit;
	}

