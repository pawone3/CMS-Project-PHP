<table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> id</th>
                                    <th> author</th>
                                    <th> title</th>
                                    <th> category</th>
                                    <th> status</th>
                                    <th>image</th>
                                    <th>tags</th>
                                    <th>contents</th>
                                    <th>comments</th>
                                    <th>date</th>
                                    <th>Edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>


<?php

    $query="SELECT * FROM posts";
    $select_all_query=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_all_query)){
        $post_id=$row['post_id'];
        $post_category=$row['post_category_id'];        
        $post_title=$row['post_title'];
        $post_author=$row['post_author'];
        $post_date=$row['post_date'];
        $post_content=$row['post_content'];
        $post_image=$row['post_image'];
        $post_comment_count=$row['post_comment_count'];
        $post_status=$row['post_status'];
        $post_tags=$row['post_tags'];
        

        
                            echo "<tr>";
                            echo "<td>{$post_id}</td>";
                            echo "<td>{$post_author}</td>";
                            echo "<td>{$post_title}</td>";


    $query="SELECT * FROM categories WHERE cat_id='{$post_category}'";
    $bring_cat_title = mysqli_query($connection, $query);
    
    while ($row=mysqli_fetch_assoc($bring_cat_title)) 
    {
    $cat_title=$row['cat_title'];
    $cat_id=$row['cat_id'];
    }

                            echo "<td>{$cat_title}</td>";
                            echo "<td>{$post_status}</td>";
                            echo "<td><img width='50' height='50' alt='image' class='img-responsive' src='../images/{$post_image}'></img></td>";
                            echo "<td>{$post_tags}</td>";
                            echo "<td>{$post_content}</td>";
                            echo "<td>{$post_comment_count}</td>";
                            echo "<td>{$post_date}</td>";
                            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                            echo "<td><a href='posts.php?delete={$post_id}'>delete</a></td>";
                            echo "</tr>";
    }

    if(isset($_GET['delete'])){
        $post_id=$_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id='{$post_id}'";
        $delete_post=mysqli_query($connection,$query);

        confirmQuery($delete_post);
        header('Location:posts.php');
    }


 ?>



                            </tbody>
                        </table>