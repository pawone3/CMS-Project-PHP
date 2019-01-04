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

                        $query="SELECT * FROM posts";
                        $select_all_posts_query = mysqli_query($connection, $query);
                        // echo "hi dear";
                        while ($row=mysqli_fetch_assoc($select_all_posts_query)) {

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
                                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
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

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <?php 
    
            include "includes/footer.php"

        ?>