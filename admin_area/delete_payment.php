<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<?php
 if(isset($_GET['Delete_Payment'])){
    $id=$_GET['Delete_Payment'];
    $delete_payment="DELETE FROM payment WHERE payment_id='$id' ";
    $run_payment=mysqli_query($con,$delete_payment);
    if($run_payment){
      echo "<script>alert('Payment Delete Sucessfully')</script>";
      echo "<script>window.open('index.php?View_Payment','_self')</script>";
    }else{
        echo "<script>alert('Payment Not Delete Unsucessfully')</script>";
    }
 }
?>
<?php 
 }
?>