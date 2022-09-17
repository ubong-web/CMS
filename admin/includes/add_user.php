
<?php

if(isset($_POST['submit'])) {

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


$query = "INSERT INTO users(user_name, user_firstname, user_lastname, user_email, user_password, user_role) ";
$query.= "VALUE('{$user_name}','{$user_firstname}','{$user_lastname}', '{$user_email}', '{$user_password}','{$user_role}') ";


   $user_query = mysqli_query($connection, $query);


   confirm($user_query);


   echo " User Created : " . " " . "<a style='float: right;' class='btn btn-success' href='users.php'>View Users</a> ";


}





?>


 <form action="" method="post" enctype="multipart/form-data" style='margin-top: 20px;'>

                <div class="form-group">
                <label for="" >First Name</label>
                <input type="text" name="user_firstname" class="form-control" placeholder="First Name">
                </div>

            <div class="form-group">
                <label for="post_author" >Last Name</label>
            <input type="text" name="user_lastname" class="form-control" placeholder="Last Name">
            </div>

             <div class="form-group">
       <label for="category">User Role</label>
       <select name="user_role" id="">
         <option value="admin">Admin</option>
         <option value="subscriber">Subscriber</option>  

           
        
       </select>
      
      </div>

        <div class="form-group">
                <label for="post_author" >Username</label>
            <input type="text" name="user_name" class="form-control" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="post_author" >User Image</label>
            <input type="hidden" name="image" class="form-control" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="post_author" >Email</label>
            <input type="text" name="user_email" class="form-control" placeholder="Email Address">
            </div>

              <div class="form-group">
                <label for="post_author" >Password</label>
            <input type="password" name="user_password" class="form-control" placeholder="Password">
            </div>


             <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Add User">
                </div>


</form>