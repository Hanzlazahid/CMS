
<table class="table table-bordered table-hover table-responsive">

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th colspan='3' style='text-align:center;'>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $query="SELECT * FROM comments";
                                 $view_comments=mysqli_query($connection,$query);
                                 $i=1;
                                  while($row=mysqli_fetch_assoc($view_comments)){
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
                                   echo "<td>{$comment_email}</td>";
                                   echo "<td>{$comment_status}</td>";


                                   $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
                                   $select_category_id=mysqli_query($connection,$query);
                                    while($row=mysqli_fetch_assoc($select_category_id)){
                                     $post_id=$row['post_id'];
                                     $post_title=$row['post_title'];

                                     echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";

                                    }; 

                                   echo "<td>{$comment_date}</td>";

                                   echo "<td><a class='btn btn-success' href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                   echo "<td><a class='btn btn-warning' href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                                   echo "<td><a class='btn btn-danger' href='comments.php?delete={$comment_id}'>DELETE</a></td>";
                                   echo "</tr>"; 

                               
 
                                 } ?>
                                
                            </tbody>
                        </table>


                        <?php
                        if(isset($_GET['delete'])){
                            $the_comment_id=$_GET['delete'];
                            $delete_query="DELETE FROM comments WHERE comment_id= $the_comment_id";
                            mysqli_query($connection,$delete_query);
                            header('location:comments.php');
                        }

                        if(isset($_GET['unapprove'])){
                            $the_comment_id=$_GET['unapprove'];                           
                            $unapprove_query="UPDATE comments SET comment_status='Unapproved' WHERE comment_id=$the_comment_id ";
                            mysqli_query($connection,$unapprove_query);
                            header('location:comments.php');
                        }

                        if(isset($_GET['approve'])){
                            $the_comment_id=$_GET['approve'];                           
                            $approve_query="UPDATE comments SET comment_status='Approved' WHERE comment_id=$the_comment_id ";
                            mysqli_query($connection,$approve_query);
                            header('location:comments.php');
                        }

                        ?>

