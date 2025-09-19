<?php
//  include("include/db.php");
//  if(!isset($_SESSION['admin_email'])){
//     echo "<script>window.open('login.php','_self')</script>";
?>
<?php
 if(isset($_GET['Delete_Slider'])){
    $id=$_GET['Delete_Slider'];
    $delete_slider="DELETE  FROM slider WHERE id='$id'";
    $run_slider=mysqli_query($con,$delete_slider);
    if($run_slider){
        echo "<script>alert('One Slider Deleted Sucessfully')</script>";    
    }else{
        echo "<script>alert('One Slider Deleted Unsucessfully')</script>";
    }
 }
?>
