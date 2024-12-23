<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<?php
error_reporting(false);
 if(isset($_GET['Deleted_Order'])){
    $id=$_GET['Deleted_Order'];
    $get_data="DELETE FROM customers_order WHERE order_id='$id' ";
    $run_data=mysqli_query($con,$get_data);
    if($run_data){
        echo "<script>alert('Delete Customer Order Sucessfully')</script>";
        echo "<script>window.open('index.php?View_Order','_self')</script>";
    }else{
        echo "<script>alert('Delete Customer Order Unsucessfully')</script>";
    }
 }
?>
<?php } ?>