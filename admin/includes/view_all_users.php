<table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>username</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>


<?php

    $query="SELECT * FROM users";
    $select_users=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_users)){
        $user_id=$row['user_id'];
        $username=$row['username'];        
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];
        
    
        
                            echo "<tr>";
                            echo "<td>{$user_id}</td>";
                            echo "<td>{$username}</td>";
                            echo "<td>{$user_firstname}</td>";


    // $query="SELECT * FROM categories WHERE cat_id='{$post_category}'";
    // $bring_cat_title = mysqli_query($connection, $query);
    
    // while ($row=mysqli_fetch_assoc($bring_cat_title)) 
    // {
    // $cat_title=$row['cat_title'];
    // $cat_id=$row['cat_id'];
    // }

                            echo "<td>{$user_lastname}</td>";
                            echo "<td>{$user_email}</td>";
                            echo "<td>{$user_role}</td>";
                            echo "<td><a href='users.php?make_sub={$user_id}'>Make Subscriber</a></td>";
                            echo "<td><a href='users.php?make_admin={$user_id}'>Make Admin</a></td>";
                            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                            echo "<td><a href='users.php?delete={$user_id}'>delete</a></td>";
                            echo "</tr>";
    }


    if(isset($_GET['make_admin'])){
        $user_id=$_GET['make_admin'];

        $query = "UPDATE users SET user_role='admin' WHERE user_id='{$user_id}'";
        $make_admin=mysqli_query($connection,$query);

        confirmQuery($make_admin);
        header('Location:users.php');
    }


    if(isset($_GET['make_sub'])){
        $user_id=$_GET['make_sub'];

        $query = "UPDATE users SET user_role='subscriber' WHERE user_id='{$user_id}'";
        $make_sub=mysqli_query($connection,$query);

        confirmQuery($make_sub);
        header('Location:users.php');
    }


    if(isset($_GET['delete'])){
        $user_id=$_GET['delete'];

        $query = "DELETE FROM users WHERE user_id='{$user_id}'";
        $delete_user=mysqli_query($connection,$query);

        confirmQuery($delete_user);
        header('Location:users.php');
    }


 ?>



                            </tbody>
                        </table>