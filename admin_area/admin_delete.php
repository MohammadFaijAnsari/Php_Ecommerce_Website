<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
 <?php
  if(isset($_GET['Admin_Delete'])){
    $admin_id=$_GET['Admin_Delete'];
    $delete_admin="DELETE FROM admin_login WHERE admin_id='$admin_id' ";
    $run_admin=mysqli_query($con,$delete_admin);
    if($run_admin){
       echo "<scirpt>alert('Admin Delete Sucessfully')</script>";
       echo "<script>window.open('index.php?View_Admin','_self')</script>";
    }else{
        echo "<scirpt>alert('Admin Delete Unsucessfully')</script>";
    }
  }
 ?>
<?php } ?>