<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <center>
          <h1>Do you want to Delete Your Account</h1>
        </center>
        <hr>
        <form action="#" method="post">
            <input type="submit" value="Yes I want To Delete" name='Yes' id='Yes' class="btn btn-success" style="margin-left: 100px;">
            <input type="submit" value="No , I Dont want" name='No' id='no' class="btn btn-danger" style="margin-left: 300px;" formaction="../index.php">
        </form>
    </div>
</body>
</html>
<?php
  $email=$_SESSION['c_email'];
//   echo $email;
  if(isset($_POST['Yes'])){
     $delete_customer="DELETE FROM registration WHERE c_email='$email' ";
     $run_customer=mysqli_query($con,$delete_customer);
     if($run_customer){
        session_destroy();
        echo "<script>alert('Customer Deleted')</script>";
        echo "<script>window.open('../index.php','_self')</script>";    
     }
  }else{
    
  }
?>