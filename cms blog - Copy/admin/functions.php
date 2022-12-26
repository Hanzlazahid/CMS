<?php



function insert_categories(){

    global $connection;
 
    if(isset($_POST['submit'])){
     $cat_title=$_POST['cat_title'];
     if($cat_title=="" or empty($cat_title)){
       echo "<small style='color:red;'>This field should not be empty</small>";
     }else{
       $query="INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
       
       $create_category_query=mysqli_query($connection,$query);
       if(!$create_category_query){
         die("QUERY FAILED".mysqli_error($connection));
       }
     }
     
    }

}



function findAllCategories(){
    global $connection;
    $query="SELECT * FROM categories";
    $select_all_categories_query=mysqli_query($connection,$query);
    $i=1;
     while($row=mysqli_fetch_assoc($select_all_categories_query)){
      $cat_id=$row['cat_id'];
      $cat_title=$row['cat_title'];
      echo "<tr>";
      ?>
      <td><?php echo $i++; ?></td>
      <?php                                
      echo "<td>{$cat_title}</td>";
      echo "<td><a href='categories.php?delete={$cat_id}' class='btn btn-danger'>Delete</a></td>";
      echo "<td><a href='categories.php?edit={$cat_id}' class='btn btn-warning'>Edit</a></td>";

      echo "</tr>";
     }
}




function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $the_cat_id=$_GET['delete'];
        $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $delete_query=mysqli_query($connection,$query);
        header('location:categories.php');
       }
}



function confirmQuery($result){
  global $connection;

  if(!$result){
    die("QUERY FAILED .". mysqli_error($connection));
  }
}




?>