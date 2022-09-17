<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post Title</th>
            <th>Post Author</th>
            <th>Post Date</th>
            <th>Post Category</th>
            <th>Post Image</th>
            <th>Post Content</th>
            <th>Post Status</th>
            <th>Post comment count</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
       <tr>

       <?php   

$query = "SELECT * FROM posts";

$view_all_post_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($view_all_post_query)) {


          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_category = $row['post_category'];
          $post_image = $row['image'];
          $post_content = $row['post_content'];
          $post_status = $row['post_status'];
          $post_comment_count = $row['post_comment_count'];



          echo "<tr>";
          echo "<td>{$post_id}</td>";
          echo "<td>{$post_title}</td>";
          echo "<td>{$post_author}</td>";
          echo "<td>{$post_date}</td>";
          


    $query = "SELECT * FROM categories WHERE cat_id = $post_category";

    $select_category_id = mysqli_query($connection,$query);
    confirm($select_category_id);

    while($row = mysqli_fetch_assoc($select_category_id)){

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<td> {$cat_title} </td> ";


}



      echo "<td> <img src='../images/$post_image' alt='image' width='100' ></td>";
      echo "<td>{$post_content}</td>";
      echo "<td>{$post_status}</td>";
      echo "<td>{$post_comment_count}</td>";
      echo "<td> <a class='btn btn-success' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
      echo "<td> <a class='btn btn-danger' href='posts.php?delete={$post_id}'>Delete</a></td>";
      echo "</tr>";

}        
?>

            <?php     

       if(isset($_GET['delete'])) {

        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id = $the_post_id ";



        $delete_post = mysqli_query($connection, $query);

         header("Location: posts.php");

        }


        ?>  


        </tr>        
    </tbody>
</table>