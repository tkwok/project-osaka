<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

  $emailfrom = "hello@bye.com";
  $emailto = "tkwok10@gmail.com";
  $subject = "Test Email";
  $name = Trim(stripslashes($_POST['contact-name']));
  $email = Trim(stripslashes($_POST['contact-email']));
  $message = Trim(stripslashes($_POST['contact-message']));

  $validationOK = true;

  if (!$validationOK) {
    print "<h1>Validation NOT OK</h1>";
    exit;
  }

  // prepare email body text
  $Body = "";
  $Body .= "Name: ";
  $Body .= $name;
  $Body .= "\n";
  $Body .= "Email: ";
  $Body .= $email;
  $Body .= "\n";
  $Body .= "Message: ";
  $Body .= $message;
  $Body .= "\n";

  $success = mail($emailto, $subject, $body, "From: <$emailFrom>");

  print $success ? "<h1>Success</h1>": "<h1>Failed</h1>";

?>
