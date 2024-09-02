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
        <form action="" method="post" enctype="multipart/formdata">
            <div class="mb-3">
              <label for="product_name" class="form-label">Product name</label>
              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
              <label for="product_description" class="form-label">Product description</label>
              <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required>
            </div>
            <div class="mb-3">
              <label for="product_keyword" class="form-label">Product keyword</label>
              <input type="text" class="form-control" id="product_keyword" name="product_keyword" placeholder="Enter product keyword" required>
            </div>
            <div class="mb-3">
              <select class="form-select" name="pprodut_category" id="" aria-label="Default select example" required>
                <option selected>Select Category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="product_file" class="form-label">Product picture</label>
              <input class="form-control" type="file" id="formFile" name="product_file">
            </div>
            <div class="mb-3">
              <label for="product_price" class="form-label">Product price</label>
              <input type="text" class="form-control" id="product_price" name="product_rice" placeholder="Enter product keyword" required>
            </div>
            <div class="mb-3">
              <input type="submit" name="insert_product" class="btn btn-info" value="Add Products">
            </div>
        </form>
  </body>
</html>