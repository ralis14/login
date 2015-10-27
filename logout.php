
<?php
session_start();


if(!isset($_SESSION['username'])){

	echo "session not initialized!";
	//session_destroy();
}
else{
	session_destroy();
	header("Location: login.html");
	}
