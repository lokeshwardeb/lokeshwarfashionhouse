<?php
// session_start();
// $_SESSION['loggedin'] = false;
// this variable is to make activate the active class
$active_class = 'login';
include "inc/conn.php";



include "inc/_company_info.php";

include "inc/_header.php";
// include("inc/functions.php");
// if(isset($_SESSION['username'])){
//     header("location: home.php");
//   }
// else{

require_once "inc/const.php";



// include "inc/_navbar.php";

?>

<link rel="stylesheet" href="css/signin.css">
<link rel="stylesheet" href="css/login.css">

<style>
  * {
    margin: auto;
    padding: auto;
    box-sizing: border-box;
  }

  body {
    background-image: url("<?php echo SITE_URL ?>ecom-admin/uploaded_img/users_login_upload/<?php echo $users_login_upload ?>") !important;
    background-repeat: no-repeat;
    background-size: cover;
  }

  #preloader {
    background: #ddd url(img/preloader_un.gif) no-repeat center center;
    height: 100vh !important;
    width: 100vw !important;
    position: fixed !important;
    z-index: 100 !important;
  }

  /* .login{
   
  } */
</style>



<body class="login">
  <div id="preloader"></div>
  <div class="container title-bar  mt-4" id="orderSec">

    <div class="text-center">

      <?php
      include  "inc/functions.php";

      include "inc/sent-mail_new.php";
      require_once "inc/sent_mail_template_inc.php";

      require "get_users_info/UserInformation.php";
      $get_ip =  UserInfo::get_ip();
      $get_os =  UserInfo::get_os();
      $get_device =  UserInfo::get_device();





      if (isset($_POST['signin'])) {


        $cus_username = mysqli_real_escape_string($conn, $_POST['cus_username']);
        $cus_pass = mysqli_real_escape_string($conn, $_POST['cus_pass']);


        $sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$cus_username'";

        $result = mysqli_query($conn, $sql);
        $hash = password_hash($cus_pass, PASSWORD_DEFAULT);

        $hash_verify = password_verify($cus_pass, $hash);

        if ($result) {
          if ($cus_pass !== '') {
            if (mysqli_num_rows($result) == 1) {
              while ($row = mysqli_fetch_assoc($result)) {
                $pass_verify = password_verify($cus_pass, $row['cus_pass']);
                if ($pass_verify === $hash_verify) {
                  login_success();

                    
                  $_SESSION['cus_loggedin'] = true;
                  $_SESSION['cus_username'] = $cus_username;
                  $_SESSION['cus_email'] = $row['cus_email'];
                  $_SESSION['cus_phone_no'] = $row['cus_phone_no'];
                  $_SESSION['cus_desc'] = $row['cus_desc'];
                  $_SESSION['cus_photo'] = $row['cus_photo'];
                  $_SESSION['cus_address'] = $row['cus_address'];
                  $_SESSION['cus_joined_datatime'] = $row['cus_joined_datatime'];

                  $cus_email = $row['cus_email'];

                  $cus_last_ip_address = $row['cus_last_ip_address'];
                  $cus_last_used_os = $row['cus_last_used_os'];
                  $cus_last_used_device = $row['cus_last_used_device'];

                  $ip_up_sql = "UPDATE `cus_users` SET `cus_last_ip_address`='$get_ip' WHERE `cus_username` = '$cus_username'";
                  $ip_up_result = mysqli_query($conn, $ip_up_sql);

                  $os_up_sql = "UPDATE `cus_users` SET `cus_last_used_os`='$get_os' WHERE `cus_username` = '$cus_username'";
                  $os_up_result = mysqli_query($conn, $os_up_sql);

                  $device_up_sql = "UPDATE `cus_users` SET `cus_last_used_device`='$get_device' WHERE `cus_username` = '$cus_username'";
                  $device_up_result = mysqli_query($conn, $device_up_sql);

                  $cus_email = $row['cus_email'];
                  $current_date =  date("Y-m-d");
                  $current_dayname = date("l");
                  $time_zone =  date_default_timezone_set("Asia/Dhaka");
                  $current_time =  date("h:i:sa");
                  $current_year = date("Y");


                  sent_mail("", $cus_email, $cus_username, "New login was found on your account -- $website_name", mail_template("", "new_login_found", $cus_username));

                  if($row['verify_status'] == ''){
                    // if the $_SESSION['cus_verify_status_check'] = 1 then it is not verified the user and if it is 0 then it is verified user
                    $_SESSION['cus_verify_status_check'] = 1;
echo '

<script>
window.location.href = "sign_up_process.php";

</script>

';
                  }else{
                    $_SESSION['cus_verify_status_check'] = 0;
                  
                  }
                  
                  header("location: index.php");

                
                  // die("hi");
                } else {
                  // $_SESSION['loggedin'] = false;
                  preloader_include();
                  echo (login_password_not_matched());
                }
              }
            } else {
              preloader_include();
              echo (login_user_doesnot_exist());
            }
          } else {

            preloader_include();

            echo (login_user_password_blank());
            // exit();
          }




          // echo 'this is the verify' . $verify;
        } else {
          preloader_include();
          echo (login_defficulties_error());
        }
      }



      ?>


      <main class="form-signin">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <img class="mb-4 " src="<?php echo 'ecom-admin/uploaded_img/' . $website_logo ?>" alt="" width="100vw" height="100vh">
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="cus_username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cus_pass">
            <label for="floatingPassword">Password</label>
          </div>



          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="signin">Sign in</button>

          <div class="form-floating mb-3 mt-4">
            <label for="forgotPassword"></label>
            <span>Forgot you password ?<a href="forgot_pass.php" id="forgotPassword"> Click here</a> to restore your account.</span>

          </div>
          <div class="form-floating mb-3 mt-4">
            <label for="forgotPassword"></label>
            <span>Don't have a account ?<a href="sign_up.php" id="forgotPassword"> Create a account </a> to restore your account.</span>

          </div>

          <p class="mt-5 mb-3 text-muted ">© All rights are reserved by <?php echo $website_name ?>. || 2022 - <?php echo date('Y') ?></p>
        </form>
      </main>





    </div>

  </div>



  </main>



  <?php

  // include "inc/_footer.php";


  // 
  ?>

  <script src="js/all.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>

</body>




<?php

// include "inc/_footer.php";
// }

?>