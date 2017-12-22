<?php include"init.php"        ; ?>
<?php include $tpl."header.php"; ?>
<?php
$id=$_GET['id'];
$db = new DBConnect();
//Create A Selcet Post query 
$query ="SELECT * FROM categories where id = $id";
//Run Select speifice Post Query 
$category = $db->select($query)->fetch_assoc(); 

 if(isset($_POST['submit'])){
        //Assign Vars 
        $name = mysqli_real_escape_string($db->link, $_POST['name']);

        //Validate Vars 
        if($name==''){
            $error="please Fill all requierd Fields";
        }else{
            $query ="UPDATE  categories 
            SET name    = '$name '
                 WHERE id =".$id;
            $insert_row = $db->update($query);
        }
    } 

?>
<div class="container">
<form role="form" class="admin_content" action="edit_category.php?id=<?php echo urlencode($id); ?>" method="post" >

    <div class="form-group">
        <label for="exampleCategoryInputName">Category Name</label>
        <input name="name" type="text" class="form-control" id="exampleCategoryInputName" placeholder="Enter Category Name" value="<?php echo $category['name']; ?>">
    </div>
 
    <div class="form-group">
    <input name="submit" type="submit" class="btn btn-primary mr-2 my-3" value="Edit  ">  
    <a href="index.php"   class="btn btn-warning my-3"                   >Cancel</a>
    </div>

</form>
</div>
<?php include $tpl."footer.php"; ?>