<?php
   

   if(isset($_POST['create_user'])) {
       
            
            $user_firstname    = ($_POST['user_firstname']);
            $user_lastname     = ($_POST['user_lastname']);
            $user_role          = ($_POST['user_role']);
            $username          = ($_POST['username']);
            $user_email        = ($_POST['user_email']);
            $user_password     = ($_POST['user_password']);
    
   

            $query = "INSERT INTO users(user_firstname, user_lastname, user_role,username,user_email,user_password) ";
                 
            $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}') ";
             
                 
            $create_user_query = mysqli_query($connection, $query);
            if (!$create_user_query) {
             	die('databes : ' . mysqli_error($connection));
             } 


             echo "User Created: " . "" . "<a href='users.php'>Veiw Users</a> " ; 
              
            


}





?>





<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">First Name</label>
			<input type="text" class="form-control" name="user_firstname">
			
		</label>
		
	</div>
		
	<div class="form-group">
		<label for="post-author">Last Name</label>
			<input type="text" class="form-control" name="user_lastname">
			
		</label>
		
	</div>
	
<!---	<div class="form-group">
		<label for="post-image">
			Post Image
			<input type="file" class="form-control" name="post_image">
			
		</label>
		
	</div> -->
	<select name="user_role" id="user_role">
			<option>select option</option>
			<option>admin</option>
			<option>subscriber</option>
			
		</select>
	<div class="form-group">
		<label for="post-tags">User Name</label>
			<input type="text" class="form-control" name="username">
			
		</label>
		
	</div>
	<div class="form-group">
		<label for="post-content">Email</label>
			
			<input type="email" class="form-control" name="user_email">
		
	</div>

	<div class="form-group">
		<label for="post-content">Password</label>
			
			<input type="password" class="form-control" name="user_password">
		
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Add User">

	</div>
</form>