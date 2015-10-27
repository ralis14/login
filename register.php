<?php
require_once "datab.php";
//require_once "hashtest.php";

class register
{
	private $db;
	private $first_name;
	private $last_name; 
	private $username;
	private $password;
	private $salt1 = 'hhsb%@!';
	private $salt2 = 'fds$!@';

	public function __construct($first_name, $last_name, $username, $password, $db)
	{
		

		$this->first_name = cleanString($first_name);
		$this->last_name = cleanString($last_name);
		$this->username = cleanString($username);
		$this->password = cleanString($password);
		$this->db = $db;

		$this->insertUser();
		
	}

	public function insertUser()
	{
		$this->password = hashPasswords($this->password, $this->username);

		$sql =  "INSERT INTO users (firstname, lastname,username,password) 
		VALUES('$this->first_name','$this->last_name','$this->username','$this->password')";
		try
		{
			$this->db->exec($sql);
			echo "Registration Complete!";
		}
		catch (Exception $e)
		{
			echo "Failed to register";
		}
	}


}


//Implementing register object using $_POST variables
if(isset($_POST['password']) && !empty($_POST['password']))
{
	$reg = new register(
		$_POST['first_name'],
		$_POST['last_name'],
		$_POST['username'],
		$_POST['password'],
		$db);
}
else
{
	printf("Missing information");
}
echo "<br><a href = 'login.html'>Back to Log in</a>";
