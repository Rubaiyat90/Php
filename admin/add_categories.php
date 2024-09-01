<?php
    include('../includes/connection.php');
    if(isset($_POST['insert_category'])){
        $category_title=$_POST['category_title'];
        $select_query="Select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($conn,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('This category is already existed')</script>";
        }
        else {
            $insert_query="insert into `categories` (category_title) values ('$category_title')";
            $result=mysqli_query($conn,$insert_query);
            if($result){
                echo "<script>alert('Category inserted successfully')</script>";
            }
	    }
    }
?>

<form action="" method="post" class="mb-2" >
    <div class="container-fluid text-center">
        <h3>Add Category</h3><br><br>
    </div>
    <div class="input-group w-90 mb-3 p-1">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="category_title" placeholder="Insert Category" aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_category"value="Insert Catgeory"> 
    </div> 
</form>