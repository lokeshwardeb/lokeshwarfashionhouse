<?php
require_once 'inc/functions.php';
require_once 'inc/sent-mail_new.php';

// $html = '<!doctype html>
// <html lang='en'>
//   <head>
//     <meta charset='utf-8'>
//     <meta name='viewport' content='width=device-width, initial-scale=1'>
//     <title>Bootstrap demo</title>
//     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
//     <style>


//     </style>
//   </head>
//   <body>
//     <div class='container  bg-primary' style= 'background-color: #0D6EFD !important;' style='background-color: #0D6EFD !important;'>
//      <center>Hi</center>   
//     </div>
//     <h1>Hello, world!</h1>
//     <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>




//   </body>
// </html>';


// sent_mail('','lokeshwarfashionhouse@gmail.com', 'david', 'checking', $html);



?>
<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>New Device login found</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>
</head>

<body>
    <div class='container bg-primary' style='background-color: #222222 !important; color:white; padding:20px; margin-top:25px !important; margin-bottom: 25px;'>
        <center><img src='https://scontent.fcla2-1.fna.fbcdn.net/v/t39.30808-6/325760220_488402183478215_627316119726042019_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=b9YaKsyFV4kAX-zEFyI&_nc_zt=23&_nc_ht=scontent.fcla2-1.fna&oh=00_AfDR59oZZj-GZF_ppegTNHiHRcPd8-haKdSyDmyTW5-e8A&oe=646C132E' width='250px' height='250px' alt='logo' style='border-radius: 100% !important;'></center>
        <center> <h4> Lokeshwar Fashion House </h4></center>
        <!-- #0D6EFD -->

        <div style='color:black; background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); padding:20px; margin-top:15px ; margin-bottom: 25px;'>



            Hi , <br>
            New login was found on your <b>Jai sri ramkrishna</b> ADMIN account . You can ignore it if you was logged in to your account. If you was not logged in with your account please change your password and contract us immediately. Thanks. <br>
            <b>Loggedin time: 06:45:49pm </b> <br>
            <b>Loggedin date: 2023-05-18 </b><br>
            <b>Dayname: Thursday </b><br>

        </div>

        <center style='text-align:center; margin-top:25px; padding-bottom:25px; padding-top:25px; margin-bottom: 25px;'>
            &copy; All right are reserved by <?php echo $website_name ?> || Copyright by <?php echo $website_name ?> 2022 - <?php echo date('Y'); ?>
        </center>

    </div>
    <!-- <h1>Hello, world!</h1> -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous'></script>




</body>

</html>