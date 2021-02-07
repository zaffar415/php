<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "yourmail@gmail.com";                 
$mail->Password = "password";     // Your Password

//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;       

//From email address and name
$mail->From = "yourmail@gmail.com";
$mail->FromName = "Full Name";

//To address and name
$mail->addAddress("yourmail@gmail.com", "Abdul");
//$mail->addAddress("yourmail@gmail.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("yourmail@gmail.com", "Reply");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}