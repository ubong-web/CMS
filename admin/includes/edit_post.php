
   

<?php 


    if(isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";

    $select_post_id = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_post_id)){

          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_category = $row['post_category'];
          $post_date = $row['post_date'];
          $post_image = $row['image'];
          $post_tag = $row['post_tag'];
          $post_content = $row['post_content'];
          $post_status = $row['post_status'];
          $post_comment_count = $row['post_comment_count'];

      }}
    

     ?>

      <?php     

   if(isset($_POST['update_post'])) {



   $post_title = $_POST['post_title'];
   $post_author = $_POST['post_author'];
   $post_date = $_POST['post_date'];
   $post_category = $_POST['post_category'];

   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];

   $post_tag = $_POST['post_tag'];
   $post_status = $_POST['post_status'];
   $post_content = $_POST['post_content'];



   move_uploaded_file($post_image_temp, "../images/$post_image");


   if(empty($post_image)) {

   
   $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";

   $select_image = mysqli_query($connection, $query);

   while($row = mysqli_fetch_assoc($select_image)) {


    $post_image = $row['image'];


   } }   }




   


  


     $query = "UPDATE posts SET ";
     $query .= "post_title = '{$post_title}', ";
     $query .= "post_author = '{$post_author}', ";
     $query .= "post_date = '{$post_date}', ";
     $query .= "post_category = '{$post_category}', ";
     $query .= "image = '{$post_image}', ";
     $query .= "post_tag = '{$post_tag}' , ";
     $query .= "post_status = '{$post_status}', ";
     $query .= "post_content = '{$post_content}' ";
     $query .= "WHERE post_id = {$the_post_id}";


     $update_post = mysqli_query($connection, $query);

     confirm($update_post);


        


        ?>







                    
                <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                <label for="" >ADD POST</label>
                <input type="text" name="post_title" class="form-control" placeholder="Post Title" value="<?php if(isset($post_title)){echo $post_title;} ?>">
                </div>

            <div class="form-group">
                <label for="post_author" >Post AUthor</label>
            <input type="text" name="post_author" class="form-control" placeholder="Post Author" value="<?php if(isset($post_author)){echo $post_author;} ?>" >
            </div>

            <div class="form-group">
                <select name="post_category" id="" value="<?php echo $post_category;  ?>" >

                    <?php


$query = "SELECT * FROM categories";

 $select_category_query = mysqli_query($connection, $query);
 
 while($row = mysqli_fetch_assoc($select_category_query)){

   $cat_id = $row['cat_id'];
   $cat_title = $row['cat_title'];


   echo "<option value='{$cat_id}'>{$cat_title}</>";


}
                    ?>
                    

                </select>
            </div>

    <div class="form-group">
        <label for="post_date" >Post Date</label>
    <input type="date" name="post_date" class="form-control" placeholder="Post Date" value="<?php if(isset($post_date)){echo $post_date;} ?>">
        </div>

        <div class="form-group">
        <img src="../images/<?php echo $post_image;?>" alt="" width='100'>
        <input type="file" name="image">
        </div>

         <div class="form-group">
     <label for="post_tag" >Post Tags</label>
     <input type="text" name="post_tag" class="form-control" placeholder="Post Tags"
     value="<?php if(isset($post_tag)){echo $post_tag;} ?>">
                </div>

    <div class="form-group">
    <label for="post_status">Post Status</label>
     <select id="country" name="post_status" class="form-control">
          <option value="draft">Draft</option>
          <option value="published">Published</option>
        </select>
                </div>


             <div class="form-group">
         <label for="post_content" >Post Content</label>
        <textarea class="form-control"name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
                </div>

            

                <div class="form-group">
                <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
                </div>


                </form>
                         