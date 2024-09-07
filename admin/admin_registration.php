<?php
    include('../includes/connection.php');
    if(isset($_POST['admin_regi'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        
        if($password!=$confirm_password){
            echo "<script>alert('Passwords do not match');</script>";
        }
        else{
            $select_query="Select * from `admin` where username='$username' or email='$email'";
            $result_select=mysqli_query($conn,$select_query);
            $number=mysqli_num_rows($result_select);
            if($number>0){
                echo "<script>alert('This username or email is already existed')</script>";
            }
            else {
                $insert="insert into `admin` (username,email,password) values ('$username','$email','$password')";
                $result_insert=mysqli_query($conn,$insert);
                if($result_insert){
                    echo "<script>alert('Successfully Registered');</script>";
                }
            } 
        }
    }     
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
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
                                        <h2 class="h3">Registration</h2>
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
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter valid email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter password again" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" name="admin_regi" class="btn btn-info" value="Register">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <p class="m-0 text-secondary text-center">Already have an account?<a href="./admin_login.php" class="link-primary text-decoration-none">Login</a></p>
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