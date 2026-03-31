<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 }else{
?>
<!-- 1 Row Start -->
<div class="row" style="margin-top: 50px;">
 <div class="col-lg-12">
    <div class="breadcrumb">
       <li class="active">
         <i class="fa fa-dashboard"></i>Dashboard / View Admin
       </li>
    </div>
 </div>
</div>
<!-- 1 Row End -->
<!-- 2 Row Start -->
  <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
             <h3 class="panel-title">
                <i class="fa fa-money fw"></i> View Admin
             </h3>
          </div>
          <div class="panel-body">
             <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead align="center">
                     <th>Admin No</th>
                     <th>Admin Name</th>
                     <th>Admin Email</th>
                     <th>Admin Password</th>
                     <th>Admin Image</th>
                     <th>Admin Delete</th>
                  </thead>
                  <tbody>
                    <?php
                     $i=0;
                      $select_admin="SELECT * FROM admin_login";
                      $run_admin=mysqli_query($con,$select_admin);
                      while($row_admin=mysqli_fetch_array($run_admin)){
                        $admin_id=$row_admin['admin_id'];
                        $admin_name=$row_admin['admin_name'];
                        $admin_email=$row_admin['admin_email'];
                        $admin_pass=$row_admin['admin_pass'];
                        $admin_image=$row_admin['admin_image'];
                        $i++;
                    ?>
                  </tbody>
                  <tr align="center">
                    <td><?php echo $i;?></td>
                    <td><?php echo $admin_name;?></td>
                    <td><?php echo $admin_email?></td>
                    <td><?php echo $admin_pass?></td>
                    <td>
                           <img src="admin_image/<?php echo $admin_image?>" height='30px' width="50px" alt="Image Not Found" srcset="">
                    </td>
                    <td>
                        <a href="index.php?Admin_Delete=<?php echo $admin_id?>">
                            <i class="fa fa-trash-o fa-2x"></i>
                        </a>
                    </td>
                  </tr>
                  <?php
                   } 
                  ?>
                </table>
                
             </div>
          </div>
        </div>
     </div>
  </div>
<!-- 2 Row End -->
<?php } ?>