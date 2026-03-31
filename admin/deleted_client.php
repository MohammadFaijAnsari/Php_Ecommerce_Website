<?php
//  include("include/db.php");
//  if(!isset($_SESSION['admin_email'])){
//     echo "<script>window.open('login.php','_self')</script>";
?>
<?php
 if(isset($_GET['Deleted_Client'])){
    $id=$_GET['Deleted_Client'];
    $delete_slider="DELETE  FROM mail WHERE id='$id'";
    $run_slider=mysqli_query($con,$delete_slider);
    if($run_slider){
        // header("Location:../index.php");
        echo "<script>alert('One Mail Deleted Sucessfully')</script>";   
         
    }else{
        echo "<script>alert('One Slider Deleted Unsucessfully')</script>";
    }
 }
?>
