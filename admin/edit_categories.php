<?php
  include('../includes/connection.php');

  if(isset($_GET['edit_categories'])){
    $edit_id=$_GET['edit_categories'];
    $get_categories="Select * from `categories` where category_id=$edit_id";
    $result=mysqli_query($conn,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Products</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
      <h3 class="text-center text-top">Edit Categories</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="category_title" class="form-label">Category title</label>
              <input type="text" class="form-control" id="category_title" name="category_title" value="<?php echo $category_title?>" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <input type="submit" name="edit_categories" class="btn btn-info" value="Update Category">
            </div>
            <?php
              if(isset($_POST['edit_categories'])){
                $category_title=$_POST['category_title'];
                if($category_title==''){
                  echo "<script>alert('Please fill up all forms')</script>";
                }
                else{
                  $update="update `categories` set category_title='$category_title' where category_id=$edit_id";
                  $result_update=mysqli_query($conn,$update);
                  if($result_update){
                    echo "<script>alert('Category updated successfully')</script>";
                    echo "<script>window.open('./index.php?view_categories','_self')</script>";
                  }
                }
              }
            ?>
        </form>
  </body>
</html>