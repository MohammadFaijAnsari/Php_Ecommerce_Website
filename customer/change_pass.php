
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
            <h3>Change Password</h3>
        </center>
      <form action="#" method="post">
        <div class="form-group">
          <label for="">Enter the New Password</label>
          <input type="password" name="new_password" id="new_password" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Enter the Confrim Password</label>
          <input type="password" name="c_new_password" id="c_new_password" class="form-control">
        </div> 
        <div class="text-center ">
           <button class="btn btn-primary" id='change_pass' name='change_pass'>
            Update Button
           </button>
        </div>
      </form>
    </div>
</body>
</html>
<?php
 if(isset($_POST['change_pass'])){
    $email=$_SESSION['c_email'];
    $new_password=$_POST['new_password'];
    $c_new_password=$_POST['c_new_password'];
    
    if($new_password==$c_new_password){
       $update_password="UPDATE registration SET c_pass='$new_password',c_pass='$c_new_password' WHERE  c_email='$email' ";
       $run_password=mysqli_query($con,$update_password);
    }else{
       echo "<script>alert('Password And Confirm Password Are Not Same')</script>";
    }
    if($run_password){
      echo "<script>alert('Password Has Been Updated')</script>";
      echo "<script>alert('window.open('my_account.php','_self')')</script>";
      
    }
 }
?>