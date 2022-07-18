<?php 


 function redirect($location){

    return header("Location: " . $location);

 }


 function confirmQuery($result){

    global $connection;

    if (!$result) {
        die("QUERY FAILED" .    mysqlI_error($connection));
     }


 }

 

 function findAllCategories(){

 	global $connection;

 	   					$query = "SELECT * FROM categories ";
                        $select_categories = mysqli_query($connection , $query);

                        While($row = mysqli_fetch_assoc($select_categories)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo "<tr>";
                        echo "<td>{$cat_id}</td>";
                        echo "<td>{$cat_title}</td>";
                        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                        echo "</tr>";
                        
                        }
 }
 
   

 function delete_categories(){

    global $connection;

     if (isset($_GET['delete'])) {
                            $the_cat_id = $_GET['delete'];

                            $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                            $delete_qeury = mysqli_query($connection , $query);
                            header("Location: categories.php");
                        }


 }    


 function is_admin($username){

    global $connection;

    $query = "SELECT user_role FROM users WHERE username = '$username'";

    $result = mysqli_query($connection , $query);

    confirmQuery($result);

    $row = mysqli_fetch_array($result);

    if ($row['user_role'] == 'admin') {
        return true;
    }else{

        return false;
    }

 }


 function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";

    $result = mysqli_query($connection , $query);

    confirmQuery($result);

    if (mysqli_num_rows($result)>0) {
        return true;
    }else{


        return false;
    }


 }



 function email_exists($email){

    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email = '$email'";

    $result = mysqli_query($connection , $query);

    confirmQuery($result);

    if (mysqli_num_rows($result)>0) {
        return true;
    }else{


        return false;
    }


 }



function register_user($username,$email,$password){

    global $connection;



    $username = mysqli_real_escape_string($connection , $username);
    $email    = mysqli_real_escape_string($connection , $email);
    $password = mysqli_real_escape_string($connection , $password);

    
    $password = password_hash($password, PASSWORD_BCRYPT , array('cost' =>12));

    $query = "INSERT INTO users (username , user_email , user_password , user_role)";
    $query .="VALUES ('{$username}','{$email}','{$password}','subscriber')";
    $register_user_query = mysqli_query($connection , $query);

    confirmQuery($register_user_query); 




}


function login_user($username,$password){
    global $connection;

$username = trim($username);
$password = trim($password);

$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);

$query = "SELECT * FROM users WHERE username = '{$username}'";
$select_user_query = mysqli_query($connection,$query);
if (!$select_user_query) {
    die('Datebase : ' . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($select_user_query)) {
    
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_fristname = $row['user_fristname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
}

$password = crypt($password,$db_user_password);

if ($username === $db_username && $password === $db_user_password) {

$_SESSION['username'] = $db_username;
$_SESSION['fristname'] = $db_user_fristname;
$_SESSION['lastname'] = $db_user_lastname;
$_SESSION['user_role'] = $db_user_role;

redirect("/cms/admin");


    
}else{
    redirect("/cms/index.php");
}


}


function insert_categories(){

    global $connection;

    if (isset($_POST['submit'])) {
        
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            
            echo "this field should not be empty";
        }else{

            $stmt = mysqli_prepare($connection ,"INSERT INTO categories(cat_title) VALUES(?)");
            

           mysqli_stmt_bind_param($stmt , "s" ,$cat_title);

           mysqli_stmt_execute($stmt);



           if (!$stmt) {
               
               die('database : ' . mysqli_error($connection));
           }

        }
        mysqli_stmt_close($stsmt);

    }


}

?>