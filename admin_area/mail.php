<?php
 include('include/db.php');
 $query="SELECT * FROM mail";
 $res=mysqli_query($con,$query);
 $html_data="<table border='1' cellspacing='0' align='center' height='50px' width='400px' >
 <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Message</th>
 </tr>";

 while($data=mysqli_fetch_assoc($res)){
$html_data=$html_data."
 <tr align='center'>
    <td>".$data['id']."</td>
    <td>".$data['name']."</td>
    <td>".$data['email']."</td>
    <td>".$data['subject']."</td>
    <td>".$data['message']."</td>
 </tr>";

} 
$html_data.="</table>";
header("Content-type:application/xls");
header("Content-Disposition:attachment;filename=mail.xls");
 echo $html_data;
?>

