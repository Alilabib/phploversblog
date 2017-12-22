<?php include"init.php"        ; ?>
<?php include $tpl."header.php"; ?>
<?php
$db = new DBConnect();
//Create A Select Categories 
  $query = "SELECT * FROM categories";
  //Run Selcet Categories
  $category = $db ->select($query);

    //insert Data in database
    if(isset($_POST['submit'])){
        //Assign Vars 
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body  = mysqli_real_escape_string($db->link, $_POST['body']);
        $cat   = mysqli_real_escape_string($db->link, $_POST['category']);
        $author= mysqli_real_escape_string($db->link, $_POST['author']);
        $tag   = mysqli_real_escape_string($db->link, $_POST['tags']);
        $img       ="/600x400/". mysqli_real_escape_string($db->link, $_FILES['img']['name']);
        $img_temp  ="/600x400/". mysqli_real_escape_string($db->link, $_FILES['img']['tmp_name']);
        move_uploaded_file($img_temp, $postimage);
        //Validate Vars 
        if($title==''||$body==''||$cat==''||$author==''||$tag==''||$img==''){
            $error="please Fill all requierd Fields";
        }else{
            /*echo $title;
            exit();*/
            $query ="INSERT INTO posts
            (category, title, body, author, tags, img)
            VALUES('$cat', '$title', '$body', '$author', '$tag', '$img')";
            $insert_row = $db->insert($query);
        }
    }

?>
<div class="container">
<form role="form"  action="add_post.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="examplePostInputTitle">Post Title</label>
        <input name="title" type="text" class="form-control" id="examplePostInputTitle" placeholder="Enter Post Title">
    </div>
    <div class="form-group">
        <label for="examplePostArea1">Post Body</label>
        <textarea name="body" id="examplePostArea1" class="form-control" placeholder="Enter Post Body"></textarea>
    </div>
    <div class="form-group">
        <label for="examplePostCategory1">Post Category</label>
        <select name="category" class="form-control" id="examplePostCategory1">
        <?php while($row = $category->fetch_assoc()){ ?>
        <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="examplePostInputTitle">Author</label>
        <input name="author" type="text" class="form-control" id="examplePostInputTitle" placeholder="Enter Author Name">
    </div>
    <div class="form-group">
        <label for="examplePostInputTitle">Tags</label>
        <input name="tags" type="text" class="form-control" id="examplePostInputTitle" placeholder="Enter Tags">
    </div>
    <div class="form-group">
        <label for="exampleInputFile1"> Post Image </label>
        <input type="file" name="img" class="" id="exampleInputFile1">
        <p class="help-block">Post image will disappear before Post Body </p>
    </div>
    <div class="form-group">
    <input name="submit" type="submit" class="btn btn-primary mr-2 my-3" value="ADD">
    <button type="reset " class="btn btn-danger mr-2 my-3"     >Clear</button>
    <a href="index.php"   class="btn btn-warning my-3">Cancel</a>
    </div>
</form>
</div>
<?php include $tpl."footer.php"; ?>