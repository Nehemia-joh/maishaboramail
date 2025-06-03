<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send'])){
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
// $message=$_POST['Message'];



$mail = new PHPMailer(true);
//Server settings
$mail->SMTPDebug = 0; 
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'nmushi249@gmail.com'; //sender email 
$mail->Password = ''; 
$mail->SMTPSecure = 'tls'; 
$mail->Port = 587; 
//Recipients
$mail->setFrom($email, 'Comment Session'); //sender email
$mail->addAddress('errythane@gmail.com'); //Add a recipient
$mail->addAddress('nmushi249@gmail.com');
$mail->addAddress('aropestephen@gmail.com');
//Content
$mail->isHTML(true); 
$mail->Subject = 'Comments from our people';
$email_template = "
<html>
<head>
  <style>
    body {
      font-family: 'Helvetica Neue', 'Arial', sans-serif;
      color: #333333;
      line-height: 1.8;
      padding: 30px;
      background-color: #f4f7fa;
      margin: 0;
    }
    .container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.1);
      max-width: 650px;
      margin: 0 auto;
      transition: transform 0.3s ease;
    }
    .container:hover {
      transform: translateY(-5px);
    }
    .header {
      text-align: center;
      color: #1a73e8;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 25px;
      border-bottom: 2px solid #e8f0fe;
      padding-bottom: 10px;
    }
    .section {
      margin-bottom: 20px;
      padding: 15px;
      background-color: #f9fafb;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }
    .section:hover {
      background-color: #e8f0fe;
    }
    .label {
      font-weight: 600;
      color: #1a73e8;
      font-size: 16px;
      margin-bottom: 5px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    p {
      margin: 0;
      font-size: 16px;
      color: #444444;
    }
    .footer {
      text-align: center;
      font-size: 14px;
      color: #777777;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid #e8e8e8;
    }
    @media only screen and (max-width: 600px) {
      .container {
        padding: 20px;
        max-width: 100%;
      }
      .header {
        font-size: 24px;
      }
      .section {
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <div class='container'>
    <div class='header'>New Comment</div>

    <div class='section'>
      <p class='label'>Name:</p>
      <p>$name</p>
    </div>

    <div class='section'>
      <p class='label'>Message:</p>
      <p>$message</p>
    </div>

    <div class='footer'>
      <p>Thank you for your engagement!</p>
    </div>
  </div>
</body>
</html>";


$mail->Body = $email_template;
$mail->send();
header('location:index.html');
echo "
<div id='snackbar' style=\"
  visibility:hidden;
  min-width:250px;
  background-color:#323232;
  color:#fff;
  text-align:center;
  border-radius:8px;
  padding:16px;
  position:fixed;
  z-index:999;
  left:50%;
  bottom:30px;
  transform:translateX(-50%);
  font-size:16px;
  box-shadow:0 4px 10px rgba(0,0,0,0.3);
  transition: all 0.3s ease;
  opacity: 0;
\">Message has been sent</div>

<script>
  window.onload = function() {
    var sb = document.getElementById('snackbar');
    sb.style.visibility = 'visible';
    sb.style.opacity = '1';
    sb.style.bottom = '30px';
    
    setTimeout(function() {
      sb.style.opacity = '0';
      sb.style.bottom = '0px';
      setTimeout(function() {
        sb.style.visibility = 'hidden';
      }, 500);
    }, 3000);
  };
</script>
";

}
?>