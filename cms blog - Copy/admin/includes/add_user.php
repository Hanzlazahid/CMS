<?php
if(isset($_POST['create_user'])){

   $user_firstname=$_POST['user_firstname'];
   $user_lastname=$_POST['user_lastname'];
   $username=$_POST['username'];
   $user_email=$_POST['user_email'];
   $user_role=$_POST['user_role'];

//    $post_image=$_FILES['image']['name'];
//    $post_image_temp=$_FILES['image']['tmp_name'];

   $user_password=$_POST['user_password'];

//    $post_date=date('d-m-y');
//    $post_comment_count=4;


//    move_uploaded_file($post_image_temp,'../images/'.$post_image);

   $query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role) VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";

   $insert_user_query= mysqli_query($connection,$query);


   echo "<h4 class='bg-info' style='text-align:center;'>User Created:" . " " . "<a href='users.php'>View Users</a></h4><br>";


}
?>

<form action="" method="POST" enctype="multipart/form-data">

 <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
       <select name="user_role" id="">
       <option value="Subscriber">Select Option</option>
        <option value="Admin">Admin</option>
        <option value="Subscriber">Subscriber</option>
       </select>
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
       <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
    
</form>