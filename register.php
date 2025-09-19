<!-- <?php
include ("config.php");
if(isset($_POST['set'])){
   $name = mysqli_real_escape_string($conn,$_POST['n']);
   $email = mysqli_real_escape_string($conn,$_POST['e']);
   $pass = mysqli_real_escape_string($conn,md5($_POST['p']));
   $cpass = mysqli_real_escape_string($conn,md5($_POST['cp']));
   $sql1 = "SELECT * FROM user_form WHERE email = '{$email}'";
   $result1 = mysqli_query($conn,$sql1) or die("query failed");
   if(mysqli_num_rows($result1)>0){
     $message = "email already exist!!";
   }else{
     $sql2 = "INSERT INTO user_form(name,email,password) VALUES('{$name}','{$email}','{$pass}')";
     $result2 = mysqli_query($conn,$sql2) or die("query failed");
     header("location: http://localhost/php_cart_project/login.php");
   }
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--bootstrap link-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- css file -->
    <link rel="stylesheet" href="style.css"/>
    <!-- jquery -->
    <script src="jquery-3.7.1.js"></script>

    </head>
<body link="red" alink="green" vlink="purple">

   
<?php
  if(isset($message)){
     echo"<div id='alert_msg'>$message</div>";
  }
?>
    <div class="container">
    <form class="col-md-6 mt-4"  style="border:2px solid;" method="post" >

        <h2>REGISTER NOW</h2>
        <div class="form-group">
            <input type="text" id="n" name="n" class="form-control" placeholder="Enter Username" required autocomplete="off"/>
        </div>
        <div class="form-group">
            <input type="email" id="e" name="e" class="form-control" placeholder="Enter email" required autocomplete/>
        </div>
        <div class="form-group">
            <input type="password" id="p" name="p" class="form-control" placeholder="Enter Password" requirr autocomplete/>
        </div>
        <div class="form-group">
            <input type="password" id="cp" name="cp" class="form-control" onkeyup="checkpwd();" placeholder="Confirm Password" required autocomplete/>
        </div>
        <div id="pass_status"></div>
        <center><input type="submit" class="btn btn-success mb-3" name="set" id="set" value="Register Now" onclick = "head();"/></center>
        <p>already have an account?<a href="login.php">login_now</a></p>
    </form>
    </div>
    <script>
    // $(document).ready(function(e){
    //     $("#set").on("click",function(){
    //         e.preventDefault();
            
    //           var pwd = $("#p").val();
    //           var pwdc = $("#cp").val();
    //           console.log(pwd);
    //           console.log(pwdc);
    //           if(pwd != pwdc){
    //             console.log("not");
    //             $(".pass_status").html("password not match");
    //           }else{
    //             console.log("yes");
    //           }
    //         });
    //     });
    // $(document).ready(function(){
    //     $("#set").click(function(){
    //         $("#alert_msg").show();
    //     });
    // });
    function head(){
        var h = document.getElementById('alert_msg');
        h.style("display:block");
    }
    function checkpwd(){
        var pwd = document.getElementById('p').value;
        var pwdc = document.getElementById('cp').value;
        console.log(pwd);
        console.log(pwdc);
        if(pwd != pwdc){
            console.log("not match");
            document.getElementById('pass_status').style="color:red";
            document.getElementById('pass_status').innerHTML = "Password does not match.";
        }else{
        document.getElementById('pass_status').innerHTML = " ";
        console.log("matched");
        }
    }
    </script>    
</body>
</html>