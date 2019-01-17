<?php include "db.php" ?>
<?php
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

		$username=mysqli_real_escape_strings($connection, $username);
		$password=mysqli_real_escape_strings($connection, $password);
	}
?>