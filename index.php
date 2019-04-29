    <!---connection--->
    <?php include "includes/db.php" ?>
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

                        $query= "SELECT * FROM posts";
                        $select_all_posts_query = mysqli_query($connection, $query);
                        // echo "hi dear";
                        $c=0;
                        while ($row=mysqli_fetch_assoc($select_all_posts_query)) {
                            $posts_id=$row['post_id'];
                            $posts_title=$row['post_title'];
                            $posts_author =$row['post_author'];
                            $posts_date=$row['post_date'];
                            $posts_image=$row['post_image'];
                            $posts_content=substr($row['post_content'],0,150);
                            $posts_status=$row['post_status'];


                            if($posts_status=="published"){
                                $c++;
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
                                <p><?php echo $posts_content; ?>....</p>
                                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>   

                       <?php } }
                        if($c==0){
                            echo "<h1>No Result</h1>";
                        }
                       ?>

                    


                

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