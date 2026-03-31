<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<?php
 if(isset($_GET['Deleted_Customer'])){
    $c_id=$_GET['Deleted_Customer'];
    $get_customer="DELETE FROM registration WHERE c_id='$c_id' ";
    $run_customer=mysqli_query($con,$get_customer);
    if($run_customer){
        echo "<script>alert('Customer Has Been Deleted Sucessfully')</script>";
        echo "<script>window.open('index.php?View_Customer','_self')</script>";
    }  else{
        echo "<script>alert('Customer Has Been Not Deleted Sucessfully')</script>";
    }
 }
?>
<?php
}


