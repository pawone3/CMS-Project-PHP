<?php
	
	if(isset($_GET['p_id'])){
		$p_id=$_GET['p_id'];
	 $query="SELECT * FROM posts WHERE post_id={$p_id}";
	
    $select_query=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_query)){
        $this_post_id=$row['post_id'];
        $post_category_id=$row['post_category_id'];
        $post_title=$row['post_title'];
        $post_author=$row['post_author'];
        $post_date=$row['post_date'];
        $post_content=$row['post_content'];
        $post_image=$row['post_image'];
        $post_comment_count=$row['post_comment_count'];
        $post_status=$row['post_status'];
        $post_tags=$row['post_tags'];
    }
}

if(isset($_POST['update_post'])){

	$post_author=$_POST['author'];
	$post_title=$_POST['post_title'];
	$post_status=$_POST['post_status'];
	$post_category_id=$_POST['post_category'];
	$post_image=$_FILES['image']['name'];
	$post_image_temp=$_FILES['image']['tmp_name'];
	$post_content=$_POST['post_content'];
	$post_tags=$_POST['post_tags'];

	move_uploaded_file($post_image_temp, "../images/$post_image");



	$query="UPDATE posts SET ";
	$query.="post_title='{$post_title}', ";
	$query.="post_category_id='{$post_category_id}', ";
	$query.="post_date=now(), ";
	$query.="post_author='{$post_author}', ";
	$query.="post_status='{$post_status}', ";
	$query.="post_tags='{$post_tags}', ";
	$query.="post_image='{$post_image}' ";
	$query.="WHERE post_id={$this_post_id}";

	$update_query=mysqli_query($connection, $query);
	confirmQuery($update_query);

}




?>




<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input value="<?php echo($post_title) ?>" type="text" name="post_title" class="form-control">
	</div>

	<div class="form-group">
		<label for="">Post Categories</label>
		<select id="" name="">

			<?php 
				$query="SELECT * FROM categories";
                        $bring_categories = mysqli_query($connection, $query);

                        if($bring_categories){
					        global $connection;
					        echo("Query Failed".mysqli_error($connection));
    }
                    
                    while ($row=mysqli_fetch_assoc($bring_categories)) {

                    $cat_title=$row['cat_title'];
                    $cat_id=$row['cat_id'];

                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
			?>
			
		</select>
	</div>

	<div class="form-group">
		<label for="post_category">Post Category Id</label>
		<input value="<?php echo($post_category_id) ?>" type="text" name="post_category" class="form-control">
	</div>

	<div class="form-group">
		<label for="author">Author</label>
		<input value="<?php echo($post_author) ?>" type="text" name="author" class="form-control">
	</div>

	<div class="form-group">																	
		<label for="post_status">Post Stauts</label>
		<input value="<?php echo($post_status) ?>" type="text" name="post_status" class="form-control">
	</div>

	<div class="form-group">
		<img width='50' height='50' alt='image' class='img-responsive' src='../images/<?php echo $post_image?>'></img>
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo($post_tags) ?>" type="text" name="post_tags" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea  name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo($post_content) ?></textarea> 
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" value="submit" name="update_post">
	</div>

</form>