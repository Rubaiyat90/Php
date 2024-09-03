<?php 
   include('../includes/connection.php');             
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <style>
        .product_file_size{
            width: 10%;
            object-fit: contain;
        }
    </style>
  </head>
  <body>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Serial number</th>
                <th>Product title</th>
                <th>Product description</th>
                <th>Product keyword</th>
                <th>Product category</th>
                <th>Product image</th>
                <th>Product price</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                    $get_products="Select * from `products`";
                    $result=mysqli_query($conn,$get_products);
                    $number=0;
                    while($row=mysqli_fetch_assoc($result)){
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keyword=$row['product_keyword'];
                        $category_id=$row['category_id'];
                        $product_file=$row['product_file'];
                        $product_price=$row['product_price'];
                        $number++;
                        echo " 
                            <tr class='text-center'>
                                <td>$number</td>
                                <td>$product_title</td>
                                <td>$product_description</td>
                                <td>$product_keyword</td>
                                <td>$category_id</td>
                                <td><img src='./images/$product_file' class='product_file_size'/></td>
                                <td>$product_price /-</td>   
                            </tr>";
                    }
                ?>
        </tbody>
    </table>

  </body>