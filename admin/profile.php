<?php include("includes/admin_header.php");  ?>

  <?php  

if(isset($_SESSION['user_name'])) {

     $user_name = $_SESSION['user_name'];

     $query = "SELECT * FROM users WHERE user_name = '{$user_name }'";

     $select_user_profile_query = mysqli_query($connection, $query);

     while($row = mysqli_fetch_array($select_user_profile_query)) {

       $user_id = $row['user_id'];
          $username = $row['user_name'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_password = $row['user_password'];
          $user_role = $row['user_role'];



     }

}




?>

<?php

if(isset($_POST['update_profile'])) {

   
   $user_name = $_POST['user_name'];
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];

   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
   $user_role = $_POST['user_role'];



      $query = "UPDATE users SET ";
      $query .= "user_name = '{$user_name}', ";
      $query .= "user_firstname = '{$user_firstname}', ";
      $query .= "user_lastname = '{$user_lastname}', ";
      $query .= "user_email = '{$user_email}', ";
      $query .= "user_password = '{$user_password}',";
      $query .= "user_role = '{$user_role}'";
      $query .= "WHERE user_name = '{$user_name}' ";


   $update_user_query = mysqli_query($connection, $query);


   confirm($update_user_query);



}





?>


    <div id="wrapper">

        <!-- Navigation -->
       <?php include("includes/admin_navigation.php");  ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <?php include("includes/admin_sidebar.php");  ?>
            <!-- /.navbar-collapse -->
        </nav>

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
            <input type="password" name="user_password" class="form-control" placeholder="Password" value="<?php echo $user_password; ?>">
            </div>


             <div class="form-group">
                <input type="submit" name="update_profile" class="btn btn-primary" value="Update Profile">
                </div>


</form>

    



                         </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/admin_footer.php");  ?>