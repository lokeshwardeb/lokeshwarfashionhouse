<?php
// session_start();
// $_SESSION['loggedin'] = false;
// this variable is to make activate the active class
$active_class = 'login';
include "inc/conn.php";

include "inc/_company_info.php";
include "inc/const.php";



// include "inc/_company_info.php";

include "inc/_header.php";
// include("inc/functions.php");
if (isset($_SESSION['username'])) {
  header("location: home.php");
} else {




  // include "inc/_navbar.php";

?>

  <style>
    * {
      margin: auto;
      padding: auto;
      box-sizing: border-box;
    }
    main{
      overflow: hidden !important;
    }

    body {
      background-image: url("<?php echo PHOTO_UPLOADED_PATH . $login_page ?>") !important;
      background-repeat: no-repeat;
      background-size: cover;
    }
.login{
  overflow: hidden;
}
    .pass {
      background-color: #D9D9D9;
    }
  </style>





  <body class="login">
    <div id="preloader"></div>
    <div class="container title-bar  mt-4" id="orderSec">

      <div class="text-center">

        <?php
        include  "inc/functions.php";

        // include "inc/sent-mail.php";

        include "inc/sent-mail_admin_new.php";
        // require_once "ecom-admin/inc/sent_mail_template_inc.php";
        require_once "./../inc/sent_mail_template_inc.php";

        require "../get_users_info/UserInformation.php";
         $get_ip =  UserInfo:: get_ip();
         $get_os =  UserInfo::get_os();
         $get_device =  UserInfo::get_device();

        if (isset($_POST['signin'])) {


          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $pass = mysqli_real_escape_string($conn, $_POST['password']);


          $sql = "SELECT * FROM `admin_users` WHERE `username` = '$username'";

          $result = mysqli_query($conn, $sql);
          $hash = password_hash($pass, PASSWORD_DEFAULT);

          $hash_verify = password_verify($pass, $hash);

          if ($result) {
            if ($pass !== '') {
              if (mysqli_num_rows($result) == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $pass_verify = password_verify($pass, $row['password']);
                  if ($pass_verify === $hash_verify) {
                    login_success();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['admin_phone_no'] = $row['admin_phone_no'];
                    $_SESSION['admin_description'] = $row['admin_description'];
                    $_SESSION['admin_photo'] = $row['admin_photo'];
                    $_SESSION['admin_joined_datetime'] = $row['datetime'];

                    $admin_last_ip_address = $row['admin_last_ip_address'];
                    $admin_last_used_os = $row['admin_last_used_os'];
                    $admin_last_used_device = $row['admin_last_used_device'];

                    $ip_up_sql = "UPDATE `admin_users` SET `admin_last_ip_address`='$get_ip' WHERE `username` = '$username'";
                    $ip_up_result = mysqli_query($conn, $ip_up_sql);

                    $os_up_sql = "UPDATE `admin_users` SET `admin_last_used_os`='$get_os' WHERE `username` = '$username'";
                    $os_up_result = mysqli_query($conn, $os_up_sql);

                    $device_up_sql = "UPDATE `admin_users` SET `admin_last_used_device`='$get_device' WHERE `username` = '$username'";
                    $device_up_result = mysqli_query($conn, $device_up_sql);

                    

                    $email = $row['email'];
                   $current_date =  date("Y-m-d");
                   $current_dayname = date("l");
              $time_zone =  date_default_timezone_set("Asia/Dhaka");
echo  $current_time =  date("h:i:sa");

                    sent_mail("", $email, $username, "New login was found on your admin account -- $website_name", mail_template("", "admin_new_login_found", $username));

                    header("location: home.php");
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
            <img class="mb-4 " src="<?php echo 'uploaded_img/' . $website_logo ?>" alt="" width="100vw" height="100vh">
           <div class="container bg-light pb-2 mb-4">

           <h1 class="h3 mb-3 fw-normal">ADMIN PANEL</h1>
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
           </div>

            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating d-flex pass">
              <input type="password" class="form-control" id="pass_inp" placeholder="Password" name="password">
              <label for="pass_inp">Password</label>
              <i class="fa-solid fa-eye pass no-disp" id="show_pass" onclick="pass_show()"></i>
              <i class="fa-solid fa-eye-slash  pass" id="hide_pass" onclick="pass_show()"></i>
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


    <script>
      function pass_show() {

        let show_pass = document.getElementById("show_pass");
        let hide_pass = document.getElementById("hide_pass");

        let pass_inp = document.getElementById("pass_inp");


        if (show_pass.classList.contains("no-disp")) {
          hide_pass.classList.add("no-disp");
          show_pass.classList.remove("no-disp")
          if (pass_inp.type == "password") {
            pass_inp.type = "text"
          } else {
            pass_inp.type = "password";

          }
        } else {
          hide_pass.classList.remove("no-disp");
          show_pass.classList.add("no-disp")
          // hide_pass.classList.toggle("no-disp");
          // hide_pass.classList.ad("no-disp");
          // pass_inp.type = "text";

          if (pass_inp.type == "password") {
            pass_inp.type = "text"
          } else {
            pass_inp.type = "password";

          }

        }

        // if(hide_pass.classList.contains("no-disp")){
        //   hide_pass.classList.remove("no-disp");
        //     show_pass.classList.add("no-disp")
        //     // hide_pass.classList.toggle("no-disp");
        //     // hide_pass.classList.ad("no-disp");
        //     pass_inp.type = "text";
        // }




      }
    </script>

  </body>




<?php

  include "inc/_footer.php";
}

?>