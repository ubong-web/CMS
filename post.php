<?php include("includes/db.php");  ?>
<?php include("includes/header.php");  ?>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<?php include("includes/navigation.php");  ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
          <div class="col-md-8">

    <?php

  if(isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];
  }


$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
$select_post_query = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($select_post_query )) {

   $post_title = $row['post_title'];
   $post_author = $row['post_author'];
   $post_date = $row['post_date'];
   $post_image = $row['image']; 
   $post_content = $row['post_content'];


?>





     <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo "$post_title"; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "$post_author"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo "$post_date"; ?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image;?>"   alt="">
                <hr>
                <p><?php echo "$post_content"; ?></p>
               

                <hr>

               
         


<?php  }  ?>

<?php    

   if(isset($_POST['submit'])) {

    $the_post_id = $_GET['p_id'];


     $comment_author = $_POST['comment_author'];
     $comment_email = $_POST['comment_email'];
     $comment_content = $_POST['comment_content'];



     $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
     $query.= "VALUE($the_post_id,'{$comment_author}','{$comment_email}', '{$comment_content}', 'unapproved', now()) ";


   $insert_comment_query = mysqli_query($connection, $query);

       if(!$insert_comment_query) {

        die('QUERY FAILED'. mysqli_error($connection));
       }

   

   

 }

?>

 <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
            <!--       
                          <div class="form-group">
            <label for="comment_date" >Comment Date</label>
            <input type="date" name="comment_date" class="form-control" placeholder="Comment Date">
                </div> -->
                    <div class="form-group">
            <label for="comment_author" >Author</label>
            <input type="comment_author" name="comment_author" class="form-control" placeholder="Comment Author">
                </div>
                <div class="form-group">
            <label for="comment_email" >Email</label>
            <input type="comment_email" name="comment_email" class="form-control" placeholder="Comment Email">
                </div>
            <div class="form-group">
            <label for="Comment_content" >Comment</label>
            <textarea class="form-control" rows="3" name="comment_content"></textarea>    </div>
                        
                <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Comment">
                </div>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

<?php   

  $query = "SELECT * FROM comments WHERE comment_id = {$the_post_id} ";
  $query .= "AND comment_status = 'approved' ";
  $query .= "ORDER BY comment_id DESC ";

  $comment_query = mysqli_query($connection, $query);
  
     if(!$comment_query) {
        die('QUERY FAILED . mysqli_error($connection)');
     }


  while($row = mysqli_fetch_assoc($comment_query)) {

     $comment_author = $row['comment_author'];
     $comment_content = $row['comment_content'];
     $comment_date = $row['comment_date'];


   ?>


     
        <!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body"><?php echo  "$comment_date";  ?>
        <h4 class="media-heading">
            <small><?php echo  "$comment_author";  ?></small>
        </h4>
       <?php echo  "$comment_content";  ?>
    </div>
</div>



 <?php } ?>



 
                <!-- Pager -->
          

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php");  ?>


        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->

<?php include("includes/footer.php");  ?>