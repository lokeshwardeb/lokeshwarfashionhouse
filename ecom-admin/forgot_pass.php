<?php 
session_start();
// $_SESSION["admin_photo"];
include("inc/conn.php");

$sql_login = "SELECT * FROM `settings`";

$result_login = mysqli_query($conn, $sql_login);

if($result_login){
    while ($row = mysqli_fetch_assoc($result_login)) {
        $login_img = $row['login_img'];
        $login_page = $login_img;
    }
}else{
    echo "login query not run";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot pass</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/signin.css"> -->
    <style>
  * {
    margin: auto;
    padding: auto;
    box-sizing: border-box;
  }


  body {
    background-image: url("uploaded_img/<?php echo $login_page ?>");
    background-repeat: no-repeat;
    background-size: cover;
    
  }

  input{
    width: 40% !important;
    display: inline !important;
    /* align-items: center; */
    /* justify-content: center; */
    /* margin: auto !important; */
    margin-left: 24%;
    /* margin-right: 50px !important; */

  }
  #fp_forgot_form{
    display: block !important;
  }

  button{
    margin-left: 40% !important;
    margin-top: 10px !important;
  }

</style>
</head>

<body>
    <div class="container mt-4">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="fp_forgot_form" class="container">
        <h3 class="mt-4 ms-5 ps-5 test-center">Are you have forgot your password ?</h3>
        <input type="text" name="fp_username" placeholder="Your username" class = "form-control input-group mb-4">
        <input type="email" name="fp_email" placeholder="Your email" class = "form-control input-group">
        <br>
        <button name="submit" class = "btn btn-primary" >Submit</button>

    </form>
    </div>







    <!-- <script>document.getelementById("otp_form").style.display = "inline";</script> -->
    <!-- <script>
        function otpDisp(){
            document.getElementById("otp_form").style.display("block!important");

        }
    </script> -->
    


</body>

</html>








<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if (isset($_POST['submit'])) {
    $fp_username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['fp_username']), ENT_QUOTES) ;
    $fp_email = $_POST['fp_email'];
echo    $_SESSION['fp_email'] = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['fp_username']), ENT_QUOTES) ;

$_SESSION['fp_username'] = $fp_username;


    include "inc/conn.php";

    $fp_sql = "SELECT * FROM `admin_users` WHERE `username` = '$fp_username'";
    $fp_result = mysqli_query($conn, $fp_sql);

    if ($fp_result) {
        $otp = rand(1111, 9999);
$_SESSION['otp'] = $otp;

$add_otp = "UPDATE `admin_users` SET `otp` = '$otp' WHERE `admin_users`.`username` = '$fp_username';";
$result_up_otp = mysqli_query($conn, $add_otp);
if($result_up_otp){
    echo "otp updated on db";
}
else{
    echo "cannot updated the opt on db";
}
        while ($row = mysqli_fetch_assoc($fp_result)) {
            $check_email = $row['email'];
            if ($check_email == $fp_email) {
                // if the db email and the form passed email is equal then runs this code

                $_SESSION['fp-send-mail'] = $check_email;
                $_SESSION['fp-mail'] = $fp_email;

                $db_otp = $row['otp'];

                $id = $row['id'];
                
                $_SESSION['id'] = $id;


                header("location: fp-mail.php");

                //Import PHPMailer classes into the global namespace
                //These must be at the top of your script, not inside a function

                // require 'PHPMailer/src/SMTP.php';

                //Load Composer's autoloader
                // require 'vendor/autoload.php';

                // //Create an instance; passing `true` enables exceptions
                // $mail = new PHPMailer(true);
                // try {
                //     //Server settings
                //     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                //     $mail->isSMTP();                                            //Send using SMTP
                //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                //     $mail->Username   = 'biratdebmail@gmail.com';                     //SMTP username
                //     $mail->Password   = 'jukbnitjwbibvcxb';                               //SMTP password
                //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                //     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //     $sent_on = $_SESSION['fp-send-mail'];
                //     $email_subject = "Your otp Lokeshwar fashion house";
                //     $otp = rand(1111, 9999);
                //     $_SESSION['fp_otp_no'] = $otp;
                //     $email_message = "Hi, " . $sent_on . " your otp is " . $otp . " . Use this otp to restore your account. Please don't share this otp to someone else . ";

                //     //Recipients
                //     $mail->setFrom('biratdebmail@gmail.com', 'Birat Deb Mail');
                //     $mail->addAddress("$sent_on", 'Joe User');     //Add a recipient
                //     $mail->addAddress('ellen@example.com');               //Name is optional
                //     $mail->addReplyTo('info@example.com', 'Information');
                //     $mail->addCC('cc@example.com');
                //     $mail->addBCC('bcc@example.com');



                //     //Attachments
                //     // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                //     // $mail->addAttachment("$email_attach_tmp");         //Add attachments
                //     // $mail->addAttachment("$email_attach_tmp", "$email_attach");    //Optional name

                //     //Content
                //     $mail->isHTML(true);                                  //Set email format to HTML
                //     $mail->Subject = "$email_subject";
                //     $mail->Body    = "$email_message" . time();
                //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                //     $mail->send();
                //     if ($mail->send()) {
                //         echo '<script>document.getElementById("otp_form").style.display = "block";
                //         document.getElementById("fp_forgot_form").style.display = "none";
                //         </script>';
                //         if ($_SERVER['SERVER_METHOD'] == 'POST') {
                //             $check_otp = $_POST['fp_otp'];
                //             if ($check_otp ==  $_SESSION['fp_otp_no']) {
                //                 $new_pass = $_POST['fp_new_pass'];
                //                 $add_new_pass = hash($new_pass, PASSWORD_DEFAULT);
                //                 $new_pass_sql = "UPDATE `admin_users` SET `password` = '$add_new_pass' WHERE `admin_users`.`email` = '$check_email';";
                //                 $new_pass_result = mysqli_query($conn, $new_pass_sql);

                //                 if ($new_pass_result) {
                //                     echo "Your password has been updated. Please login with your new password";
                //                 } else {
                //                     echo "Error! Sorry cannot updated your password. Something went wrong";
                //                 }
                //             }else{
                //                 echo "otp does not matched";
                //             }
                //             // $otp
                //         }else{
                //             echo "there was some problem";
                //         }
                //         echo 'Otp has been sent';
                //         echo $_SESSION['fp_otp_no'];
                //     }
                // } catch (Exception $e) {
                //     echo "Otp could not be sent. Mailer Error: {$mail->ErrorInfo}";
                // }
            }
        }
    }
}







?>

<script src="js/bootstrap.min.js"></script>