<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<!-- 1 Row Start -->
<div class="row" style="margin-top: 50px;">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li class="active">
         <i class="fa fa-dashboard"></i> Dashboard / Insert User
      </li>
    </ol>
  </div>
</div>
<!-- 1 Row End -->
<!-- 2 Row Start -->
  <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">
                <i class="fa fa-money"></i>  Insert User
             </h3>
           </div>

           <div class="panel-body">
              <form action="" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                    <label for="" class="col-md-3 control-panel">User Name</label>
                    <div class="col-md-6">
                       <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                 </div>
                 <br><br><br>
                 <div class="form-group">
                    <label for="" class="col-md-3 control-panel">User Email</label>
                    <div class="col-md-6">
                       <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                 </div>
                 <br><br><br>
                 <div class="form-group">
                    <label for="" class="col-md-3 control-panel">User Password</label>
                    <div class="col-md-6">
                       <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                 </div>
                <br><br><br>
                 <div class="form-group ">
                    <label for="" class="col-md-3 control-panel">User Image</label>
                    <div class="col-md-6">
                       <input type="file" name="image" id="image" class="form-control">
                    </div>
                 </div>
                 <br><br><br>
                 <div class="col-md-3" >
                     <input type="submit" value="Submit" id='submit' name='submit' class="btn btn-success form-control">
                  </div>
                  <div class="col-md-3">
                    <input type="reset" value="Cancel" class="btn btn-danger form-control">
                  </div>
              </form>
              <?php
               if(isset($_POST['submit'])){
                 $u_name=$_POST['name'];
                 $u_email=$_POST['email'];
                 $u_pass=$_POST['password'];
                 $u_image=$_FILES['image']['name'];
                 $u_tmp=$_FILES['image']['tmp_name'];

                 move_uploaded_file($u_tmp,"admin_image/$u_image");

                 $insert_user="INSERT INTO admin_login(admin_name,admin_email,admin_pass,admin_image) VALUES ('$u_name','$u_email','$u_pass','$u_image')";
                 $run_user=mysqli_query($con,$insert_user);
                 if($run_user){
                    echo "<script>alert('Insert User Sucessfully')</script>";
                    echo "<script>window.open('index.php?View_Admin','_self')</script>";
                 }else{
                    echo "<script>alert('Insert User Unsucessfully')</script>";
                 }
               }
              ?>
           </div>
        </div>
     </div>
  </div>
<!-- 2 Row End -->
<?php } ?>