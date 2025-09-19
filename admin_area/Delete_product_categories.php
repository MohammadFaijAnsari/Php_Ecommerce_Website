<?php
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{?>
<!-- Delete Product Categories Start-->
<?php
  if(isset($_GET['Delete_Product_Categories'])){
    $id=$_GET['Delete_Product_Categories'];
    // echo $id;
   $delete="DELETE FROM product_categories WHERE p_cat_Id='$id' ";
   $run=mysqli_query($con,$delete);
   if($run){
    echo "<script>alert('Deleted Product Categories Sucessfully')</script>";
    echo "<script>window.open('index.php?View_Product_Categories','_self')</script>";
   }else{

   }
}
  ?>
 <!-- Delete Product Categories End -->
  <?php } ?>
