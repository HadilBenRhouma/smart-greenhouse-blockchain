<?php

include('phpmailer/PHPMailerAutoload.php');
function sendmail($to, $subject, $content){


$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = getenv("SMTP_HOST");
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = getenv("SMTP_USER");
$mail->Password = getenv("SMTP_PASSWORD");
$mail->SetFrom(getenv("SMTP_USER"));
$mail->Subject = $subject;
//$mail->Body = "hello";
$mail->MsgHTML($content);
$mail->AddAddress($to);


if(!$mail->Send()){ 
	$_SESSION["email"]=" Problem on sending mail<br>";
	//echo $msg;
}
else {
$_SESSION["email"]= " Your mail is sent, please check the mail box";
	
}
	//echo($_SESSION["email"]);
}
?>




