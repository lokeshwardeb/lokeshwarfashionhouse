<?php

require_once "./inc/functions.php";
include "_company_info.php";
include "conn.php";

function mail_template($website_name = "Lokeshwar Fashion House", $select_template, $username){
    include "_company_info.php";

    if($select_template == 'new_login_found'){
        // $cus_email = $row['cus_email'];
        $current_date =  date("Y-m-d");
        $current_dayname = date("l");
        $time_zone =  date_default_timezone_set("Asia/Dhaka");
        $current_time =  date("h:i:sa");
        $current_year = date("Y");
        return ("<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>New login was found on your account -- $website_name'</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
</head>

<body>
    <div class='container bg-primary' style='background-color: #222222 !important; color:white; padding:20px; margin-top:25px !important; margin-bottom: 25px;'>
        <center><img src='https://scontent.fcla2-1.fna.fbcdn.net/v/t39.30808-6/325760220_488402183478215_627316119726042019_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=b9YaKsyFV4kAX-zEFyI&_nc_zt=23&_nc_ht=scontent.fcla2-1.fna&oh=00_AfDR59oZZj-GZF_ppegTNHiHRcPd8-haKdSyDmyTW5-e8A&oe=646C132E' width='250px' height='250px' alt='logo' style='border-radius: 100% !important;'></center>
        <center style = 'color:white !important;'> <h1>Lokeshwar Fashion House </h1></center>
        <!-- #0D6EFD -->

        <div style='color:black; background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); padding:20px; margin-top:15px ; margin-bottom: 25px;'>



            Hi $username, <br>
            New login was found on your <b>$website_name</b> user account . You can ignore it if you was logged in to your account. If you was not logged in with your account please change your password and contract us immediately. Thanks. <br>
            <b>Loggedin time: $current_time </b> <br>
            <b>Loggedin date: $current_date </b><br>
            <b>Dayname: $current_dayname </b><br>

        </div>

        <center style='text-align:center; margin-top:25px; padding-bottom:25px; padding-top:25px; margin-bottom: 25px; color:white !important;'>
            &copy; All right are reserved by  $website_name  || Copyright by $website_name  2022 -  $current_year
        </center>

    </div>
    <!-- <h1>Hello, world!</h1> -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>




</body>

</html>");
    };
    if($select_template == 'admin_new_login_found'){
        // $cus_email = $row['cus_email'];
        $current_date =  date("Y-m-d");
        $current_dayname = date("l");
        $time_zone =  date_default_timezone_set("Asia/Dhaka");
        $current_time =  date("h:i:sa");
        $current_year = date("Y");
        return ("<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>New login was found on your account -- $website_name'</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
</head>

<body>
    <div class='container bg-primary' style='background-color: #222222 !important; color:white; padding:20px; margin-top:25px !important; margin-bottom: 25px;'>
        <center><img src='https://scontent.fcla2-1.fna.fbcdn.net/v/t39.30808-6/325760220_488402183478215_627316119726042019_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=b9YaKsyFV4kAX-zEFyI&_nc_zt=23&_nc_ht=scontent.fcla2-1.fna&oh=00_AfDR59oZZj-GZF_ppegTNHiHRcPd8-haKdSyDmyTW5-e8A&oe=646C132E' width='250px' height='250px' alt='logo' style='border-radius: 100% !important;'></center>
        <center style = 'color:white !important;'> <h1>Lokeshwar Fashion House </h1></center>
        <!-- #0D6EFD -->

        <div style='color:black; background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); padding:20px; margin-top:15px ; margin-bottom: 25px;'>



            Hi ADMIN $username, <br>
            New login was found on your <b>$website_name</b> ADMIN account . You can ignore it if you was logged in to your account. If you was not logged in with your account please change your password and contract us immediately. Thanks. <br>
            <b>Loggedin time: $current_time </b> <br>
            <b>Loggedin date: $current_date </b><br>
            <b>Dayname: $current_dayname </b><br>

        </div>

        <center style='text-align:center; margin-top:25px; padding-bottom:25px; padding-top:25px; margin-bottom: 25px; color:white !important;'>
            &copy; All right are reserved by  $website_name  || Copyright by $website_name  2022 -  $current_year
        </center>

    </div>
    <!-- <h1>Hello, world!</h1> -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>




</body>

</html>");
    };

    if($select_template == 'new_user_signup'){

        $current_date =  date("Y-m-d");
        $current_dayname = date("l");
        $time_zone =  date_default_timezone_set("Asia/Dhaka");
        $current_time =  date("h:i:sa");
        $current_year = date("Y");
    
// $username = '';
                         // sent on author mail
                         return("
                         <!doctype html>
                         <html lang='en'>
 
                         <head>
                         <meta charset='utf-8'>
                         <meta name='viewport' content='width=device-width, initial-scale=1'>
                         <title>New login was found on your account -- $website_name'</title>
                         <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
                         </head>
 
                         <body>
                         <div class='container bg-primary' style='background-color: #222222 !important; color:white; padding:20px; margin-top:25px !important; margin-bottom: 25px;'>
                         <center><img src='https://scontent.fcla2-1.fna.fbcdn.net/v/t39.30808-6/325760220_488402183478215_627316119726042019_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=b9YaKsyFV4kAX-zEFyI&_nc_zt=23&_nc_ht=scontent.fcla2-1.fna&oh=00_AfDR59oZZj-GZF_ppegTNHiHRcPd8-haKdSyDmyTW5-e8A&oe=646C132E' width='250px' height='250px' alt='logo' style='border-radius: 100% !important;'></center>
                         <center style = 'color:white !important;'> <h1>Lokeshwar Fashion House </h1></center>
                         <!-- #0D6EFD -->
 
                         <div style='color:black; background-color: white;
                         box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); padding:20px; margin-top:15px ; margin-bottom: 25px;'>
 
 
 
                         Hi admin $username, <br>
                         New user sign up has been found and the new user has been just signed up on your website <b>$website_name</b> and created a new user account . Please check about the user and please insure the security of your website. If you find anything wrong you can block the user and make your system safe. You can ignore it if you not find anything wrong in website and if the user is a customer and it was a real user. Stay safe and secure make the system more efficient. Thanks. || $website_name -- team<br>
                         <b>Loggedin time: $current_time </b> <br>
                         <b>Loggedin date: $current_date </b><br>
                         <b>Dayname: $current_dayname </b><br>
 
                         </div>
 
                         <center style='text-align:center; margin-top:25px; padding-bottom:25px; padding-top:25px; margin-bottom: 25px; color:white !important;'>
                         &copy; All right are reserved by  $website_name  || Copyright by $website_name  2022 -  $current_year
                         </center>
 
                         </div>
                         <!-- <h1>Hello, world!</h1> -->
                         <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>
 
 
 
 
                         </body>
 
                         </html>
  ");
    }
    
    if($select_template == 'verify_your_email'){
        include "conn.php";
        include "_company_info.php";
        
        $sql_get_otp = "SELECT * FROM `cus_users` WHERE `cus_username` = '$username'";


        $result_get_otp = mysqli_query($conn, $sql_get_otp);

        if($result_get_otp){

            $otp = rand(1111, 9999);


            $update_otp_sql = "UPDATE `cus_users` SET `otp`='$otp' WHERE `cus_username`= '$username'";
            $update_otp_result = mysqli_query($conn, $update_otp_sql);


            // if(mysqli_num_rows($result_get_otp) > 0){
            //     while ($row = mysqli_fetch_assoc($result_get_otp)) {
            //         $otp = $row['otp'];
            //     }
            // }


          
        }

        $current_date =  date("Y-m-d");
        $current_dayname = date("l");
        $time_zone =  date_default_timezone_set("Asia/Dhaka");
        $current_time =  date("h:i:sa");
        $current_year = date("Y");
        return(" <!doctype html>
        <html lang='en'>

        <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>New login was found on your account -- $website_name'</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
        </head>

        <body>
        <div class='container bg-primary' style='background-color: #222222 !important; color:white; padding:20px; margin-top:25px !important; margin-bottom: 25px;'>
        <center><img src='https://scontent.fcla2-1.fna.fbcdn.net/v/t39.30808-6/325760220_488402183478215_627316119726042019_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=b9YaKsyFV4kAX-zEFyI&_nc_zt=23&_nc_ht=scontent.fcla2-1.fna&oh=00_AfDR59oZZj-GZF_ppegTNHiHRcPd8-haKdSyDmyTW5-e8A&oe=646C132E' width='250px' height='250px' alt='logo' style='border-radius: 100% !important;'></center>
        <center style = 'color:white !important;'> <h1>Lokeshwar Fashion House </h1></center>
        <!-- #0D6EFD -->

        <div style='color:black; background-color: white;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); padding:20px; margin-top:15px ; margin-bottom: 25px;'>


        Hi $username, <br>

        Here is your otp for Email verification on $website_name .



        </div>
d
        <center style='border:1px solid black !important; background-color: #0d6efd !important; padding:25px !important; color:white !important;'>
    <h1>    $otp  </h1>
        </center>

        <center style='text-align:center; margin-top:25px; padding-bottom:25px; padding-top:25px; margin-bottom: 25px; color:white !important;'>
        &copy; All right are reserved by  $website_name  || Copyright by $website_name  2022 -  $current_year
        </center>

        </div>
        <!-- <h1>Hello, world!</h1> -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>




        </body>

        </html>");
    }

}


