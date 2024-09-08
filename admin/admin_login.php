<?php

    session_start();
    include('../includes/connection.php');

    if(isset($_POST['admin_login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $select_query="Select * from `admin` where username='$username'";
        $result_select=mysqli_query($conn,$select_query);
        $row_count=mysqli_num_rows($result_select);
        $row_data=mysqli_fetch_assoc($result_select);

        if($row_count>0){
            if($password==$row_data['password']){
                $_SESSION['username']=$username;
                echo "<script>alert('Login successful');</script>";
                header('Location: index.php?view_products');
                exit();
            }
            else{
                echo "<script>alert('Incorrect password');</script>";
            }
        }
        else{
            echo "<script>alert('Wrong username or password');</script>";
        }
    }    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6 text-bg-primary">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="col-10 col-xl-8 py-3">
                                <img class="img-fluid rounded mb-4" loading="lazy" src="../images/regi.jpg" width="300" height="300" alt="Registration logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h2 class="h3">Login</h2>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="post">
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="admin_login" class="btn btn-info" value="Login">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <p class="m-0 text-secondary text-center">Don't have an account? <a href="./admin_registration.php" class="link-primary text-decoration-none">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>