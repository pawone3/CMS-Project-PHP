<?php include "includes/admin_header.php"; ?>

<?php 
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];

        $query="SELECT * FROM users WHERE username='{$username}'";
        $select_user_profile_query=mysqli_query($connection, $query);

        while ($row=mysqli_fetch_assoc($select_user_profile_query)) {
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
    //  $post_image=$_FILES['image']['name'];
    // }
    // $post_image_temp=$_FILES['image']['tmp_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    echo($user_firstname);

    $query="UPDATE `users` SET `user_password` = '{$user_password}', `username` = '{$username}', `user_firstname` = '{$user_firstname}', `user_lastname` = '{$user_lastname}', `user_email` = '{$user_email}', `user_role` = '{$user_role}' WHERE `users`.`username` ='{$username}'";


    $update_user_query=mysqli_query($connection, $query);
    confirmQuery($update_user_query);

}
?>








<div id="wrapper">

    <!-- Navigation -->
     <?php include "includes/admin_navigation.php"; ?>       

    <div id="page-wrapper">

        <div class="container-fluid">  <!--- x fluid --->

            <!-- Page Heading -->
            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin 
                            <small><?php echo($_SESSION['username']);?></small>
                        </h1>
                        
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
                                <input type="submit" class="btn btn-primary" value="update profile" name="edit_user">
                            </div>

                        </form>
                        

                    </div>
                    
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>

    