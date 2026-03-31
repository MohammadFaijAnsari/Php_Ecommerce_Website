<?php
 include('include/db.php');
 $query="SELECT * FROM customers_order";
 $res=mysqli_query($con,$query);
 $html_data="<table border='1' cellspacing='0' align='center' height='50px' width='400px' >
 <tr>
    <th>Order Id</th>
    <th>Customer Id</th>
    <th>Product Id</th>
    <th>Invoice Number</th>
    <th>Product Quantity</th>
    <th>Product Size</th>
    <th>Order Date</th>
    <th>Due Amount</th>
    <th>Order Status</th>
 </tr>";

 while($data=mysqli_fetch_assoc($res)){
$html_data=$html_data."
 <tr align='center'>
    <td>".$data['order_id']."</td>
    <td>".$data['customer_id']."</td>
    <td>".$data['product_id']."</td>
    <td>".$data['invoice_number']."</td>
    <td>".$data['qty']."</td>
    <td>".$data['size']."</td>
    <td>".$data['order_date']."</td> 
    <td>".$data['due_amount']."</td>
    <td>".$data['order_status']."</td>
</tr>";

} 
$html_data.="</table>";
header("Content-type:application/xls");
header("Content-Disposition:attachment;filename=customers_order.xls");
 echo $html_data;
?>

