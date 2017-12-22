<?php include "init.php"; ?>
<?php include($tpl."header.php"); ?>
<?php

$id=$_GET['id'];
$db = new DBConnect();
//Create A Selcet Post query 
$query ="SELECT * FROM posts where id = $id";
//Run Select speifice Post Query 
$post = $db->select($query)->fetch_assoc();  

//Create A Select Categories 
  $query = "SELECT * FROM categories";
  //Run Selcet Categories
  $category = $db ->select($query);
?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $post['title'];  ?></h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#"><?php echo $post['author']; ?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?php echo formatDate($post['date']); ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $img.$post['img']; ?>" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $post['body']; ?></p>

          
          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <!-- Comment with nested comments -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form action="posts.php" method="POST"> 
              <div class="input-group">
              
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <input type="submit" name="search" value="GO">
                </span>
              </div>
              </form>
            </div>
          </div>

           <?php if($category){ ?>
          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                
                  <ul class="list-unstyled mb-0">
                    <?php while($row = $category->fetch_assoc()){ ?>
                    <li class="category">
                      <a href="#"><?php echo $row['name']; ?></a>
                    </li>
                    <?php } ?>

                  </ul>
                </div>
              
              </div>
            </div>
          </div>

         <?php }else{ ?>
            <p> There Are No Categories </p>
         <?php } ?> 

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">ABOUT</h5>
            <div class="card-body">
              <?php echo $about; ?>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->



<?php include($tpl."footer.php"); ?>