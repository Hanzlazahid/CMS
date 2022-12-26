<?php include 'include/db.php'; ?>
<?php include 'include/header.php'; ?>

    <!-- Navigation -->
    
    <?php include 'include/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 

                if(isset($_GET['p_id'])){
                    $the_post_id= $_GET['p_id'];
               
                
                $query="SELECT * FROM posts WHERE post_id=$the_post_id";
                $select_all_posts_query=mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];

                }
            

                    ?>
                    
                    <!-- <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1> -->
    
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="./images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><b><?php echo $post_content ?></b></p>    
                    <hr>
                    <?php
                };
                
                ?>






                <!-- Blog Comments -->


                <?php
                if(isset($_POST['create_comment'])){
                    $the_post_id= $_GET['p_id'];

                    $comment_author=$_POST['comment_author'];
                    $comment_email=$_POST['comment_email'];  
                    $comment_content=$_POST['comment_content']; 

                    if(!empty($comment_author) &&  !empty($comment_email) && !empty($comment_content) ){

                        $create_comment_query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)
                    VALUES ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved', now())";

                    mysqli_query($connection,$create_comment_query);


                    $query="UPDATE posts SET post_comment_count=post_comment_count + 1 WHERE post_id=$the_post_id";

                    mysqli_query($connection,$query);
                    } else{
                        echo "<script> alert('Fields Cannot Be Empty!') </script>";
                    }

                    


                }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_author" placeholder="Enter Your Name" required>
                        </div>
                         
                        <div class="form-group">
                            <input type="email" class="form-control" name="comment_email" placeholder="Enter Your Email" required>
                        </div>
                         
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter Your Comment" style='resize:none;' name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <h2>COMMENTS</h2>
                <hr>


                <?php

                $query="SELECT * FROM comments WHERE comment_post_id=$the_post_id AND comment_status= 'Approved' ORDER BY comment_id DESC ";
                $select_comment_query=mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($select_comment_query)){
                    $comment_date=$row['comment_date'];
                    $comment_author=$row['comment_author'];
                    $comment_content=$row['comment_content'];
                    ?>

                     <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h3 class="media-heading"> <?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h3>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <hr>


                <?php } ?>



                <!-- Comment
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div> -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php  include 'include/sidebar.php';  ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include 'include/footer.php' ?>
