<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// include "const.php";


require   './ecom-admin/PHPMailer/src/Exception.php';
require   './ecom-admin/PHPMailer/src/PHPMailer.php';
require   './ecom-admin/PHPMailer/src/SMTP.php';

include "inc/functions.php";

// include "inc/sent-mail.php";
//Load Composer's autoloader
// require 'vendor/autoload.php';
// require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

// function sent_mail($website_name_on_email = "Lokeshwar Fashion House", $sent_on_address, $sent_on_user_name, $email_subject, $email_body, $email_success_msg = "Email sent successfully", $email_add_cc = '', $email_add_bcc = ''){
    $mail = new PHPMailer(true);
    // include "inc/sent-mail.php";

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'biratdebmail@gmail.com';                     //SMTP username
        $mail->Password   = 'jukbnitjwbibvcxb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('biratdebmail@gmail.com', "Lokeshwar Fashion House");
        $mail->addAddress("lokeshwarfashionhouse@gmail.com", "david");     //Add a recipient
        $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        // if($email_add_bcc !== ''  && $email_add_cc !==''){
        //     $mail->addCC("$email_add_cc");
        //     $mail->addBCC("$email_add_bcc");
        // }
       
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "full checking";
        $mail->Body    = '<!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap demo</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <style>
            
            
            </style>
          </head>
          <body>
            <div class="container  bg-primary" >
                Hi
            </div>
            <h1>Hello, world!</h1>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        
        
        
            
          </body>
        </html>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';

        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // return $mail;

    if($mail->send()){
        succcess_alert($email_success_msg);
    }else{
        error_alert("Email could not sent successfully");
    }
// }
