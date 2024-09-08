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
            width: 10px;
            object-fit: contain;
        }
    </style>
  </head>
  <body>
  <h3 class="text-center text-top">All Categories</h3>
    <button class='btn btn-primary'><a href='index.php?add_categories' class='text-light'>Add New</a></button>
    <table class="table">
        <thead class="thead-dark">
            <tr class="text-center">
                <th>Serial number</th>
                <th>Category title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                    $get_categories="Select * from `categories`";
                    $result=mysqli_query($conn,$get_categories);
                    $number=0;
                    while($row=mysqli_fetch_assoc($result)){
                        $category_id=$row['category_id'];
                        $category_title=$row['category_title'];
                        $number++;
                ?>
                <tr class='text-center'>
                    <td><?php echo $number;?></td>
                    <td><?php echo $category_title;?></td>  
                    <td>
                        <button class='btn btn-danger'><a href='index.php?delete_categories=<?php echo $category_id?>' class='text-light'>Delete</a></button>
                    </td>  
                </tr>            
                <?php
                    }
                ?>
        </tbody>
    </table>

  </body>