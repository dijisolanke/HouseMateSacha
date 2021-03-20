<?php

require_once('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail ->isSMTP();
$mail->SMTPAuth = true;
$mail ->SMTPSecure = 'ssl';
$mail ->Host = 'smtp.gmai.com';
$mail ->Port = '465';
$mail ->isHTML();
$mail->Username   = 'delartdelabre@gmail.com';                     // SMTP username
$mail->Password   = 'iamSacha';                               // SMTP password
$mail->setFrom('delartdelabre@gmail.com');
$mail->Subject = 'Client order Request';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->addAddress('diji.solanke@yahoo.com', 'Diji');     // Add a recipient

$mail->send();
?>
