
                      
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                
                            </tr>
                            </thead>
                       
                        <tbody>

<?php   


$query = 'SELECT * FROM posts'; 
$selcet_posts = mysqli_query($connection,$query); 

if (! $selcet_posts){
   die('Database error: ' . mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($selcet_posts)) {
    $post_id = $row['post_id'];
    $post_user = $row['post_user'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];

   echo "<tr>";
   echo "<td>$post_id</td>";
   echo "<td>$post_user </td>";
   echo "<td>$post_title</td>";


    $query = "SELECT * FROM  categories WHERE  cat_id = {$post_category_id} ";

    $selcet_categories_id = mysqli_query($connection,$query);
    if (! $selcet_categories_id){
     die('Database error: ' . mysqli_error($connection));
}

    while ($row = mysqli_fetch_assoc($selcet_categories_id)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<td>{$cat_title}</td>";
}
  

   
   echo "<td>$post_status</td>";
   echo "<td><img width='100' src='../images/$post_image'></td>";
   echo "<td>$post_tags</td>";
   echo "<td>$post_comment_count</td>";
   echo "<td>$post_date</td>";
   echo "<td><a href='posts.php?source=edit_post&p_id{$post_id}'>Edit</a></td>";
   echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
   echo "</tr>";


}


?>


                           
                        </tbody>
                         </table>

  <?php  




  if (isset($_GET['delete'])) {

   $the_post_id = $_GET['delete'];

   $query = "DELETE FROM postes WHERE post_id = {$the_post_id}";
   $delete_query= mysqli_query($connection,$query);
   header("Loaction: posts.php");
  }




  ?>