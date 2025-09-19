<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
 if(isset($_GET['Delete_Product'])){
    $product_id=$_GET['Delete_Product'];
    $del_pro="DELETE FROM product WHERE product_id='$product_id' ";
    $run_pro=mysqli_query($con,$del_pro);
     if($run_pro){ 
      echo "<script>alert('Product Deletd Sucessfully')</script>";
      echo "<script>window.open('index.php?View_Product','_self')</script>";
     
   }
 }
?>
<?php }?>
   
</body>
</html>