<?php
 include("include/db.php");
 if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
 } else {
?>
<!-- 1 Row Start -->
<div class="row" style="margin-top: 50px;">
 <div class="col-lg-12">
    <div class="breadcrumb">
       <li class="active">
         <i class="fa fa-dashboard"></i> Dashboard / View Order
       </li>
    </div>
 </div>
</div>
<!-- 1 Row End -->
<!-- Export Button Start-->
<div class="row mb-3">
  <div class="col-md-4 col-sm-6 col-12">
    <form action="mail.php" method="post">
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
            <i class="fa fa-money fw"></i> View Order
         </h3>
      </div>
      <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead align="center">
                 <tr>
                   <th>Id</th>
                   <th>Customer Name</th>
                   <th>Customer Email</th>
                   <th>Customer Subject</th>
                   <th>Customer Message</th>
                   <th>Delete</th>
                 </tr>
              </thead>
              <tbody>
                <?php
                 $i = 0;
                 $get_order = "SELECT * FROM mail";
                 $run_order = mysqli_query($con, $get_order);
                 while($row_order = mysqli_fetch_array($run_order)){
                   $i++;
                   $order_id = $row_order['id'];
                   $name = $row_order['name'];
                   $email = $row_order['email'];
                   $subject = $row_order['subject'];
                   $message = $row_order['message'];
                ?>
                <tr align="center">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $subject; ?></td>
                  <td><?php echo $message; ?></td>
                  <td>
                    <a href="index.php?Deleted_Client=<?php echo $i; ?>">
                        <i class="fa fa-trash-o fa-2x"></i>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
         </div>
      </div>
    </div>
  </div>
</div>
<!-- 2 Row End -->

<?php } ?>
