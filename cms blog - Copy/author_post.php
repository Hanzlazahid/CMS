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
                    $the_post_author=$_GET['author'];
               
                
                $query="SELECT * FROM posts WHERE post_author= '{$the_post_author}' ";
                $select_all_posts_query=mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($select_all_posts_query)){
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    ?>

                    <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                   All Post By <?php echo $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><b><?php echo $post_content ?></b></p>    
                <hr>
                <?php

                }
            

                    ?>
                    
                    <!-- <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1> -->
    
                    <!-- First Blog Post -->
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

               

                <hr>


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
