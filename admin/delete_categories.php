<?php
    include('../includes/connection.php');
    if(isset($_GET['delete_categories'])){
        $delete_id=$_GET['delete_categories'];

        $delete="Delete from `categories` where category_id=$delete_id";
        $result=mysqli_query($conn,$delete);
        if($result){
            echo "<script>alert('Category deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        } 
    }
?>