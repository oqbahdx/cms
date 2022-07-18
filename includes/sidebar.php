<div class="col-md-4">

                <!-- Blog Search Well -->

                <?php 
                if (isset($_POST['submit'])) {
                $search = $_POST['search'];


                $query = "SELECT * FROM postes WHERE post_tags LIKE '%$search%' " ;

                $search_query = mysqli_query($connection , $query); 
                if (!$search_query) {
                   die("QUERY FAILD" . mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);

                if ($count == 0) {
                   
                }else{

                   

                }

                }

               


                 ?>


                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
               
                </div>



                 <!-- /login -->
                <div class="well">

                    <?php  if(isset($_SESSION['user_role'])): ?>
                    <h4>logged in as  <?php $_SESSION['username']; ?>  </h4>
                    <a href="includes/logout.php" class="btn btn-primary">LOGOUT</a>

                    <?php  else: ?>
                        <h4>LOGIN</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control"  placeholder="enter your user name">
                        
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control"  placeholder="enter your password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">submit
                                
                            </button>
                            


                        </span>
                        
                    </div>
                    </form>
                    <!-- /.input-group -->

                    <?php  endif; ?>


                    
               
                </div>



                <!-- Blog Categories Well -->
                <div class="well">

                    <?php  


                    $query = "SELECT * FROM categories ";
                    $select_categories_sidebar = mysqli_query($connection , $query);


                    

                    ?>



                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                        While($row = mysqli_fetch_assoc($select_categories_sidebar)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }

                        ?>

                           
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                    </div>
                    <!-- /.row -->
                </div>








                <!-- Side Widget Well -->
               <?php include "widget.php"; ?>
            </div>