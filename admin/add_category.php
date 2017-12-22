<?php include"init.php"        ; ?>
<?php include $tpl."header.php"; ?>
<div class="container">
<form role="form" class="admin_content" action="add_category.php" method="post" >

    <div class="form-group">
        <label for="exampleCategoryInputName">Category Name</label>
        <input name="name" type="text" class="form-control" id="exampleCategoryInputName" placeholder="Enter Category Name">
    </div>
 
    <div class="form-group">
    <input name="submit" type="submit" class="btn btn-primary mr-2 my-3" value="ADD">
    <button type="reset " class="btn btn-danger mr-2 my-3"               >Clear</button>
    <a href="index.php"   class="btn btn-warning my-3"                   >Cancel</a>
    </div>

</form>
</div>
<?php include $tpl."footer.php"; ?>