<?php
require 'PHPMailerAutoload.php';


$emailSubject = 'Customer Has a Question!';
$webMaster = $_POST['toMail'];

$firstName = $_POST ['firstName'];
$lastName = $_POST ['lastName'];
$emailAddress = $_POST['emailAddress'];
$message = $_POST ['message'];

$mail = new PHPMailer;

$mail -> isSMTP();
// Set mailer to use SMTP
$mail -> Host = 'box327.bluehost.com';
// Specify main and backup SMTP servers
$mail -> SMTPAuth = true;
// Enable SMTP authentication
$mail -> Username = 'online@hoffmanslandscaping.com';
// SMTP username
$mail -> Password = 'Hoffmanslandscaping1!';
// SMTP password
//$mail -> SMTPSecure = 'tls';
// Enable encryption, 'ssl' also accepted

$mail -> From = $webMaster;
$mail -> FromName = "Hoffman Website";
$mail -> addAddress($webMaster);
// Add a recipient 
 $mail->addAddress('jason@hoffmanslandscaping.com');               // Name is optional
 $mail->addAddress('angela@hoffmanslandscaping.com');               // Name is optional
 $mail->addAddress('david@hoffmanslandscaping.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail -> WordWrap = 50;
// Set word wrap to 50 characters
// $mail -> addAttachment('/var/tmp/file.tar.gz');
// Add attachments
//$mail -> addAttachment('/tmp/image.jpg', 'new.jpg');
// Optional name
$mail -> isHTML(true);
// Set email format to HTML

$mail -> Subject = 'Website Customer has a Question!';
$str = <<<EOD
<br><hr><br><b>Name:</b> $firstName $lastName <br>
<b>Email:</b> $emailAddress <br>
<b>Message:</b> $message <br>
EOD;
$mail -> Body = $str;
$mail -> AltBody = <<<EOD
Name: $firstName $lastName 
Email: $emailAddress 
Message: $message 
EOD;

if (!$mail -> send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail -> ErrorInfo;
} else {
	header("Location: ../success.html");
	die();
}
?>