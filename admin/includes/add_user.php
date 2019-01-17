<?php 

	if(isset($_POST['create_user'])){

	$user_firstname=$_POST['user_firstname'];
	$user_lastname=$_POST['user_lastname'];
	$user_role=$_POST['user_role'];
	$username=$_POST['username'];

	// $post_image=$_FILES['image']['name'];
	// $post_image_temp=$_FILES['image']['tmp_name'];

	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	// $post_date=date('d-m-y');



	// move_uploaded_file($post_image_temp, "../images/$post_image");

	$query="INSERT INTO `users` ( `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`,`user_role`) VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}')";

	$create_user_query=mysqli_query($connection,$query);
	confirmQuery($create_user_query);  
		 

	}

	
?>





<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">First Name</label>
		<input type="text" name="user_firstname" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_title">Last Name</label>
		<input type="text" name="user_lastname" class="form-control">
	</div>

	<div class="form-group">
		<select id="" name="user_role">
				<option value="">Select options</option>
				<option value="admin">Admin</option>
				<option value="subscriber">Subscriber</option>
		</select>
	</div>

	<div class="form-group">
		<label for="post_title">User Name</label>
		<input type="text" name="username" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_title">Email</label>
		<input type="text" name="user_email" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_title">Password</label>
		<input type="text" name="user_password" class="form-control">
	</div>

	<!-- <div class="form-group">
		<label for="image">Post image</label>
		<input type="file" name="image" >
	</div> -->

	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="submit" name="create_user">
	</div>

</form>
