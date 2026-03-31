<?php
session_start();
require 'vendor/autoload.php';
include('include/db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$signupmailid = $_SESSION['c_email'];

if (isset($_SESSION['c_email']) && $_SESSION['c_email'] === $signupmailid) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mohammadfaijansari6@gmail.com';
        $mail->Password   = 'mpgk xkyj unar gyri'; // Consider using env vars
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('mohammadfaijansari6@gmail.com', 'PHP Ecommerce Website');
        $mail->addAddress($signupmailid);

        // Content
        $user_email = $signupmailid;
        $user_name = isset($_SESSION['c_name']) ? $_SESSION['c_name'] : 'Customer';

        $mail->isHTML(true);
        $mail->Subject = "Welcome to the Ecommerce Website";
        $mail->Body = " 
            🛒 Welcome to our store, $user_email! We're glad to have you here.<br>
            Hi $user_name! Thanks for logging in. Let’s find you something amazing today!
        ";

        $mail->send();

        echo "<script>window.open('index.php','_self')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
