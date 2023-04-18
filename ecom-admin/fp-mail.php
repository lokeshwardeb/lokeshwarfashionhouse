<?php

session_start();
//Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if(isset($_SESSION['fp_username'])){
    // include("inc/conn.php");
    include("inc/conn.php");

    $fp_username = $_SESSION['fp_username'];
    
    $sql_login = "SELECT * FROM `settings`";
    
    $result_login = mysqli_query($conn, $sql_login);
    
    if ($result_login) {
        while ($row = mysqli_fetch_assoc($result_login)) {
            $login_img = $row['login_img'];
            $login_page = $login_img;
        }
    } else {
        echo "login query not run";
    }
    ?>
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
    
        input {
            width: 40% !important;
            display: inline !important;
            /* align-items: center; */
            /* justify-content: center; */
            /* margin: auto !important; */
            margin-left: 24%;
            /* margin-right: 50px !important; */
    
        }
    
        #fp_forgot_form {
            display: block !important;
        }
    
        button {
            margin-left: 40% !important;
            margin-top: 10px !important;
        }
    </style>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    
    <?php
    
    
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    // require 'PHPMailer/src/SMTP.php';
    
    //Load Composer's autoloader
    // require 'vendor/autoload.php';
    $sql = "SELECT * FROM `admin_users` WHERE `username` = '$fp_username'";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                // $username = $row['username'];
                $id = $row['id'];
                $db_pass = $row['password'];
                $email = $row['email'];
                $db_otp = $row['otp'];
            }
        }
    }
    
    
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    // $otp = rand(1111, 9999);
    // $_SESSION['otp'] = $otp;
    
    // $add_otp = "UPDATE `admin_users` SET `otp` = '$otp' WHERE `admin_users`.`username` = '$username';";
    
    
    $sent_on = $email;
    $email_subject = "Otp checking from Lokeshwar Fashion House";
    $email_message = "Hi " . $fp_username . ", your otp for Lokeshwar fashion house is " . $db_otp . " ";
    // $email_attach = $_FILES['file_email']['name'];
    // $email_attach_tmp = $_FILES['file_email']['tmp_name'];
    
    
    
    try {
    include "inc/_company_info.php";

        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'biratdebmail@gmail.com';                     //SMTP username
        $mail->Password   = 'jukbnitjwbibvcxb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    

        $username = $_SESSION['fp_username'];

        //Recipients
        $mail->setFrom('biratdebmail@gmail.com', $website_name);
        $mail->addAddress("$sent_on", $username);     //Add a recipient
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
        $mail->Body    = "$email_message" . time();
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    if ($mail->send()) {
        echo '
        
        <form action="' . $_SERVER["PHP_SELF"] . '" method="post">
        <input type="text" class = "form-control input-group mb-4" name="otp_no" placeholder="your otp">
    
        <input type="text" class = "form-control input-group mb-4" name="new_pass" placeholder= "new password">
        <button type="submit" class = "btn btn-primary" name="submit_otp">submit otp</button>
    </form>
    
        
        ';
    
        if (isset($_POST['submit_otp'])) {
            $username = $_SESSION['fp_username'];
            $input_otp = $_POST['otp_no'];
            $input_new_pass = $_POST['new_pass'];
    
    
            // $id = $_SESSION['id'];
    
            include("inc/conn.php");
    
            $sql = "SELECT * FROM `admin_users` WHERE `username` = '$username'";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
    
                if ($input_otp == $db_otp) {
                    $hash = password_hash($input_new_pass, PASSWORD_DEFAULT);
                    $username = $_SESSION['fp_username'];
                    $sql_up = "UPDATE `admin_users` SET `password` = '$hash' WHERE `admin_users`.`username` = '$username';";
    
                    $result_up = mysqli_query($conn, $sql_up);
    
                    if ($result_up) {
                        echo "password updated";
                    } else {
                        echo "cannot updated the password";
                    }
                } else {
                    echo "otp does not match";
                }
            }
    
            unset($_SESSION['fp_username']);
        }
    }
    
    
    
}else{
    header("location: index.php");
}



?>