<?php
 session_start();
 $user_email=$_SESSION['c_email'];
//  echo $user;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if($_SESSION['c_email']===$user_email){
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
        $mail->Password   = 'yquc ddhv lena sqrj';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('mohammadfaijansari6@gmail.com', 'PHP Ecommerce Website');
        $mail->addAddress($user_email, 'Joe User');     //Add a recipient
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Welcome the Ecommerce Website";
        $mail->Body    = " 
                           🛒  Welcome to our store, [$user_email]! We're glad to have you here.
                           Hi [UserName]! Thanks for logging in. Let’s find you something amazing today!
                         ";
        
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
    
}else{
  echo "</script>User Email and Login Email Will Not Match</script>";
}
