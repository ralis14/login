<?php 
require_once "datab.php";
require_once "passwords.php";

$password = fixPasswords('onetwo');

$sql =  "INSERT INTO Users (firstname, lastname,username,password) 
VALUES('Raul','Gomez','ragomez','$password')";
try{
	$db->exec($sql);
echo "Table Created!";
}
catch (Exception $e)
{
	echo "Failed to create database";
}

//$db->close();