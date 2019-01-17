    <!---connection--->
    <?php  include "admin/functions.php";?>
    <?php include "includes/db.php" ?>
    <!--header-->
    <?php include "includes/header.php" ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                        <?php if(isset($_GET['p_id'])){
                            $post_id=$_GET['p_id'];
                            $query="SELECT * FROM posts where post_id='{$post_id}'";
                                $select_all_posts_query = mysqli_query($connection, $query);
                                // echo "hi dear";
                                while ($row=mysqli_fetch_assoc($select_all_posts_query)) {
                                    $posts_id=$row['post_id'];
                                    $posts_title=$row['post_title'];
                                    $posts_author =$row['post_author'];
                                    $posts_date=$row['post_date'];
                                    $posts_image=$row['post_image'];
                                    $posts_content=$row['post_content'];

                        }}?>

                               <h1 class="page-header">
                                    Page Heading
                                    <small>Secondary Text</small>
                                </h1>

                                <!-- First Blog Post -->


                <h1><?php echo $posts_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $posts_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $posts_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $posts_image; ?> " alt="image">

                <hr>

                <!-- Post Content -->
                <p><?php echo $posts_content; ?></p>

                <hr>

                <!-- Blog Comments -->

                <?php 
                    if(isset($_POST['create_comment'])){
                        $this_post_id=$_GET['p_id'];
                        $comment_author=$_POST['comment_author'];
                        $comment_email=$_POST['comment_email'];
                        $comment_content=$_POST['comment_content'];

                    
                        $query="INSERT INTO `comments` ( `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ('{$this_post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";


                        $comment_insert_query=mysqli_query($connection, $query);
                        confirmQuery($comment_insert_query);

                        $query="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$this_post_id";

                        $update_comment_query=mysqli_query($connection, $query);
                        confirmQuery($update_comment_query);

                    }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="#" method="post">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Author">Email</label>
                            <input type="text" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Author">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="create_comment"type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php        
                    $query="SELECT * FROM comments WHERE comment_post_id='{$post_id}' AND comment_status='approve' ORDER BY comment_id DESC";
                    $select_comment_query=mysqli_query($connection,$query);
                    confirmQuery($select_comment_query);

                    while ($row=mysqli_fetch_assoc($select_comment_query)) {
                        $comment_author=$row['comment_author'];
                        $comment_content=$row['comment_content'];
                        $comment_date=$row['comment_date'];
                    //}
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo($comment_author); ?>
                            <small><?php echo($comment_date); ?></small>
                        </h4>
                       <?php echo($comment_content); ?>
                    </div>
                </div>
            <?php } ?>

                <!-- Comment -->

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php"; ?> 

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
