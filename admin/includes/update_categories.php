        <form action="" method="post">
            <div class="form-group">
                <label for="cat_title"> Update Categories</label>
                <?php 
                    if(isset($_GET['edit'])){
                        $cat_id=$_GET['edit'];

                        $query="SELECT * FROM categories WHERE cat_id=$cat_id";
                        $edit_categories = mysqli_query($connection, $query);
                    
                    while ($row=mysqli_fetch_assoc($edit_categories)) {

                    $cat_title=$row['cat_title'];
                    $cat_id=$row['cat_id'];
                    
                ?> 

                <input value="<?php if(isset($cat_title)){ echo($cat_title); } ?>" type="text" class="form-control" name="cat_title">

            <?php }} ?>
            <?php 
                if(isset($_POST['update_category'])){
                    $new_cat_title=$_POST['cat_title'];
                    $query="UPDATE categories SET cat_title ='{$new_cat_title}' WHERE cat_id={$cat_id}";
                    $update_query_run=mysqli_query($connection, $query);
                    if(!$update_query_run){
                        die('Update failed'.mysqli_error($connection));
                    }
                    else{
                        header('Location: categories.php');
                    }
                }
            ?>

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Category" name="update_category">
            </div>
        </form>