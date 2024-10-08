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
            width: 40px;
            object-fit: contain;
        }
    </style>
  </head>
  <body>
  <h3 class="text-center text-top">All Products</h3>
    <?php
        if(isset($_SESSION['username'])){
            echo "<button class='btn btn-primary'><a href='index.php?add_products' class='text-light'>Add New</a></button>";       
            }
        ?> 
    
    <table class="table">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Serial number</th>
                <th>Product title</th>
                <th>Product description</th>
                <th>Product keyword</th>
                <th>Product category</th>
                <th>Product image</th>
                <th>Product price</th>
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<th>Action</th>";   
                    }
                ?> 
            </tr>
        </thead>
        <tbody>
                <?php 
                    $get_products="SELECT p.*, c.category_title FROM `products` p JOIN `categories` c ON p.category_id = c.category_id";
                    $result=mysqli_query($conn,$get_products);
                    $number=0;
                    while($row=mysqli_fetch_assoc($result)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keyword=$row['product_keyword'];
                        $category_title=$row['category_title'];
                        $product_file=$row['product_file'];
                        $product_price=$row['product_price'];
                        $number++;
                ?>
                <tr class='text-center'>
                    <td><?php echo $number;?></td>
                    <td><?php echo $product_title;?></td>
                    <td><?php echo $product_description;?></td>
                    <td><?php echo $product_keyword;?></td>
                    <td><?php echo $category_title;?></td>
                    <td><img src='./images/<?php echo $product_file;?>' class='product_file_size'/></td>
                    <td><?php echo $product_price;?>/-</td>
                    <?php
                        if(isset($_SESSION['username'])){
                            echo "  <td>
                                        <button class='btn btn-success'><a href='index.php?edit_products=".$product_id."'class='text-light'>Edit</a></button>
                                        <button class='btn btn-danger'><a href='index.php?delete_products=".$product_id."' class='text-light'>Delete</a></button>
                                    </td> ";   
                        }
                    ?>   
                </tr>            
                <?php
                    }
                ?>
        </tbody>
    </table>

  </body>