<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// require 'PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
function cus_sent_mail($sent_on, $email_subject, $email_message){

    $mail = new PHPMailer(true);


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
        $mail->setFrom('biratdebmail@gmail.com', 'Birat Deb Mail');
        $mail->addAddress("$sent_on", 'Joe User');     //Add a recipient
        $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
    
    
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        // $mail->addAttachment("$email_attach_tmp");         //Add attachments
        // $mail->addAttachment("$email_attach_tmp", "$email_attach");    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "$email_subject";
        $mail->Body    = "$email_message". time();
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    




}

?>

<!-- <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<input type="email" name="send_email" placeholder="sent the email on">
<input type="text" name="sub_email" placeholder="email subject">
<input type="text" name="msg_email" placeholder="email message">
<input type="file" name="file_email" placeholder="email message">
<input type="submit" name="submit">
 <input type="text" 

    name="send_email"> -->

<!-- </form> --> 