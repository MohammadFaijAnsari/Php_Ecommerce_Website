<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
</head>
<body>
    <div class='box'>
      <div class='box-header'>
        <center>
            <h2>Login</h2>
            <p class='lead'>Already Our Customer </p>
        </center>

      </div>
      <form action="./checkout.php" method="POST">
         <div class='form-group'>
            <label for="">Email</label>
            <input type="text" name="c_email" id="c_email" class='form-control' required>
         </div>
         <div class='form-group'>
            <label for="">Password</label>
            <input type="password" name="c_password" id="c_password" class='form-control' required>
         </div>
         <div class="text-center">
            <button name='login' id='login' value="Login" class='btn btn-primary'>
              <i class='fa fa-sign-in'></i> Login in
            </button>
         </div>
      </form>
      <center>
        <a href="./customer_registration.php" id='link' name='link'>
            <h3>New ? Registator Now</h3>
        </a>
      </center>
    </div>
</body>
</html>
<?php
  if(isset($_POST['login'])){
    $email=$_POST['c_email'];
    $password=$_POST['c_password'];
    $get_ip=getUserIp();
    $select_cus="SELECT * FROM registration WHERE c_email='$email' AND c_pass='$password'  ";
    $run_cus=mysqli_query($con,$select_cus);
    $check_cus=mysqli_num_rows($run_cus);

    $select_cart="SELECT * FROM cart WHERE ip_add='$get_ip' ";
    $run_cart=mysqli_query($con,$select_cart);
    $check_cart=mysqli_num_rows($run_cart);

    if($check_cus==0){
      echo "<script>alert('Email or Password is Incorrect')</script>";
      exit();
    }
    if($check_cus==1 && $check_cart==0){
      $_SESSION['c_email']=$email;
      echo "<script>alert('Login Sucessfully');</script>";
      echo "<script>window.open('usermail.php','_self')</script>";
      // echo "<script>window.open('customer/my_account.php','_self');</script>";
    }else{
      $_SESSION['c_email']=$email;
      echo "<script>alert('Login Sucessfully');</script>";
      echo "<script>window.open('checkout.php');</script>";
      header('Location:test.php');
    }
  }
?>