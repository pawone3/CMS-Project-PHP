<?php include "db.php" ?>
<?php session_start(); ?>

<?php
	// $_SESSION['username']=null;
	// $_SESSION['firstname']=null;
	// $_SESSION['lastname']=null;
	// $_SESSION['user_role']=null;

	session_unset();

// destroy the session
	session_destroy(); 
	header('location:../index.php');

?>