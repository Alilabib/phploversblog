<?php
include"init.php";
include $tpl."header.php";
?>
<?php
  
  //Create database object
   $db = new DBConnect(); 
  


  if(isset($_GET['category'])){
    //assign category id in Variable
    $category= $_GET['category'];
    $query="SELECT * FROM posts WHERE category=$category ORDER BY id DESC";
    $posts =$db->select($query);
    //
  }elseif(isset($_GET['date'])){
    $date =$_GET['date'];
    $query="SELECT * FROM posts WHERE date between $date and '30-12-2017' ORDER BY id DESC";
    $posts =$db->select($query);
  }elseif(isset($_POST['search'])){
    $name = $_POST['search'];
    $query ="SELECT * FROM posts WHERE title like $name ";
    $posts = $db->select($query);
  }else{
    //Create A Selcet Posts Query
    $query = "SELECT * FROM posts";
    //Run SELECT Query
    $posts = $db->select($query);
  } 
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
      <div class="container">
        <div class="row">
          <div class="col-8 my-4">  
            <p class="alert alert-warning"> There Are No Posts Yet in This category </p> 
        

      <?php } ?>

          <!-- Pagination -->
      
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

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>




        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->




<?php 
    include $tpl."footer.php";
?>