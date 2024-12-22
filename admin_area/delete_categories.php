<?php
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{?>
<!-- Delete Product Categories Start-->
<?php
  if(isset($_GET['Delete_Categories'])){
    $id=$_GET['Delete_Categories'];
    // echo $id;
   $delete="DELETE FROM categories WHERE cat_id='$id' ";
   $run=mysqli_query($con,$delete);
   if($run){
    echo "<script>alert('Deleted Categories Sucessfully')</script>";
    echo "<script>window.open('index.php?View_Categories','_self')</script>";
   }else{

   }
}
  ?>
 <!-- Delete Product Categories End -->
  <?php } ?>
