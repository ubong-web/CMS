<div class="col-md-4">




                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" >
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit" >
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                </div>



                  <!-- Login -->
                <div class="well">
                    <h5>Login Here</h5>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="user_name" type="text" class="form-control" placeholder="Enter Username" >
                        </div>
                        <div class="input-group">
                        <input name="user_password" type="password" class="form-control" placeholder="Enter Password" >
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="login">Login</button>
                        </span>
                         </div>
                        
                    
                    <form>
                    <!-- /.input-group -->
                </div>








                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
<?php

$query = "SELECT * FROM categories";
$select_all_categories_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($select_all_categories_query)){

    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];

    echo "<li><a href='category.php?category=$cat_id'> {$cat_title } </a></li>";
}


?>

                                <!-- <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                       
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>