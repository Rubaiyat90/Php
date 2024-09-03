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
  </head>
  <body>
    <div class="container-fuild">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="../images/online.jpg" class=logo>
                <nav class="navbar navbar-expand-lg bg-info">
                    <div class="container-fluid">
                        <a href="" class="nav-link">Welcome Admin</a>
                    </div>
                </nav>
            </div>
        </nav>
    </div>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin Dashboard
                    </a>
                </li>
                <li>
                    <a href="index.php?view_products">Home</a>
                </li>
                <li>
                    <a href="index.php?add_products">Add products</a>
                </li>
                <li>
                    <a href="index.php?add_categories">Add categories</a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid m-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            if(isset($_GET['view_products'])){
                                include('view_products.php');
                            }
                            if(isset($_GET['add_products'])){
                                include('add_products.php');
                            }

                            if(isset($_GET['add_categories'])){
                                include('add_categories.php');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>