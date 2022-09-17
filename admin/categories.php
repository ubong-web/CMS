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


                    <div class="col-xs-6">
                    
    <?php   insertCategories();  ?>







                <form action="" method="post">
                <div class="form-group">
                <label for="cat_title">Add Category</label>
                <input type="text" name="cat_title" class="form-control">
                </div>

                <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                </div>


                </form>

<?php  //UPDATE AND INCLUDE CODE


if(isset($_GET['edit'])) {


      $cat_id = $_GET['edit'];

      include "includes/update_categories.php";
}


?>


  </div>






                <div class="col-xs-6">
                
                        <div class="form-group">
                            <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Category Title</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>


<?php   findAllCategories(); ?>





   
     




        <?php  deleteCategories();  ?>  

        

                                           
                                        </tr>
                                    </tbody>
                                    </table>

                                </div>
                         </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/admin_footer.php");  ?>