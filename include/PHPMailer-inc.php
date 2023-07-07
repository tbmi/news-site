<?php
//include at the top of the page
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;									
$mail->isSMTP();	

//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
#$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Host	 = 'smtp.gmail.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,				

// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 587;

// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->SMTPAuth = true;

$mail->Username = 'noreply.chpstkmd@gmail.com';
$mail->Password = '$KHcD5^vwb5QME';

$mail->setFrom('noreply.chpstkmd@gmail.com', 'CHPSTK Media');	

$mail->isHTML(true);								

//must set if needed after include statement
$mail->addAddress('', '');
$mail->addAddress('receiver2@gfg.com', 'Name');
$mail->addReplyTo("");
$mail->Subject = "";
$mail->Body = "";
$mail->msgHTML(file_get_contents(""));
$mail->AltBody = "";
$mail->addAttachment("");
$mail->send();

#echo "Mail has been sent successfully!";
