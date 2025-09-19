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
         <i class="fa fa-dashboard"></i>Dashboard / View Order
       </li>
    </div>
 </div>
</div>
<!-- 1 Row End -->
 <!-- Export Button Start-->
<div class="row mb-3">
  <div class="col-md-4 col-sm-6 col-12">
    <form action="payment.php" method="post">
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
                     <th>Payment No</th>
                     <th>Invoice No</th>
                     <th>Amount Paid</th>
                     <th>Payment Method</th>
                     <th>Reference No</th>
                     <th>Payment Date</th>
                     <th>Delete Payemt</th>
                     
                  </thead>
                  <tbody>
                    <?php
                      $i=0;
                      $get_payment="SELECT * FROM payment";
                      $run_payment=mysqli_query($con,$get_payment);
                      while($row_payment=mysqli_fetch_array($run_payment)){
                         $p_id=$row_payment['payment_id'];
                         $invoice_id=$row_payment['invoice_id'];
                         $amount=$row_payment['amount'];
                         $payment_mode=$row_payment['payment_mode'];
                         $trans_number=$row_payment['trans_number'];
                         $payment_date=$row_payment['payment_date'];
                      $i++;
                    ?>
                  </tbody>
                    <tr align="center">
                        <td><?php echo $i;?></td>
                        <td><?php echo $invoice_id;?></td>
                        <td><?php echo $amount;?></td>
                        <td><?php echo $payment_mode;?></td>
                        <td><?php echo $trans_number;?></td>
                        <td><?php echo $payment_date;?></td>
                        <td>
                            <a href="index.php?Delete_Payment=<?php echo $p_id?>">
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
