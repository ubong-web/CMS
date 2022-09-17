<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php   

if(isset($_POST['submit'])) {


 $user_name = $_POST['user_name'];
 $user_email = $_POST['user_email'];
 $user_password = $_POST['user_password'];


$user_name = mysqli_real_escape_string($connection,$user_name);
$user_email = mysqli_real_escape_string($connection,$user_email);
$user_password = mysqli_real_escape_string($connection,$user_password);


if ($user_name == "" || $user_email == "" || $user_password == "") {
        
    echo "This field should not be empty";

    } else {



$query = "SELECT randSalt FROM users";
$select_randsalt_query = mysqli_query($connection, $query);

if(!$select_randsalt_query) {

    die("Query Failed" . mysqli_error($connection));
}


 while ($row = mysqli_fetch_array($select_randsalt_query)) {

  $salt = $row['randSalt'];

$query = "INSERT INTO users (user_name, user_email, user_password, user_role, user_firstname, user_lastname) ";
$query.= "VALUE('{$user_name}', '{$user_email}', '{$user_password}','subscriber','','') ";


   $registration_query = mysqli_query($connection, $query);

  
   if(!$registration_query) {

    die("Query Failed" . mysqli_error($connection));

    header("Location: registration.php");
}

   
}
   // confirm($registration_query);


   // echo " User Created : " . " " . "<a style='float: right;' class='btn btn-success' href='users.php'>View Users</a> ";



 }

}







?>






    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 style="text-align: center;">Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="user_password" name="user_password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
