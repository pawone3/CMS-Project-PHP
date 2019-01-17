    <!---connection--->
    <?php include "includes/db.php" ?>
    <?php  include "admin/functions.php";?>
    <!--header-->
    <?php include "includes/header.php" ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                 <?php 
                        if(isset($_GET['category']))
                        $category_id=$_GET['category'];
                        // echo($category_id);
                        $query="SELECT * FROM posts where post_category_id='{$category_id}'";
                        $select_all_posts = mysqli_query($connection, $query);
    
                        confirmQuery($select_all_posts);

                        while($row=mysqli_fetch_assoc($select_all_posts)) {
                            $posts_id=$row['post_id'];
                            $posts_title=$row['post_title'];
                            $posts_author =$row['post_author'];
                            $posts_date=$row['post_date'];
                            $posts_image=$row['post_image'];
                            $posts_content=substr($row['post_content'],0,150);

                ?>
                            <h1 class="page-header">
                                    Page Heading
                                    <small>Secondary Text</small>
                                </h1>

                                <!-- First Blog Post -->
                                <h2>
                                    <a href="post.php?p_id=<?php echo $posts_id ; ?>"><?php echo $posts_title; ?></a>
                                </h2>
                                <p class="lead">
                                    by <a href="index.php"><?php echo $posts_author; ?></a>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span> <?php echo $posts_date; ?></p>
                                <hr>
                                <img class="img-responsive" src="images/<?php echo $posts_image; ?> " alt="">
                                <hr>
                                <p><?php echo $posts_content; ?></p>
                                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>   

                       <?php } ?>

                    


                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <?php include "includes/sidebar.php"; ?>            

        </div>
        <!-- /.row -->

        <hr>

        <?php  include "includes/footer.php"; ?>