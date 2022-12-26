<div class="col-md-4">

                <!-- Blog Search Well -->

            <div class="well">
                    <h4>Blog Search</h4>
                <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-success" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                </form>
                    <!-- /.input-group -->
            </div>

<!-- LOGIN FORM -->

            <div class="well">
                    <h4>Login</h4>
                <form action="include/login.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Login" name="login">
                    </div>
                </form>
            </div>



<!-- LOGIN FORM END -->





                <!-- Blog Categories Well -->
                <div class="well">
                    <?php  
                     $query="SELECT * FROM categories";
                     $select_all_categories_query=mysqli_query($connection,$query);
                     
                     
                     ?>
                        <h4>Blog Categories</h4>
                        <div class="row">
                            <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php
                            while($row=mysqli_fetch_assoc($select_all_categories_query)){
                                $cat_title=$row['cat_title'];
                                $cat_id=$row['cat_id'];
                                echo "<li><a href='category.php?category={$cat_id}'>$cat_title</a></li>";
                            }
                            ?>
                            
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                

                <!-- Side Widget Well -->
                <?php  include 'widgets.php'; ?>

            </div>