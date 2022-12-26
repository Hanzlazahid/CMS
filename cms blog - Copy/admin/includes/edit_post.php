<?php

if(isset($_GET['p_id'])){
    $the_post_id=$_GET['p_id'];

    $query="SELECT * FROM posts WHERE post_id=$the_post_id";
    $select_posts_by_id=mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_posts_by_id)){
    $post_id=$row['post_id'];
    $post_author=$row['post_author'];
    $post_title=$row['post_title'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_tags=$row['post_tags'];
    $post_content=$row['post_content'];
    $post_comment_count=$row['post_comment_count'];
    $post_date=$row['post_date'];
}

if(isset($_POST['update_post'])){

    $post_title=$_POST['title'];
    $post_author=$_POST['author'];
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_content=$_POST['post_content'];
    $post_tags=$_POST['post_tags'];


    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id= {$the_post_id} ";

    $update_post = mysqli_query($connection,$query);
    
    confirmQuery($update_post);

    echo "<h4 class='bg-info' style='text-align:center;'>Post Updated:" . " " . "<a href='../post.php?p_id={$the_post_id}'>View Posts</a></h4><br>";

}
}

?>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
    </div>

    <div class="form-group">
        <label for="">Post Category</label><br>
       <select name="post_category" id="">
<?php


 $cat_id=$_GET['edit'];
 $query="SELECT * FROM categories";
 $select_category=mysqli_query($connection,$query);

 confirmQuery($select_category);
 

  while($row=mysqli_fetch_assoc($select_category)){
   $cat_id=$row['cat_id'];
   $cat_title=$row['cat_title'];

   echo "<option value='$cat_id'>{$cat_title}</option>";
  }


?>

       </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
    </div>



   <div class="form-group">
   <label for="post status">Post Status</label><br>
   <select name="post_status" id="">
        <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
        <?php

        if($post_status =='published'){
            echo "<option value='draft'>draft</option>";
        }else{
            echo "<option value='published'>published</option>";
        }
        
        ?>
    </select>
   </div>





    <!-- <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
    </div> -->

    <div class="form-group">
    <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
       <textarea name="post_content" id="" cols="158" rows="8" style="resize:none;"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
       <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
    
</form>