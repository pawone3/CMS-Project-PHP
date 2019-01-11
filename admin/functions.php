<?php 

	function insert_categories(){

	global $connection;
    if (isset($_POST['submit'])) {
        $cat_title=$_POST['cat_title'];

        if($cat_title=="" || empty($cat_title)){
            echo "<h4>"."This field can't be empty"."</h4>";
        }
        else{

            $query="INSERT INTO categories(cat_title) VALUES('$cat_title')";
            $create_category=mysqli_query($connection, $query);
            if(!$create_category){
                die('Insert Failed'.mysqli_error($connection));
            }
            else{
                header('Location: categories.php');
            }
        }
    }
	}



function findAllCategories(){
	global $connection;
	$query="SELECT * FROM categories ";
    $select_all_categories = mysqli_query($connection, $query);
    
    while ($row=mysqli_fetch_assoc($select_all_categories)) {

    $cat_title=$row['cat_title'];
    $cat_id=$row['cat_id'];
    echo "<tr>";
    echo "<td>$cat_id</td>";
    echo "<td>$cat_title</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'> Delete </a></td> ";
    echo "<td><a href='categories.php?edit={$cat_id}'> Edit </a></td> ";
    echo "<tr>";
}

}




function deleteCategories(){
	global $connection;
	if(isset($_GET['delete'])){ 
    $this_cat_id=$_GET['delete'];
    $query="DELETE FROM categories WHERE cat_id=$this_cat_id";
    $delete_query= mysqli_query($connection,$query);
    header('Location: categories.php');
                               }

}


function confirmQuery($result){
    if(!$result){
        global $connection;
        echo("Query Failed".mysqli_error($connection));
    }
}



 ?>