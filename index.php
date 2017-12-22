<?php
    include("init.php");
    include($tpl."header.php");
 ?>
<?php
   //Create database object
   $db = new DBConnect(); 

  //Create A Selcet Posts Query
  $query = "SELECT * FROM posts ORDER BY id DESC";

  //Run SELECT Query

  $posts = $db->select($query);

  //Create A Select Categories 
  $query = "SELECT * FROM categories";
  //Run Selcet Categories
  $category = $db ->select($query);



?>
 
 <?php if($posts){  ?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            
          <img class="my-3" src="<?php echo $img?>if_wordpress_word_press_395433.png" alt="LOGO img">
          <h1 class="d-inline my-4">PHP
            <small>LOVEERS BLOG</small>
          </h1>

          <!-- Blog Post -->
          <?php while($row= $posts->fetch_assoc()){ ?>
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo $img.$row['img']?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $row['title']; ?></h2>
              <p class="card-text"  ><?php echo shortText($row['body' ]); ?></p>
              <a href="post.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on   <?php echo formatDate($row['date'  ]);?> by
              <a href="#"><?php echo $row['author'];?></a>
            </div>
          </div>
          <?php }  ?>
          <!-- Blog Post -->
          
      <?php }else{ ?>
        <p> There Are No Posts Yet </p>
      <?php } ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">ABOUT</h5>
            <div class="card-body">
              <?php echo $about; ?>
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
                      <a href="posts.php?category=<?php echo urlencode($row['id']); ?>"><?php echo $row['name']; ?></a>
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
     
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->




 <?php 
    include($tpl."footer.php")
 ?>