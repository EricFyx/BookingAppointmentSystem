<?php
require_once('dbcon.php');
require_once("functions.php");

require_once("php-vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com";
$mail->Port = "465";
$mail->SMTPSecure = "ssl";

$mail->Username = "abdullahlogin56@gmail.com";
$mail->Password = "hlsiaybyhgyhwcfm";

$mail->setFrom("abdullahlogin56@gmail.com");
$mail->addReplyTo("no-reply@Email");

$adminMail = new PHPMailer();
$adminMail->isSMTP();
$adminMail->SMTPAuth = true;
$adminMail->Host = "smtp.gmail.com";
$adminMail->Port = "465";
$adminMail->SMTPSecure = "ssl";

$adminMail->Username = "abdullahlogin56@gmail.com";
$adminMail->Password = "hlsiaybyhgyhwcfm";

$adminMail->setFrom("abdullahlogin56@gmail.com");
$adminMail->addReplyTo("no-reply@Email");
?>