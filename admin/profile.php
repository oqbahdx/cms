<?php include "includes/admin_header.php"; ?>
<?php    

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];


    $query = "SELECT * FROM users WHERE user = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_user_profile_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    
    
}}



?>


<?php  

if (isset($_POST['edit_user'])) {
    # code...
 


       
            
            $user_firstname    = ($_POST['user_fristname']);
            $user_lastname     = ($_POST['user_lastname']);
            $user_role          = ($_POST['user_role']);
            $username          = ($_POST['username']);
            $user_email        = ($_POST['user_email']);
            $user_password     = ($_POST['user_password']);
    
   

          $query = "UPDATE users SET ";
          $query .="user_firstname  = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_role   =  '{$user_role}', ";
          $query .="username = '{$username}', ";
          $query .="user_email = '{$user_email}', ";
          $query .="user_password   = '{$user_password}' ";
          $query .= "WHERE user_id = {$the_user_id} ";
       
       
            $edit_user_query = mysqli_query($connection,$query);
       
            confirmQuery($edit_user_query);
              
            









?>


    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome To Admin

                            <small>Author</small>
                        </h1>



<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">First Name</label>
      <input type="text" value="<?php echo $user_firstname;  ?>" class="form-control" name="user_fristname">
      
    </label>
    
  </div>
    
  <div class="form-group">
    <label for="post-author">Last Name</label>
      <input type="text" value="<?php echo $user_lastname;  ?>" class="form-control" name="user_lastname">
      
    </label>
    
  </div>
  
<!--- <div class="form-group">
    <label for="post-image">
      Post Image
      <input type="file" class="form-control" name="post_image">
      
    </label>
    
  </div> -->
  <select name="user_role" id="user_role" >
      <option ><?php echo $user_role;  ?></option>

      <?php   
      if ($user_role == 'admin') {
        echo "<option value='subscriber'>subscriber</option>";
      }else{

        echo "<option value='admin'>admin</option>";


      }




         ?>


      
      
      
    </select>
  <div class="form-group">
    <label for="post-tags">User Name</label>
      <input type="text" value="<?php echo $username;  ?>" class="form-control" name="username">
      
    </label>
    
  </div>
  <div class="form-group">
    <label for="post-content">Email</label>
      
      <input type="email" value="<?php echo $user_email;  ?>" class="form-control" name="user_email">
    
  </div>

  <div class="form-group">
    <label for="post-content">Password</label>
      
      <input type="password" value="<?php echo $user_password;  ?>" class="form-control" name="user_password">
    
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">

  </div>
</form>