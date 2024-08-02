<?php
//session_start();
require '../../vendor/autoload.php'; 
extract($_POST);


if(isset($_POST['values'])){


//Load Composer's autoloader



//Create an instance; passing `true` enables exceptions

$template_file = "apply.php";

$ip = $_SERVER['REMOTE_ADDR'];
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);
$timezone = $ipInfo->timezone ?? "UTC";

$dt = new DateTime("now", new DateTimeZone($timezone));
$dtt = $dt->format('Y-m-d H:i:s');


  
  
  $name = $fname . ' ' . $lname;
  $data_array = array(
    "{SITE}" => "http://mightyfinance.co.zm",
    "{EMAIL_TITLE}" => "MIGHTY FINANCE SOLUTION CONTACT FORM",
    // "{CUSTOM_IMG1}"=>"$name",
    "{NAME}" => "$name",
    "{PHONE}" => "$phone",

    "{NOTICE}" => "LOAN APPLICATION ",
    "{DATE}" => "$dtt",
    "{MESSAGE}" => "Loan Application",

    "{CLIENT_MESSAGE0}" => "Loan application through the website.",
    "{CLIENT_MESSAGE1}" => "Please get back to this this client/ potential customer as soon as possible.",
    "{CLIENT_MESSAGE2}" => "The details above are what was was input by the user through contact form on the website.
     <br> If you did not register with us, please disregard this email.",
    "{CLIENT_MESSAGE3}" => "",
    "{CLIENT_MESSAGE4}" => " Client message : Loan Application",
    "{AMOUNT}" => "$amount",
    "{DURATION}" => "$duration (Months)",
    "{AGE}" => "$age",

  );
  $messagee = file_get_contents("$template_file");
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  foreach (array_keys($data_array) as $key) {
    $messagee = str_replace($key, $data_array[$key], $messagee);
  }
  try {
     // Create the SMTP Transport
  $transport = (new Swift_SmtpTransport('gator3209.hostgator.com', 587))
    ->setUsername('info@mightyfinance.co.zm')
    ->setPassword('Mancosa252@');

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = new Swift_Message();

  // Set a "subject"
  $message->setSubject('Mighty Finance Loan Application: '.$name);

  // Set the "From address"
  $message->setFrom('loans@mightyfinance.co.zm' , 'Mighty Finance Solution Website: '.$name);

    // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
     if ($message->addTo('loans@mightyfinance.co.zm', 'Loans')) {

    // Add "CC" address [Use setCc method for multiple recipients, argument should be array]

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
    $message->addPart(file_get_contents('apply.php'), __DIR__, 'text/html');


   // $mail->msgHTML(file_get_contents('apply.php'), __DIR__);
   /// $mail->Body = $messagee;

    // Send the message
    if (!$result = $mailer->send($message)) {
      $msg = 'Message was not sent! Thanks for contacting us but please try again later.';
    } else {
      echo  "order_success";
      //include('mail2.php');
    }
    } else {
      $msg = 'Try again Later, system error!';
    }
    //echo $msg;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}




