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
         <i class="fa fa-dashboard"></i>Dashboard / View Customer
       </li>
    </div>
 </div>
</div>
<!-- 1 Row End -->
<!-- Export Button Start-->
<div class="row mb-3">
  <div class="col-md-4 col-sm-6 col-12">
    <form action="registration.php" method="post">
      <button type="submit" class="btn btn-success w-100 text-start">
        Export in Excel 
      </button>
    </form>
  </div>
</div>
 <br>
 <!-- Export Button End -->
  <!-- 2 Row Start -->
  <div class="row">
     <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
             <h3 class="panel-title">
                <i class="fa fa-money fw"></i> View Customer
             </h3>
          </div>
          <div class="panel-body">
             <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                  <thead align="center">
                     <th>Customer No</th>
                     <th>Customer Name</th>
                     <th>Customer Email</th>
                     <th>Customer Password</th>
                     <th>Customer Image</th>
                     <th>Customer Delete</th>
                  </thead>
                  <tbody>
                    <?php
                     $select_customer="SELECT * FROM registration";
                     $run_customer=mysqli_query($con,$select_customer);
                     while($row_customer=mysqli_fetch_array($run_customer)){
                        $c_id=$row_customer['c_id'];
                        $c_name=$row_customer['c_name'];
                        $c_email=$row_customer['c_email'];
                        $c_pass=$row_customer['c_pass'];
                        $c_image=$row_customer['c_image'];
                        
                    ?>
                  </tbody>
                  <tr align="center">
                    <td><?php echo $c_id;?></td>
                    <td><?php echo $c_name;?></td>
                    <td><?php echo $c_email;?></td>
                    <td><?php echo $c_pass;?></td>
                    <td>
                           <img src="../customer/customer_image/<?php echo $c_image?>" height='30px' width="50px" alt="Image Not Found" srcset="">
                    </td>
                    <td>
                        <a href="index.php?Deleted_Customer=<?php echo $c_id?>">
                            <i class="fa fa-trash-o fa-2x"></i>
                        </a>
                    </td>
                  </tr>
                  <?php } ?>
                </table>
                
             </div>
          </div>
        </div>
     </div>
  </div>
<!-- 2 Row End -->
<?php } ?>