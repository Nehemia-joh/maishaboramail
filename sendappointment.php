<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send'])){
$name=$_POST['name'];
$email=$_POST['email'];




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
$mail->setFrom($email, 'Appointment Request'); //sender email
$mail->addAddress('errythane@gmail.com'); //Add a recipient
$mail->addAddress('nmushi249@gmail.com');
$mail->addAddress('aropestephen@gmail.com');
//Content
$mail->isHTML(true); 
$mail->Subject = 'Appointment Request';
$email_template = "
<html>
<head>
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    body {
      font-family: 'Arial', sans-serif;
      color: #333333;
      line-height: 1.6;
      padding: 40px;
      background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
      margin: 0;
    }

    .container {
      background: linear-gradient(to bottom right, #ffffff, #f0f0f0);
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: auto;
      animation: fadeIn 0.8s ease-in-out;
    }

    .header {
      text-align: center;
      color: #007acc;
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 25px;
      text-shadow: 1px 1px 2px #ccc;
    }

    .section {
      margin-bottom: 20px;
    }

    .label {
      font-weight: bold;
      color: #2c3e50;
      margin-bottom: 5px;
    }

    .value {
      background-color: #eef6f9;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #d0e6f1;
      color: #333;
    }

    /* Optional: Button styling (if needed later) */
    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007acc;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      margin-top: 20px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #005fa3;
    }
  </style>
</head>
<body>
  <div class='container'>
    <div class='header'>New Appointment Request</div>

    <div class='section'>
      <div class='label'>Name:</div>
      <div class='value'>$name</div>
    </div>

    <div class='section'>
      <div class='label'>Email:</div>
      <div class='value'>$email</div>
    </div>
  </div>
</body>
</html>";



$mail->Body = $email_template;
$mail->send();
echo 'Message has been sent';
header('location:index.html');
}
?>