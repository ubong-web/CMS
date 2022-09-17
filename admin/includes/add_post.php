
<?php

if(isset($_POST['submit'])) {

   // $post_category = $_POST['post_category_id'];
   $post_title = $_POST['post_title'];
   $post_author = $_POST['post_author'];
   $post_date = $_POST['post_date'];
   $post_category = $_POST['post_category'];

   $post_image = $_FILES['image']['name'];
   $post_image_temp = $_FILES['image']['tmp_name'];

   $post_tag = $_POST['post_tag'];
   $post_status = $_POST['post_status'];
   $post_content = $_POST['post_content'];


   move_uploaded_file($post_image_temp, "../images/$post_image" );


$query = "INSERT INTO posts(post_title, post_author, post_date, post_category, image, post_tag, post_status, post_content) ";
$query.= "VALUE('{$post_title}','{$post_author}','{$post_date}', '{$post_category}','{$post_image}','{$post_tag}','{$post_status}','{$post_content}') ";


   $post_query = mysqli_query($connection, $query);


   confirm($post_query);


   // echo "<p class='bg-success'>Post Created. or <a href='posts.php'>Edit More Posts</a></p>";


}





?>


                    
                n 

                <div class="form-group">
                <label for="" >ADD POST</label>
                <input type="text" name="post_title" class="form-control" placeholder="Post Title">
                </div>

            <div class="form-group">
                <label for="post_author" >Post AUthor</label>
            <input type="text" name="post_author" class="form-control" placeholder="Post Author">
            </div>

             <div class="form-group">
       <label for="category">Category</label>
       <select name="post_category" id="">
           
<?php

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);
        
        confirm($select_categories);


        while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
            
            echo "<option value='$cat_id'>{$cat_title}</option>";
         
            
        }

?>
           
        
       </select>
      
      </div>



   


            <div class="form-group">
                <label for="post_date" >Post Date</label>
            <input type="date" name="post_date" class="form-control" placeholder="Post Date">
                </div>

                <div class="form-group">
            <label for="post_image" >Post Image</label>
            <input type="file" name="image" class="form-control" placeholder="Post Image">
                </div>

         <div class="form-group">
     <label for="post_tag" >Post Tags</label>
     <input type="text" name="post_tag" class="form-control" placeholder="Post Tags">
                </div>

   <!--   <div class="form-group">
    <label for="post_status">Post Category</label>
     <select id="country" name="post_category_id" class="form-control">
          <option value="draft">Technology</option>
          <option value="published">Education</option>
          <option value="published">News</option>
          <option value="published">Sport</option>
        </select>
                </div> -->

    <div class="form-group">
    <label for="post_status">Post Status</label>
     <select id="country" name="post_status" class="form-control">
          <option value="draft">Draft</option>
          <option value="published">Published</option>
        </select>
                </div>


             <div class="form-group">
         <label for="post_content" >Post Content</label>
        <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
         </textarea>
                </div>

            

                <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Add Post">
                </div>


                </form>
                         