 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php"> CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


                    <?php   

                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection , $query);
                    While($row = mysqli_fetch_assoc($select_all_categories_query)){
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];


                        $category_class ='';
                        $registration_class = '';

                       $pageName =  basename($_SERVER['PHP_SELF']);

                       $registration = 'registration.php';

                       if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
                           
                        $category_class ='active';


                       }elseif ($pageName == $registration) {
                           $registration_class = 'active';
                       }
                        echo "<li class='$category_class'><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";



                    }


                    ?>

                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <li class="<?php echo $registration_class  ?>">
                        <a href="registration.php">Registration</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>

                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>