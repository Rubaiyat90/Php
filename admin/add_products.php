<?php
  include('../includes/connection.php');
  if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    
    $product_file=$_FILES['product_file']['name'];
    $tmp_image=$_FILES['product_file']['tmp_name'];

    $product_price=$_POST['product_price'];


    if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_price=='' or $product_file=='' ){
      echo "<script>alert('Please fill up all forms')</script>";
      exit();
    }
    else{
      move_uploaded_file($tmp_image,"./images/$product_file");
      $insert="insert into `products` (product_title,product_description,product_keyword,category_id,product_file,product_price) values ('$product_title','$product_description','$product_keyword','$product_category','$product_file','$product_price')";
      $result_insert=mysqli_query($conn,$insert);
      if($result_insert){
        echo "<script>alert('Product inserted successfully')</script>";
      }
    }
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
      <h3 class="text-center text-top">Add Products</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_title" class="form-label">Product title</label>
              <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Enter product title" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_description" class="form-label">Product description</label>
              <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_keyword" class="form-label">Product keyword</label>
              <input type="text" class="form-control" id="product_keyword" name="product_keyword" placeholder="Enter product keyword" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <select class="form-select" name="product_category" id="" aria-label="Default select example" required="required">
                <option selected>Select Category</option>
                <?php
                  $sql_query="Select * from `categories`";
                  $result=mysqli_query($conn,$sql_query);
                  while($row=mysqli_fetch_assoc($result)){
                    $category_id=$row['category_id'];
                    $category_title=$row['category_title'];
                    echo "<option value='$category_id'>$category_title</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_file" class="form-label">Product picture</label>
              <input class="form-control" type="file" id="product_file" name="product_file" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_price" class="form-label">Product price</label>
              <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter product price" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
              <input type="submit" name="insert_product" class="btn btn-info" value="Add Products">
            </div>
        </form>
  </body>
</html>