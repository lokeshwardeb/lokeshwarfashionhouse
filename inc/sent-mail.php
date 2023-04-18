<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "const.php";


require   '../ecom-admin/PHPMailer/src/Exception.php';
require   '../ecom-admin/PHPMailer/src/PHPMailer.php';
require   '../ecom-admin/PHPMailer/src/SMTP.php';

// include "inc/functions.php";

// include "inc/sent-mail.php";
//Load Composer's autoloader
// require 'vendor/autoload.php';
// require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

function sent_mail($website_name_on_email = "Lokeshwar Fashion House", $sent_on_address, $sent_on_user_name, $email_subject, $email_body, $email_success_msg = "Email sent successfully", $email_add_cc = '', $email_add_bcc = ''){
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
        $mail->setFrom('biratdebmail@gmail.com', "$website_name_on_email");
        $mail->addAddress("$sent_on_address", "$sent_on_user_name");     //Add a recipient
        $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        if($email_add_bcc !== ''  && $email_add_cc !==''){
            $mail->addCC("$email_add_cc");
            $mail->addBCC("$email_add_bcc");
        }
       
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "$email_subject";
        $mail->Body    = "$email_body";
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
}
