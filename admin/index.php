<?php include "init.php";       ?>
<?php include $tpl."header.php";?>
<?php


    $db = new DBConnect();
    //Create Post Select Query 
    $query ="SELECT posts.*,categories.name FROM posts
    INNER JOIN categories
    ON posts.category = categories.id";
    //Run Query Using Select Method From DB Class
    $post =$db->select($query);

    //Create Category Select Query 
    $query = "SELECT * FROM categories";
    $category =$db->select($query); 

    //Delete record from database
        if(isset($_GET['action'])){
        if($_GET['action']=='delete'){
            $id = $_GET['id'];
          $query="DELETE From posts WHERE id =".$id;
          $db->delete($query);    
          }elseif($_GET['action']=="deletecat"){
           $id = $_GET['id'];
           $query="DELETE FROM categories WHERE id =".$id;
           $db->delete($query);       
            } 
         }


 ?>
 <?php  
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<p class="alert alert-success">'. $msg .'</p>';
    }
 ?>
   <div class="container admin_content">
    <table class="table table-striped my-5">
        <tr>
            <th>POST ID   </th>
            <th>POST Title</th>
            <th>Category  </th>
            <th>Author    </th>
            <th>Date      </th>
            <th>Image     </th>
            <th colspan="2">Actions</th>
        </tr>
       <?php while($row = $post->fetch_assoc()){ ?>
        <tr>
            
           <td><?php echo $row['id'      ];                                          ?></td>
           <td><?php echo $row['title'   ];                                          ?></td>
           <td><?php echo $row['name'    ];                                          ?></td>
           <td><?php echo $row['author'  ];                                          ?></td>
           <td><?php echo formatDate($row['date'    ]);                              ?></td>
           <td><img class="figure-img caption" src="<?php echo $img.$row['img']; ?>" /></td>
           <td><a href="edit_post.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-primary">Edit</a></td>
           <td><a href="index.php?id=<?php echo urlencode($row['id']); ?>&action=delete" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
     <table class="table table-striped my-3"> 
        <tr>
            <th>Category ID   </th>
            <th>Category Title</th>
            <th colspan="2">Actions       </th>
        
        </tr>
       <?php while($row = $category->fetch_assoc()){ ?> 
        <tr>
           <td><?php echo $row['id'  ];   ?></td>
           <td><?php echo $row['name'];   ?></td>
           <td><a class="btn btn-primary" href="edit_category.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
           <td><a href="index.php?id=<?php echo urlencode($row['id']);?>&action=deletecat" class="btn btn-danger">Delete</a></td>
        </tr>
       <?php } ?>
    </table>
</div>
<?php include $tpl."footer.php"; ?>