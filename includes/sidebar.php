<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <div class="well">
                    <h4>Enter your email for Notifications:</h4>
                    <form action="search.php" method="post"style="margin-left: 50px;">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                    </div>
                    <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" value="submit" name="login">
                        </span>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- /.login form -->

                <div class="well">
                    <h4>Login</h4>
                    <form class="input-bar" action="includes/login.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" value="submit" name="login">
                        </span>
                    </div>
                    </form>
                </div>


                <?php  $query="SELECT * FROM categories";
                        $select_all_categories_sidebar = mysqli_query($connection, $query); ?>



                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                                <?php
                                 while ($row=mysqli_fetch_assoc($select_all_categories_sidebar)) {
                                    $cat_title=$row['cat_title'];
                                    $cat_id=$row['cat_id'];

                                    echo "<li><a href='category.php?category=$cat_id'> $cat_title </a></li>";

                                } ?>

                            </ul>
                        </div>
                    
                        
                    </div>
                        <!-- /.col-lg-6 -->
                    <!-- </div> -->
                    <!-- /.row -->
                </div>

                <?php include "widget.php"; ?>

            </div>