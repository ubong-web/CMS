<?php   include "db.php";     ?>
<?php   session_start();     ?>


<?php

if(isset($_POST['login'])) {

$username = $_POST['user_name'];
$password =	$_POST['user_password'];


$username = mysqli_real_escape_string($connection, $username);

$password = mysqli_real_escape_string($connection, $password);

$query = "SELECT * FROM users WHERE user_name = '{$username}'";
$select_user_query = mysqli_query($connection, $query);
if(!$select_user_query) {
	die("Query Failed". mysqli_error($connection));
}

while($row = mysqli_fetch_array($select_user_query)) {

	$db_id = $row['user_id'];
	$db_username = $row['user_name'];
	$db_user_password = $row['user_password'];
	$db_user_firstname = $row['user_firstname'];
	$db_user_lastname = $row['user_lastname'];
	$db_user_role = $row['user_role'];

}

if($username === $db_username && $password === $db_user_password) {


 $_SESSION['user_name'] = $db_username;
 $_SESSION['user_password'] = $db_user_password;
 $_SESSION['user_firstname'] = $db_user_firstname;
 $_SESSION['user_lastname'] = $db_user_lastname;
 $_SESSION['user_role'] = $db_user_role;

    header("Location: ../admin");

}  else {

	header("Location: ../index.php");
}
}


?>