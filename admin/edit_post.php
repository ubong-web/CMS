<?php include("includes/admin_header.php");  ?>

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


                    <div class="col-md-12">
   

<?php 


    if(isset($_GET['edit'])) {

    $post_id = $_GET['edit'];

    $query = "SELECT * FROM posts WHERE post_id = $post_id";

    $select_post_id = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_post_id)){

          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['image'];
          $post_tag = $row['post_tag'];
          $post_content = $row['post_content'];
          $post_status = $row['post_status'];

      }}
    

     ?>

      <?php     

       if(isset($_POST['update_post'])) {

        $the_cat_title = $_POST['post_title'];

        $query = "UPDATE posts SET cat_title = '{$the_cat_title}' WHERE cat_id = $cat_id ";



        $update_category = mysqli_query($connection, $query);

         header("Location: edit_post.php");

        }


        ?>







                    
                <form action="" method="post">
                <input type="hidden" name="post_category" class="form-control" placeholder="Post Category">
                <div class="form-group">
                <label for="" >ADD POST</label>
                <input type="text" name="post_title" class="form-control" placeholder="Post Title" value="<?php if(isset($post_title)){echo $post_title;} ?>">
                </div>

            <div class="form-group">
                <label for="post_author" >Post AUthor</label>
            <input type="text" name="post_author" class="form-control" placeholder="Post Author" value="<?php if(isset($post_author)){echo $post_author;} ?>" >
            </div>

            <div class="form-group">
                <label for="post_date" >Post Date</label>
            <input type="date" name="post_date" class="form-control" placeholder="Post Date" value="<?php if(isset($post_date)){echo $post_date;} ?>">
                </div>

                <div class="form-group">
            <label for="post_image" >Post Image</label>
            <input type="FILE" name="post_image" class="form-control" placeholder="Post Image" value="<?php if(isset($post_image)){echo $post_image;} ?>" >
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
        <textarea class="form-control"name="post_content" id="" cols="30" rows="10" value="<?php if(isset($post_content)){echo $post_content;} ?>">
         </textarea>
                </div>

            

                <div class="form-group">
                <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
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