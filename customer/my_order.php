
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <div class="box">
     <h1>My Order</h1>
     <p>If you have question.please fill to
        <a href="../contactus.php" id='hide' name='hide'>Contact Us Page</a> 
        us service center is working for 24/7</p>
    </div>
    <hr>
    <div class="table-responsive text-center">
       <table class="table table-bordered table-hover">
        <thead >
            <tr >
                <th class="text-center">Sr.No</th>
                <th class="text-center">Due Amount</th>
                <th class="text-center">Invoie Number</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Size</th>
                <th class="text-center">Order</th>
                <th class="text-center">Paid/Unpaid</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $customer_email=$_SESSION['c_email'];
             $select_cus="SELECT * FROM registration WHERE c_email='$customer_email'";
             $run_cus=mysqli_query($db,$select_cus);
             $row_order=mysqli_fetch_array($run_cus);
             $customer_id=$row_order['c_id'];
            //  echo $customer_id;
             $get_order="SELECT * FROM customers_order WHERE customer_id='$customer_id' ";
             $run_order=mysqli_query($db,$get_order);
            //  print_r($row_order);
             if($run_order){
                $i=0;
             while($row_order=mysqli_fetch_array($run_order)){
               $order_id=$row_order['order_id'];
               $order_due_amount=$row_order['due_amount'];
               $order_invoice_numbwe=$row_order['invoice_number'];
               $order_qty=$row_order['qty'];
               $order_size=$row_order['size'];
               $order_date=substr($row_order['order_date'],0,11);
               $order_status=$row_order['order_status'];
               $i++;
               if($order_status=="pending"){
                 $order_status="UnPaid";
               }else{
                 $order_status="Paid";
               }
            
            
            ?>
            <tr>
                <td><?php echo $i?></td>
                <td>₹ <?php echo $order_due_amount;?></td>
                <td><?php echo $order_invoice_numbwe?></td>
                <td><?php echo $order_qty?></td>
                <td><?php echo $order_size?></td>
                <td><?php echo $order_date?></td>
                <td><?php echo $order_status?></td>
                <td><a href="confrim.php?order_id=<?php echo $order_id ?>" target="_self" class="btn btn-success btn-sm">Confrim Paid</a></td>
            </tr>
            <?php 
                 }
              }
            ?>
        </tbody>
       </table>
    </div>
</center>
</body>
</html>