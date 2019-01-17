<?php 

	if(isset($_GET['edit_user'])){

	$this_user_id=$_GET['edit_user'];
	 $query="SELECT * FROM users WHERE user_id={$this_user_id}";
	
    $edit_user_query=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($edit_user_query)){
        $user_id=$row['user_id'];
        $username=$row['username'];        
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];
    }

	}


	if(isset($_POST['edit_user'])){

	$user_firstname=$_POST['user_firstname'];
	$user_lastname=$_POST['user_lastname'];
	$user_role=$_POST['user_role'];
	$username=$_POST['username'];
	// if(isset($_FILES['image']['name'])){
	// 	$post_image=$_FILES['image']['name'];
	// }
	// $post_image_temp=$_FILES['image']['tmp_name'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];

	// move_uploaded_file($post_image_temp, "../images/$post_image");

	echo($user_firstname);

	$query="UPDATE `users` SET `user_password` = '{$user_password}', `username` = '{$username}', `user_firstname` = '{$user_firstname}', `user_lastname` = '{$user_lastname}', `user_email` = '{$user_email}', `user_role` = '{$user_role}' WHERE `users`.`user_id` =$this_user_id";


	$update_user_query=mysqli_query($connection, $query);
	confirmQuery($update_user_query);

}

	
?>





<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">First Name</label>
		<input value="<?php echo $user_firstname;?>" type="text" name="user_firstname" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_title">Last Name</label>
		<input value="<?php echo $user_lastname;?>" type="text" name="user_lastname" class="form-control">
	</div>

	<div class="form-group">
		<select id="" name="user_role">
			<option value='<?php echo $user_role;?>'><?php echo $user_role; ?></option>
			<?php
				if($user_role=='admin')
					echo "<option value='subscriber'>Subscriber</option>";
				else
					echo "<option value='admin'>admin</option>";
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post_title">User Name</label>
		<input value="<?php echo $username;?>" type="text" name="username" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_title">Email</label>
		<input value="<?php echo $user_email;?>"type="text" name="user_email" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_title">Password</label>
		<input value="<?php echo $user_password;?>" type="password" name="user_password" class="form-control">
	</div>

	<!-- <div class="form-group">
		<label for="image">Post image</label>
		<input type="file" name="image" >
	</div> -->

	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="submit" name="edit_user">
	</div>

</form>
