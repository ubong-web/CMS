
<?php

if(isset($_GET['edit_user'])) {

$the_user_id = $_GET['edit_user'];

$query = "SELECT * FROM users WHERE user_id = $the_user_id";

$select_users_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($select_users_query)) {


          $user_id = $row['user_id'];
          $username = $row['user_name'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_password = $row['user_password'];
          // $user_image = $row['image'];
          $user_role = $row['user_role'];
   


}

}





if(isset($_POST['edit_user'])) {

   // $post_category = $_POST['post_category_id'];
   // $user_id = $_POST['user_id'];
   $user_name = $_POST['user_name'];
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];

   // $user_image = $_FILES['image']['name'];
   // $user_image_temp = $_FILES['image']['tmp_name'];

   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
   $user_role = $_POST['user_role'];
   // $post_content = $_POST['post_content'];


   // move_uploaded_file($user_image_temp, "./images/$user_image");


// $query = "UPDATE users SET(user_name, user_firstname, user_lastname, user_email, user_role) ";
// $query.= "VALUE('{$user_name}','{$user_firstname}','{$user_lastname}', '{$user_email}','{$user_role}') ";



      $query = "UPDATE users SET ";
      $query .= "user_name = '{$user_name}', ";
      $query .= "user_firstname = '{$user_firstname}', ";
      $query .= "user_lastname = '{$user_lastname}', ";
      $query .= "user_email = '{$user_email}', ";
      $query .= "user_password = '{$user_password}'";
      $query .= "user_role = '{$user_role}'";
      $query .= "WHERE user_id = {$the_user_id} ";


   $edit_user_query = mysqli_query($connection, $query);


   confirm($edit_user_query);


   // echo "<p class='bg-success'>Post Created. or <a href='posts.php'>Edit More Posts</a></p>";


}





?>


 <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                <label for="" >First Name</label>
                <input type="text" name="user_firstname" class="form-control" placeholder="First Name" value="<?php echo $user_firstname; ?>">
                </div>

            <div class="form-group">
                <label for="post_author" >Last Name</label>
            <input type="text" name="user_lastname" class="form-control" placeholder="Last Name" value="<?php echo $user_lastname; ?>">
            </div>

             <div class="form-group">
       <label for="category">User Role</label>
       <select name="user_role" id="">
        <option value=""><?php  echo $user_role; ?></option>
        

        <?php



       if($user_role == 'admin') {

        echo "<option value='subscriber'>Subscriber</option>";
       

       } else {

        echo "<option value='admin'>admin</option>";
       }


      
     


        ?>




      
 
      </select>
      </div>

        <div class="form-group">
                <label for="post_author" >Username</label>
            <input type="text" name="user_name" class="form-control" placeholder="Username" value="<?php echo $username; ?>">
            </div>

            <div class="form-group">
                <label for="post_author" >User Image</label>
            <input type="hidden" name="image" class="form-control" placeholder="Username" value="<?php echo $user_lastname; ?>">
            </div>

            <div class="form-group">
                <label for="post_author" >Email</label>
            <input type="text" name="user_email" class="form-control" placeholder="Email Address" value="<?php echo $user_email; ?>">
            </div>

              <div class="form-group">
                <label for="post_author" >Password</label>
            <input type="user_password" name="" class="form-control" placeholder="Password" >
            </div>


             <div class="form-group">
                <input type="submit" name="edit_user" class="btn btn-primary" value="Edit User">
                </div>


</form>