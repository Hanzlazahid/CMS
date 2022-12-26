<table class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <!-- <th>Date</th> -->
                                    <th colspan="4" style="text-align:center;">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $query="SELECT * FROM users";
                                 $view_users=mysqli_query($connection,$query);
                                 $i=1;
                                  while($row=mysqli_fetch_assoc($view_users)){
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
                                   echo "<td>{$user_lastname}</td>";
                                   echo "<td>{$user_email}</td>";
                                   echo "<td>{$user_role}</td>";
                                //    echo "<td></td>";



                                //    $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
                                //    $select_category_id=mysqli_query($connection,$query);
                                //     while($row=mysqli_fetch_assoc($select_category_id)){
                                //      $post_id=$row['post_id'];
                                //      $post_title=$row['post_title'];

                                //      echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";

                                //     }; 

                                   




                                //    echo "<td>{$comment_date}</td>";

                                   echo "<td><a class='btn btn-success' href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                                   echo "<td><a class='btn btn-warning' href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                                   echo "<td><a class='btn btn-primary' href='users.php?source=edit_user&edit_user={$user_id}'>EDIT</a></td>";
                                   echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>DELETE</a></td>";
                                   echo "</tr>"; 

                               
 
                                 } ?>
                                
                            </tbody>
                        </table>


                        <?php
                        if(isset($_GET['delete'])){
                            $the_user_id=$_GET['delete'];
                            $delete_query="DELETE FROM users WHERE user_id= $the_user_id";
                            mysqli_query($connection,$delete_query);
                            header('location:users.php');
                        }

                        if(isset($_GET['change_to_admin'])){
                            $the_user_id=$_GET['change_to_admin'];                           
                            $admin_query="UPDATE users SET user_role='Admin' WHERE user_id=$the_user_id ";
                            mysqli_query($connection,$admin_query);
                            header('location:users.php');
                        }

                        if(isset($_GET['change_to_sub'])){
                            $the_user_id=$_GET['change_to_sub'];                           
                            $subscriber_query="UPDATE users SET user_role='Subscriber' WHERE user_id=$the_user_id ";
                            mysqli_query($connection,$subscriber_query);
                            header('location:users.php');
                        }

                        ?>

