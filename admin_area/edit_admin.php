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
         <i class="fa fa-dashboard"></i> Dashboard / Edit Admin
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
                <i class="fa fa-money"></i>  Edit Admin
             </h3>
           </div>

           <div class="panel-body">
            <?php
              if(isset($_GET['Edit_Admin'])){
                $update_id=$_GET['Edit_Admin'];
                $get_admin="SELECT * FROM admin_login WHERE admin_id='$update_id' ";
                $run_admin=mysqli_query($con,$get_admin);
                while($row_admin=mysqli_fetch_array($run_admin)){
                    $admin_name=$row_admin['admin_name'];
                    $admin_email=$row_admin['admin_email'];
                    $admin_password=$row_admin['admin_pass'];
                    $admin_image=$row_admin['admin_image'];
                       
                  
              }
            ?>
              <form action="" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                    <label for="" class="col-md-3 control-panel">User Name</label>
                    <div class="col-md-6">
                       <input type="text" name="name" id="name" value="<?php echo $admin_name;?>" class="form-control" required>
                    </div>
                 </div>
                 <br><br><br>
                 <div class="form-group">
                    <label for="" class="col-md-3 control-panel">User Email</label>
                    <div class="col-md-6">
                       <input type="email" name="email" id="email" value="<?php echo $admin_email;?>" class="form-control" required>
                    </div>
                 </div>
                 <br><br><br>
                 <div class="form-group">
                    <label for="" class="col-md-3 control-panel">User Password</label>
                    <div class="col-md-6">
                       <input type="password" name="password" id="password" value="<?php echo $admin_password;?>" class="form-control" required>
                    </div>
                 </div>
                <br><br><br>
                 <div class="form-group ">
                    <label for="" class="col-md-3 control-panel">User Image</label>
                    <div class="col-md-6">
                       <input type="file" name="image" id="image" class="form-control">
                       <img src="admin_image/<?php echo $admin_image?>" height='50px' width='50px' alt="" srcset="">
                    </div>
                 </div>
                 <br><br><br><br>

                 <div class="col-md-3" >
                     <input type="submit" value="Submit" id='update' name='update' class="btn btn-success form-control">
                  </div>
                  <div class="col-md-3">
                    <input type="reset" value="Cancel" class="btn btn-danger form-control">
                  </div>
              </form>
              <?php } ?>
              <?php
               if(isset($_POST['update'])){
                 $n_name=$_POST['name'];
                 $n_email=$_POST['email'];
                 $n_password=$_POST['password'];
                 if ($_FILES['image']['name']) {
                    $n_image = $_FILES['image']['name'];
                    $n_image_tmp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($n_image_tmp, "admin_image/$n_image");
                } else {
                    $n_image = $admin_image;
                }
                
                 $update_admin="UPDATE admin_login SET admin_name='$n_name',admin_email='$n_email',admin_pass='$n_password',admin_image='$n_image' WHERE admin_id='$update_id' ";
                 $run_admin=mysqli_query($con,$update_admin);
                 if ($row_admin) {
                    echo "<script>alert('Admin Details Updated Successfully')</script>";
                    echo "<script>window.open('index.php?View_Admin','_self')</script>";
                } else {
                    echo "<script>alert('Admin Update Unsuccessful')</script>";
                }                
               }
              ?>
              <?php
               
              ?>
           </div>
        </div>
     </div>
  </div>
<!-- 2 Row End -->
<?php } ?>