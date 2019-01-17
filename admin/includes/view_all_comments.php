<table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th> status</th>
                                    <th>Post</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>


<?php

    $query="SELECT * FROM comments";
    $select_comments=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_comments)){
        $comment_id=$row['comment_id'];
        $comment_post_id=$row['comment_post_id'];        
        $comment_author=$row['comment_author'];
        $comment_content=$row['comment_content'];
        $comment_email=$row['comment_email'];
        $comment_status=$row['comment_status'];
        $comment_date=$row['comment_date'];
        
    
        
                            echo "<tr>";
                            echo "<td>{$comment_id}</td>";
                            echo "<td>{$comment_author}</td>";
                            echo "<td>{$comment_content}</td>";


    // $query="SELECT * FROM categories WHERE cat_id='{$post_category}'";
    // $bring_cat_title = mysqli_query($connection, $query);
    
    // while ($row=mysqli_fetch_assoc($bring_cat_title)) 
    // {
    // $cat_title=$row['cat_title'];
    // $cat_id=$row['cat_id'];
    // }

                            echo "<td>{$comment_email}</td>";
                            echo "<td>{$comment_status}</td>";
                            echo "<td>Some title</td>";
                            echo "<td>{$comment_date}</td>";
                            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                            echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                            echo "<td><a href=''>Edit</a></td>";
                            echo "<td><a href='comments.php?delete={$comment_id}'>delete</a></td>";
                            echo "</tr>";
    }


    if(isset($_GET['approve'])){
        $comment_id=$_GET['approve'];

        $query = "UPDATE comments SET comment_status='approve' WHERE comment_id='{$comment_id}'";
        $approve_comment=mysqli_query($connection,$query);

        confirmQuery($approve_comment);
        header('Location:comments.php');
    }

    if(isset($_GET['unapprove'])){
        $comment_id=$_GET['unapprove'];

        $query = "UPDATE comments SET comment_status='unapprove' WHERE comment_id='{$comment_id}'";
        $unapprove_comment=mysqli_query($connection,$query);

        confirmQuery($unapprove_comment);
        header('Location:comments.php');
    }


    if(isset($_GET['delete'])){
        $comment_id=$_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id='{$comment_id}'";
        $delete_comment=mysqli_query($connection,$query);

        confirmQuery($delete_comment);
        header('Location:comments.php');
    }


 ?>



                            </tbody>
                        </table>