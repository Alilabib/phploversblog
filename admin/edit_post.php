<?php include"init.php"        ; ?>
<?php include $tpl."header.php"; ?>
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
     //insert Data in database
    if(isset($_POST['submit'])){
        //Assign Vars 
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body  = mysqli_real_escape_string($db->link, $_POST['body']);
        $cat   = mysqli_real_escape_string($db->link, $_POST['category']);
        $author= mysqli_real_escape_string($db->link, $_POST['author']);
        $tag   = mysqli_real_escape_string($db->link, $_POST['tags']);
        $img       ="/600x400/".mysqli_real_escape_string($db->link,$_FILES['image']['name']);
        $img_temp ="/600x400/".mysqli_real_escape_string($db->link,$_FILES['image']['tmp_name']);
        move_uploaded_file($img_temp,$postimage);

        //Validate Vars 
        if($title==''||$body==''||$cat==''||$author==''||$tag==''||$img==''){
            $error="please Fill all requierd Fields";
        }else{
            $query ="UPDATE  posts 
            SET  category = '$cat   ',
                 title    = '$title ',
                 body     = '$body  ',
                 author   = '$author',
                 tags     = '$tag   ',
                 img      = '$img   '
                 WHERE id =".$id;
            $insert_row = $db->update($query);
        }
    }
?>

<div class="container">
<form role="form" action="edit_post.php?id=<?php echo urlencode($id);?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="examplePostInputTitle">Post Title</label>
        <input name="title" type="text" class="form-control" id="examplePostInputTitle" placeholder="Enter Post Title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label for="examplePostArea1">Post Body</label>
        <textarea name="body" id="examplePostArea1" class="form-control" placeholder="Enter Post Body">
            <?php echo $post['body']; ?> 
        </textarea>
    </div>
    <div class="form-group">
        <label for="examplePostCategory1">Post Category</label>
        <select name="category" class="form-control" id="examplePostCategory1">
        <?php while($row = $category->fetch_assoc()){ ?>
        <?php
            if($row['id'] == $post['category']){
                $selected ='selected';
            }else{
                $selected =' ';
            }
         ?>
        <option value="<?php echo $row['id'];?>" <?php echo $selected;?>><?php echo $row['name']; ?></option>

        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="examplePostInputTitle">Author</label>
        <input name="author" type="text" class="form-control" id="examplePostInputTitle" placeholder="Enter Author Name" value="<?php echo $post['author'];?>">
    </div>
    <div class="form-group">
        <label for="examplePostInputTitle">Tags</label>
        <input name="tags" type="text" class="form-control" id="examplePostInputTitle" placeholder="Enter Tags" value="<?php echo $post['tags'];?>">
    </div>
    <div class="form-group">
        <label for="exampleInputFile1"> Post Image </label>
        <input type="file" name="image" class="" id="exampleInputFile1">
        <p class="help-block">Post image will disappear before Post Body </p>
    </div>
    <div class="form-group">
    <input name="submit" type="submit" class="btn btn-primary mr-2 my-3" value="Edit">
    <button type="reset " class="btn btn-danger mr-2 my-3"     >Clear</button>
    <a href="index.php"   class="btn btn-warning my-3">Cancel</a>
    </div>
</form>
</div>
<?php include $tpl."footer.php"; ?>