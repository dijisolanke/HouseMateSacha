<?php
  $host_name = 'db5002080569.hosting-data.io';
  $database = 'dbs1691805';
  $user_name = 'dbu267794';
  $password = 'iamSacha5000!';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die('<p>Failed to connect to MySQL: '. $link->connect_error .'</p>');
  } else {
    echo '<p>Connection to MySQL server successfully established.</p>';
  }
?>


<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer();

// declare the variables from your html page
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];


try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'delartdelabre@gmail.com';                     // SMTP username
    $mail->Password   = 'iamSacha';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('delartdelabre@gmail.com');
    $mail->addAddress($email);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Order Confirmation';
    $mail->Body    = 'Hello ' .$name . '<br><br> Your order has been receive! <br><br> I will contact you as soon as possibe to negotiate prices. <br><br> Thanks.';
    $mail->AltBody = 'Your order has been receive!';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  };






  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  // declare the variables from your html page
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $number = $_REQUEST['phoneNumber'];
  $order = $_REQUEST['orderRequest'];



  try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'delartdelabre@gmail.com';                     // SMTP username
      $mail->Password   = 'iamSacha';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('delartdelabre@gmail.com');
      $mail->addAddress('delartdelabre@gmail.com');     // Add a recipient
      $mail->addAddress('sachadela@gmail.com');

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Client order Request';
      $mail->Body    = 'This order is for: ' . $name . '<br><br>The order is: ' . $order . '<br><br> Here are their contact detais: ' .$email . '<br><br>' . $number;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo ' ';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }






?>






 <style>

    p{
      color: #4f83a4;
      display: flex;
      justify-content: center;
      position: relative;
      top: 40%;
      font-size: 3rem;
      text-align: center;
    }

    a{
      position: relative;
      display: flex;
      justify-content: center;
      top: 55%;
      left: 45%
    }

 </style>

 <p>
   Thank you for the order <br>
   You should recieve a confirmation email shortly.
 </p>

 <a href="index.html" class="btn btn-outline-info btn-lg">Gallery</a>


 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
