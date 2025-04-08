<?php
 include('include/db.php');
 $query="SELECT * FROM registration";
 $res=mysqli_query($con,$query);
 $html_data="<table border='1' cellspacing='0' align='center' height='50px' width='400px' >
 <tr>
    <th>Customer Id</th>
    <th>Customer Name</th>
    <th>Customer Email</th>
    <th>Customer Password</th>
    <th>Customer Image</th>
    <th>Customer Ip</th>
 </tr>";

 while($data=mysqli_fetch_assoc($res)){
$html_data=$html_data."
 <tr align='center'>
    <td>".$data['c_id']."</td>
    <td>".$data['c_name']."</td>
    <td>".$data['c_email']."</td>
    <td>".$data['c_pass']."</td>
    <td>".$data['c_image']."</td>
    <td>".$data['c_ip']."</td> 
</tr>";

} 
$html_data.="</table>";
header("Content-type:application/xls");
header("Content-Disposition:attachment;filename=registration.xls");
 echo $html_data;
?>

