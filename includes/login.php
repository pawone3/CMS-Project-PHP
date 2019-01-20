<?php include "db.php" ?>
<?php session_start(); ?>


<?php
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

		$username=mysqli_real_escape_string($connection, $username);
		$password=mysqli_real_escape_string($connection, $password);


		$query="SELECT * FROM users WHERE username='$username' AND user_password='{$password}'";
		$login_query=mysqli_query($connection, $query);

		if(!$login_query){
			die('failed'.mysqli_error($connection));
			header('location:../index.php');
		}


		if(mysqli_num_rows($login_query)>0){

		while($row=mysqli_fetch_assoc($login_query)){
			$db_user_id=$row['user_id'];
			$db_username=$row['username'];
			$db_user_firstname=$row['user_firstname'];
			$db_user_lastname=$row['user_lastname'];
			$db_user_role=$row['user_role'];
			$db_user_password=$row['user_password'];
		
		$_SESSION['username']=$db_username;
		$_SESSION['firstname']=$db_user_firstname;
		$_SESSION['lastname']=$db_user_lastname;
		$_SESSION['user_role']=$db_user_role;

		header('location:../admin');
		}
	    	}
	}
?>