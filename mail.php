<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include('include/db.php');
//Load Composer's autoloader (created by composer, not included with PHPMailer)
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $user_email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $query="INSERT INTO mail(name,email,subject,message) VALUES('$name','$user_email','$subject','$message')";
    $query=mysqli_query($con,$query);
    if($query){
        echo "<script>alert('Mail has been send the Admin Mail Waiting for Reply......')</script>";
     send_email($user_email,$subject,$message);
    }else{
        echo "<script>alert('Data will not inserted')</script>";
    }
}
function send_email($user_email,$subject,$message){
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // Barbose Model to display the mail notification
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';     //port smtp 465                //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mohammadfaijansari6@gmail.com';                     //SMTP username
    $mail->Password   = 'mpgk xkyj unar gyri';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mohammadfaijansari6@gmail.com', 'PHP Ecommerce Website');
    $mail->addAddress($user_email, 'Joe User');     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    
    $mail->send();
    // echo 'Message has been sent';
    
    $code=1;
    $code1=1;
    if($code1===$code){
        echo "<script>window.open('index.php','_self')</script>";
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
