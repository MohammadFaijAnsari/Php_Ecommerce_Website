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
    <form action="customers_order.php" method="post">
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
                     <th>Order No</th>
                     <th>Customer Email</th>
                     <th>Invoice No</th>
                     <th>Product Title</th>
                     <th>Product Qty</th>
                     <th>Product Size</th>
                     <th>Order Date</th>
                     <th>Total Amount</th>
                     <th>Order Status</th>
                     <th>Delete Order</th>
                  </thead>
                  <tbody>
                    <?php
                     $i=0;
                     $get_order="SELECT * FROM customers_order";
                     $run_order=mysqli_query($con,$get_order);
                     while($row_order=mysqli_fetch_array($run_order)){
                        // Ftech all data in Customers_order table
                       $order_id=$row_order['order_id'];
                       $invoice_number=$row_order['invoice_number'];
                       $qty=$row_order['qty'];
                       $size=$row_order['size'];
                       $order_date=$row_order['order_date'];
                       $total_amount=$row_order['due_amount'];
                       $order_status=$row_order['order_status'];
                       $uppercase=strtoupper($order_status);
                       $custmoer_id=$row_order['customer_id'];
                       $product_id=$row_order['product_id'];
                    //    Fetch data in registration table
                       $get_user="SELECT * FROM registration WHERE c_id='$custmoer_id' ";
                       $run_user=mysqli_query($con,$get_user);
                       while($row_user=mysqli_fetch_array($run_user)){
                          $email=$row_user['c_email'];
                       }
                       //    Fetch data in Product table
                       $get_data="SELECT * FROM product WHERE product_id='$product_id' ";
                       $run_data=mysqli_query($con,$get_data);
                       while($row_data=mysqli_fetch_array($run_data)){
                          $product_title=$row_data['product_title'];
                       }
                       $i++;
                    
                        
                    ?>
                  </tbody>
                  <tr align="center">
                      <td><?php echo $i;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $invoice_number;?></td>
                      <td><?php echo $product_title;?></td>
                      <td><?php echo $qty;?></td>
                      <td><?php echo $size;?></td>
                      <td><?php echo $order_date;?></td>
                      <td>₹ <?php echo $total_amount;?></td>
                      <td><?php echo $uppercase;?></td>
                      <td>
                        <a href="index.php?Deleted_Order=<?php echo $order_id?>">
                            <i class="fa fa-trash-o fa-2x"></i>
                        </a>
                      </td>
                  </tr>
                    <?php  } ?>
                </table>
                
             </div>
          </div>
        </div>
     </div>
  </div>
<!-- 2 Row End -->
<?php } ?>