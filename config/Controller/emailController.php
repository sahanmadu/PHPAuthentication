<?php

require_once 'vendor/autoload.php';
require_once 'config/constant.php';


$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465 ,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using you're created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($userEmail, $token){

    global $mailer;
    $body ='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>verify email</title>
    </head>
    <body>
        <div class="wrapper">
        <img src="images/favicon.png" height="150px" weight="150px" >
            <p>
                 Thank you for signing up on our website.If you want to loging to site, please 
                 click on the link below and verify your email address.
            </p>
         
            <a href="http://localhost/phplogin/home.php?token='. $token . '">
            Verify your email address
            </a>
        </div>
    </body>
    </html>';
    // Create a message
$message = (new Swift_Message('verify your email address'))
->setFrom(EMAIL)
->setTo($userEmail)
->setBody($body, 'text/html')
;

// Send teh message
$result = $mailer->send($message);

}



?>