<?php 

	if(isset($_POST['create_post'])){

	$post_title=$_POST['post_title'];
	$post_author=$_POST['author'];
	$post_category_id=$_POST['post_category'];
	$post_status=$_POST['post_status'];

	$post_image=$_FILES['image']['name'];
	$post_image_temp=$_FILES['image']['tmp_name'];

	$post_tags=$_POST['post_tags'];
	$post_content=$_POST['post_content'];
	$post_date=date('d-m-y');
	$post_comment_count=4;



	move_uploaded_file($post_image_temp, "../images/$post_image");

	$query="INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";

	$create_post_query=mysqli_query($connection,$query);
	confirmQuery($create_post_query);  
	
		
		
			if($create_post_query){

				 header('Location:posts.php?source=add_post');

			}
		
		 

	}

	
?>





<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" name="post_title" class="form-control">
	</div>

	<label for="post_category">Post Categories</label>
	<select name="post_category" id="">
		<?php 
			$query="SELECT * FROM categories";
			$selct_cats=mysqli_query($connection,$query);

			while($row=mysqli_fetch_assoc($selct_cats)){
				$cat_id=$row['cat_id'];
				$cat_title=$row['cat_title'];

				echo "<option value={$cat_id}>{$cat_title}</option>";
			}
		?>
	</select>

	<div class="form-group">
		<label for="author">Author</label>
		<input type="text" name="author" class="form-control">
	</div>

	<div class="form-group">																	
		<label for="post_status">Post Stauts</label>
		<input type="text" name="post_status" class="form-control">
	</div>

	<div class="form-group">
		<label for="image">Post image</label>
		<input type="file" name="image" >
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea> 
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="submit" name="create_post">
	</div>

</form>
