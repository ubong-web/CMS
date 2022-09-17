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
    $the_post_author = $_GET['author'];
  }


$query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}'";
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
                    by All Post by <?php echo "$post_author"; ?>
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

 


 
                <!-- Pager -->
          

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include("includes/sidebar.php");  ?>


        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->

<?php include("includes/footer.php");  ?>