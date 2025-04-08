<?php
 include('include/db.php');
 $query="SELECT * FROM payment";
 $res=mysqli_query($con,$query);
 $html_data="<table border='1' cellspacing='0' align='center' height='50px' width='400px' >
 <tr>
    <th>Product Id</th>
    <th>Invoice Number</th>
    <th>Amount</th>
    <th>Payment Mode</th>
    <th>Transition Number</th>
    <th>Payment Date</th>
 </tr>";

 while($data=mysqli_fetch_assoc($res)){
$html_data=$html_data."
 <tr align='center'>
    <td>".$data['p_id']."</td>
    <td>".$data['invoice_id']."</td>
    <td>".$data['amount']."</td>
    <td>".$data['payment_mode']."</td>
    <td>".$data['trans_number']."</td>
    <td>".$data['payment_date']."</td> 
</tr>";

} 
$html_data.="</table>";
header("Content-type:application/xls");
header("Content-Disposition:attachment;filename=payment.xls");
 echo $html_data;
?>

