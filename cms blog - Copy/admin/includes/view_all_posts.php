<?php


if(isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $postValueId) {

     $bulk_options=$_POST['bulk_options'];

     switch($bulk_options){

        case 'published';
        $query="UPDATE posts SET post_status='{$bulk_options}' WHERE post_id= {$postValueId} ";
        $update_publish=mysqli_query($connection,$query);
        break;

        case 'draft';
        $query="UPDATE posts SET post_status='{$bulk_options}' WHERE post_id= {$postValueId} ";
        $update_draft=mysqli_query($connection,$query);
        break;

        case 'delete';
        $query="DELETE FROM posts WHERE post_id= {$postValueId} ";
        $delete_post=mysqli_query($connection,$query);
        break;
     }

    }
}


?>

<form action="" method="POST">

<table class="table table-bordered table-hover table-responsive">


<div id="bulkOptionsContainer" class="col-xs-4" style="padding: 8px 0px;">
    <select name="bulk_options" id="" class="form-control">
        <option value="">Select Option</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
    </select>
</div>

<div class="col-xs-4" style="padding: 8px 5px;">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
</div>


                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th colspan="3">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $query="SELECT * FROM posts";
                                 $select_posts=mysqli_query($connection,$query);
                                 $i=1;
                                  while($row=mysqli_fetch_assoc($select_posts)){
                                   $post_id=$row['post_id'];
                                   $post_author=$row['post_author'];
                                   $post_title=$row['post_title'];
                                   $post_category_id=$row['post_category_id'];
                                   $post_status=$row['post_status'];
                                   $post_image=$row['post_image'];
                                   $post_tags=$row['post_tags'];
                                   $post_comment_count=$row['post_comment_count'];
                                   $post_date=$row['post_date'];
                                
                                
                                
                                   echo "<tr>";?>
                                   <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                                   <?php
                                   echo "<td>{$post_id}</td>";
                                   echo "<td>{$post_author}</td>";
                                   echo "<td>{$post_title}</td>";


                                   $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
                                   $select_category_id=mysqli_query($connection,$query);
                                   $i=1;
                                    while($row=mysqli_fetch_assoc($select_category_id)){
                                     $cat_id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];



                                   echo "<td>{$cat_title}</td>";

                                    };






                                   echo "<td>{$post_status}</td>";
                                   echo "<td><img width='100' src='../images/$post_image' alt='no img'></td>";
                                   echo "<td>{$post_tags}</td>";
                                   echo "<td>{$post_comment_count}</td>";
                                   echo "<td>{$post_date}</td>";
                                   echo "<td><a class='btn btn-warning' href=../post.php?p_id={$post_id}>View Post</a></td>";
                                   echo "<td><a class='btn btn-primary' href=posts.php?source=edit_post&p_id={$post_id}>EDIT</a></td>";
                                   echo "<td><a class='btn btn-danger' href=posts.php?delete={$post_id}>DELETE</a></td>";
                                   echo "</tr>"; 

                               
 
                                 } ?>
                                
                            </tbody>
                        </table>
                        </form>


                        <?php
                        if(isset($_GET['delete'])){
                            $the_post_id=$_GET['delete'];
                            $query="DELETE FROM posts WHERE post_id= $the_post_id";
                            mysqli_query($connection,$query);
                            header('location:posts.php');
                        }
                        ?>


