
<?php
session_start();

require_once "datab.php";


//require_once "hashtest.php";
class login
{
	private $password ;
	private $username ;
	private $db;
	private $salt1 = 'hhsb%@!';
	private $salt2 = 'fds$!@';

	public function __construct($password, $username, $db)
	{
		//echo "password: ".$password. "<br>";
		//echo "username: ".$username. "<br>";


		$this->username = cleanString($username);
		$password = cleanString($password);
		$this->password = hashPasswords($password, $this->username);
		//echo $this->password. "<br>";
		$this->db = $db;

		$this->sqlSelect();
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function sqlSelect()
	{
		$sql = "SELECT * FROM users WHERE password = '$this->password'";
		try
		{
			//printf("Connection Established!");
			$command =$this->db->prepare($sql);
			$command->execute();
			$one = $command->fetch(PDO::FETCH_ASSOC);
			//var_dump($one);
			

			if (isset($one['password']) && $this->password === $one['password']){
				printf("Connection Established!");

				$first_name = $one['firstname'];
				$last_name = $one['lastname'];
				$_SESSION['username'] = $one['username'];

				// printf("<br>Welcome %s %s",$first_name, $last_name );
				// echo "<br><a href = 'home.php'>Home Page<a/>";
				header("Location: home.php");
			}
			else
				printf("Connection failed!");
			//echo "<br>".$one['firstname'];
			
		}
		catch (Exception $e)
		{
			echo "Wrong Username/password";
		}
	}

	
}

$login = new login($_POST['password'],$_POST['username'],$db);


