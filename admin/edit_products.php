<?php
  include('../includes/connection.php');

  if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_products="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($conn,$get_products);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $product_file=$row['product_file'];
    $product_price=$row['product_price'];
    
    $get_category_title="Select category_title from `categories` where category_id=$category_id";
    $result_category_title=mysqli_query($conn,$get_category_title);
    $row_category=mysqli_fetch_assoc($result_category_title);
    $category_title=$row_category['category_title'];
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
    <style>
        .edit_image{
            width: 30px;
            object-fit: contain;
        }
    </style>
  </head>
  <body>
      <h3 class="text-center text-top">Edit Products</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_title" class="form-label">Product title</label>
              <input type="text" class="form-control" id="product_title" name="product_title" value="<?php echo $product_title?>" placeholder="Enter product title" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_description" class="form-label">Product description</label>
              <input type="text" class="form-control" id="product_description" name="product_description" value="<?php echo $product_description?>" placeholder="Enter product description" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_keyword" class="form-label">Product keyword</label>
              <input type="text" class="form-control" id="product_keyword" name="product_keyword" value="<?php echo $product_keyword?>" placeholder="Enter product keyword" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <select class="form-select" name="product_category" id="" aria-label="Default select example">
                <option value="<?php echo $category_id?>" seleted><?php echo $category_title?></option>
                <?php
                  $get_categories ="Select * from `categories`";
                  $result_category =mysqli_query($conn,$get_categories);
                  while($row_category=mysqli_fetch_assoc($result_category)){
                    $category_id=$row_category['category_id'];
                    $category_title=$row_category['category_title']; 
                    echo "<option value='$category_id'>$category_title</option>";
                  };
                ?> 
              </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_file" class="form-label">Product picture</label>
              <div class="d-flex">
                <input class="form-control" type="file" id="product_file" name="product_file">
                <img src="./images/<?php echo $product_file?>" alt="" class="edit_image">
              </div>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_price" class="form-label">Product price</label>
              <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price?>" placeholder="Enter product price" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <input type="submit" name="edit_products" class="btn btn-info" value="Update Product">
            </div>
            <?php
              if(isset($_POST['edit_products'])){
                $product_title=$_POST['product_title'];
                $product_description=$_POST['product_description'];
                $product_keyword=$_POST['product_keyword'];
                $product_category=$_POST['product_category'];
                
                $product_file=$_FILES['product_file']['name'];
                $tmp_image=$_FILES['product_file']['tmp_name'];
            
                $product_price=$_POST['product_price'];
            
            
                if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_price==''){
                  echo "<script>alert('Please fill up all forms')</script>";
                }
                else{
                  if($product_file){
                    move_uploaded_file($tmp_image,"./images/$product_file");
                  }
                  else{
                    $product_file=$row['product_file'];
                  }
                  $update="update `products` set product_title='$product_title',product_description='$product_description',product_keyword='$product_keyword',category_id='$product_category',product_file='$product_file',product_price='$product_price' where product_id=$edit_id";
                  $result_update=mysqli_query($conn,$update);
                  if($result_update){
                    echo "<script>alert('Product updated successfully')</script>";
                    echo "<script>window.open('./index.php?view_products','_self')</script>";
                  }
                }
              }
            ?>
        </form>
  </body>
</html>