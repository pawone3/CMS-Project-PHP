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


                    if(isset($_POST['submit'])){

                    $search= $_POST['search'];

                    $search_query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $query=mysqli_query($connection, $search_query);

                    if(!$search_query) {
                        die("Query failed". mysqli_error($connection));
                    }
                    
                    $count=mysqli_num_rows($query);
                    if($count==0){
                        echo "<h1>No result</h1>";
                    }



                    else
                        {


                        //          $query="SELECT * FROM posts";
                        // $select_all_posts_query = mysqli_query($connection, $query);
                        // echo "hi dear";
                        while ($row=mysqli_fetch_assoc($query)) {

                            $posts_title=$row['post_title'];
                            $posts_author =$row['post_author'];
                            $posts_date=$row['post_date'];
                            $posts_image=$row['post_image'];
                            $posts_content=$row['post_content'];

                ?>
                            <h1 class="page-header">
                                    Page Heading
                                    <small>Secondary Text</small>
                                </h1>

                                <!-- First Blog Post -->
                                <h2>
                                    <a href="#"><?php echo $posts_title; ?></a>
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

                       <?php } 
                       
                        }

                   }
                    ?>


                

                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                     </li>
                 </ul> --> 

            </div>

            <?php 
    
            include "includes/sidebar.php"

        ?>            

        </div>
        <!-- /.row -->

        <hr>

        <?php 
    
            include "includes/footer.php"

        ?>