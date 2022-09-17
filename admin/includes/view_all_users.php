<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>User Role</th>
            
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
       <tr>

       <?php   

$query = "SELECT * FROM users";

$select_users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($select_users)) {


          $user_id = $row['user_id'];
          $username = $row['user_name'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_image = $row['image'];
          $user_role = $row['user_role'];
        



          echo "<tr>";
          echo "<td>{$user_id}</td>";
          echo "<td>{$username}</td>";
          echo "<td>{$user_firstname}</td>";
          echo "<td>{$user_lastname}</td>";
          echo "<td>{$user_email}</td>";
          echo "<td>{$user_image}</td>";
          // echo "<td>{$user_image}</td>";
          echo "<td>{$user_role}</td>";
          echo "<td> <a class='btn btn-warning' href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
          echo "<td> <a class='btn btn-success' href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
          echo "<td> <a class='btn btn-primary' href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
          echo "<td> <a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a></td>";

          echo "</tr>";



}        
?>

            <?php   

  if(isset($_GET['change_to_admin'])) {

 $the_user_id = $_GET['change_to_admin'];

 $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";


 $admin_user_query = mysqli_query($connection, $query);

 header("Location: users.php");

        }





   if(isset($_GET['change_to_sub'])) {

 $the_user_id = $_GET['change_to_sub'];

 $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";


 $subscriber_user_query = mysqli_query($connection, $query);

 header("Location: users.php");

        }
     










       if(isset($_GET['delete'])) {

        $the_user_id = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = $the_user_id ";



        $delete_user = mysqli_query($connection, $query);

         header("Location: users.php");

        }


        ?>  
 

        </tr>        
    </tbody>
</table>