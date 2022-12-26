<?php ob_start();  ?>
<?php include 'includes/admin_header.php';  ?>
<?php include 'functions.php';  ?>

<?php

if(isset($_SESSION['username'])){

    $session_username=$_SESSION['username'];

    $query="SELECT * FROM users WHERE username='{$session_username}' ";
    $select_user_profile= mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($select_user_profile)){

        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];
    }


}
?>

<?php

if(isset($_POST['edit_user'])){

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
 
 $query = "UPDATE users SET ";
 $query .= "user_firstname = '{$user_firstname}', ";
 $query .= "user_lastname = '{$user_lastname}', ";
 $query .= "username = '{$username}', ";
 $query .= "user_email = '{$user_email}', ";
 $query .= "user_role = '{$user_role}', ";
 $query .= "user_password = '{$user_password}' ";
 $query .= "WHERE username= '{$session_username}' ";
 
 $update_user = mysqli_query($connection,$query);

 header('Location:profile.php');
 
 
 }







?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php';  ?>
        <div id="page-wrapper">
    
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class='page-header'>
                            Welcome Admin
                          
                           <small><?php echo $_SESSION['username']; ?></small> 
                        </h1>


                        <form action="" method="POST" enctype="multipart/form-data">

 <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
    </div>

    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
    </div>

    <div class="form-group">
       <select name="user_role" id="">
       <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>

       <?php
       
       if($user_role =='Admin'){
      echo  "<option value='Subscriber'>Subscriber</option>";
       }else{
        echo "<option value='Admin'>Admin</option>";
       }


       ?>
        <!--  -->
       
       </select>
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="text" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>

    <div class="form-group">
       <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
    
</form>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include 'includes/admin_footer.php';  ?>
