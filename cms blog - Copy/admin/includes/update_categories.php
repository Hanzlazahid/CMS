<form action="" method="post">
                            <div class="form-group">
                              <label for="cat_title">Edit Category</label>


                              <?php
                              if(isset($_GET['edit'])){
                                $cat_id=$_GET['edit'];
                                $query="SELECT * FROM categories WHERE cat_id=$cat_id";
                                $select_category_id=mysqli_query($connection,$query);
                                $i=1;
                                 while($row=mysqli_fetch_assoc($select_category_id)){
                                  $cat_id=$row['cat_id'];
                                  $cat_title=$row['cat_title'];
                                  ?>
                                   <input type="text" name="cat_title" class="form-control" value="<?php if(isset($cat_title)){echo $cat_title;}    ?>">
                             <?php    }}?>

                             <?php  
                             
                             if(isset($_POST['update_category'])){
                              $the_cat_title=$_POST['cat_title'];
                              $query="UPDATE categories SET cat_title='{$the_cat_title}' WHERE cat_id={$cat_id}";
                              $update_query=mysqli_query($connection,$query);
                              if(!$update_query){
                                die('QUERY FAILED'.mysqli_error($connecton));
                              }
                             }

                             ?>
                              </div>
                            
                            <div class="form-group">
                              <input type="submit" name="update_category" class="btn btn-primary" value="Update">
                            </div>
                          </form>