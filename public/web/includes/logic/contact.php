<?php

//Load Composer's autoloader
require 'vendor/autoload.php';
extract($_POST);
$messagee = ($_POST['message']);
  try {
     // Create the SMTP Transport
  $transport = (new Swift_SmtpTransport('mail.nemchem.co.zm', 587))
    ->setUsername('sales@nemchem.co.zm')
    ->setPassword('sales@nemchem.co.zm');

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = new Swift_Message();

  // Set a "subject"
  $message->setSubject('Nemchem International website query: '.'from: '.$name);

  // Set the "From address"
  $message->setFrom($email , $name);

    // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
     if ($message->addTo('sales@nemchem.co.zm', 'Nemchem International')) {

    // Add "CC" address [Use setCc method for multiple recipients, argument should be array]
   // $message->addBcc('@nemchem.co.zm', 'Administration@ Nemchem International ');

    // Add "BCC" address [Use setBcc method for multiple recipients, argument should be array]
    //$message->addBcc('recipient@gmail.com', 'recipient name');

    // Add an "Attachment" (Also, the dynamic data can be attached)
    // $attachment = Swift_Attachment::fromPath('example.xls');
    //  $attachment->setFilename('report.xls');
    // $message->attach($attachment);

    // Add inline "Image"
    //$inline_attachment = Swift_Image::fromPath('http://mightyfinance.co.zm/images/favicon.png');
    // $cid = $message->embed($inline_attachment);

    // Set the plain-text "Body"
    $message->setContentType("text/html");
    

    $message->setBody($messagee);

    // Set a "Body"
   // $message->addPart(file_get_contents('email.php'), __DIR__, 'text/html');


   // $mail->msgHTML(file_get_contents('email.php'), __DIR__);
     $mail->Body = $messagee;

    // Send the message
    if (!$result = $mailer->send($message)) {
      $msg = 'Message was not sent! Thanks for contacting us but please try again later.';
    } else {
      echo  "success";
      //include('mail2.php');
    }
    } else {
      $msg = 'Try again Later, system error!';
    }
   // echo $msg;
  } catch (Exception $e) {
    echo $e->getMessage();
  }

