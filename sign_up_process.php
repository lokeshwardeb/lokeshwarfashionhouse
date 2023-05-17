<?php
// session_start();
// $_SESSION['loggedin'] = false;
// this variable is to make activate the active class
$active_class = 'signup';
include "inc/conn.php";

include "inc/sent-mail_new.php";



include "inc/_company_info.php";

include "inc/_header.php";
// include("inc/functions.php");
// if(isset($_SESSION['username'])){
//     header("location: home.php");
//   }
// else{




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
    background-image: url("ecom-admin/uploaded_img/users_login_upload/<?php echo $users_login_upload ?>") !important;
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

      $otp_func_run_starts = 0;

      if (isset($_POST['signup'])) {


        $cus_username = mysqli_real_escape_string($conn, $_POST['cus_username']);
        $cus_pass = mysqli_real_escape_string($conn, $_POST['cus_password']);
        $cus_cpass = mysqli_real_escape_string($conn, $_POST['cus_cpassword']);
        $cus_email = mysqli_real_escape_string($conn, $_POST['cus_email']);
        $cus_phone_no = mysqli_real_escape_string($conn, $_POST['cus_phone_no']);
        $cus_address = mysqli_real_escape_string($conn, $_POST['cus_address']);

        $cus_photo = $_FILES['cus_photo']['name'];
        $cus_photo_tmp = $_FILES['cus_photo']['tmp_name'];

        $cus_photo_upload = "ecom-admin/uploaded_img/cus_photo_upload/" . $cus_photo;


        if ($cus_pass == $cus_cpass) {
          $sql_main = "SELECT * FROM `cus_users` WHERE `cus_username` = '$cus_username'";

          $result_main = mysqli_query($conn, $sql_main);
          $hash = password_hash($cus_pass, PASSWORD_DEFAULT);

          $hash_verify = password_verify($pass, $hash);

          if (mysqli_num_rows($result_main) > 0) {

            echo signup_username_exist_error();




            // echo 'this is the verify' . $verify;
          } else {
            if ($cus_pass !== '') {
              $otp_func_run_starts = 1;

              // otp declaration and the otp process starts here



              $otp = rand(1111, 9999);

              $sql_otp = "INSERT INTO `cus_users` ( `cus_username`,  `cus_email`, `cus_phone_no`, `cus_pass`, `cus_photo`, `cus_address`, `otp`, `cus_joined_datatime`) VALUES ('$cus_username',  '$cus_email', '$cus_phone_no', '$hash', '$cus_photo', '$cus_address', '$otp', current_timestamp());";

              sent_mail("", $cus_email, $cus_username, "Verify your email", "Hi  your $cus_username, <br> your otp for $website_name is to verify your email <br> Your otp is $otp");

              $result_otp = mysqli_query($conn, $sql_otp);

              // $sql = "INSERT INTO `cus_users` ( `cus_username`,  `cus_email`, `cus_phone_no`, `cus_pass`, `cus_photo`, `cus_address`, `cus_joined_datatime`) VALUES ('$cus_username',  '$cus_email', '$cus_phone_no', '$hash', '$cus_photo', '$cus_address', current_timestamp());";

              // $result = mysqli_query($conn, $sql);

              if ($result_otp) {
                if (move_uploaded_file($cus_photo_tmp, $cus_photo_upload)) {

                  $sql_for_id = "SELECT * FROM `cus_users` WHERE `cus_username` = '$cus_username'";
                  $result_for_id = mysqli_query($conn, $sql_for_id);
                  if ($result_for_id) {
                    if (mysqli_num_rows($result_for_id) > 0) {
                      while ($row = mysqli_fetch_assoc($result_for_id)) {
                        $cus_id_check_no_is = $row['cus_id'];
                      }
                    }
                  }



                  $check_otp_sql = "SELECT `otp` FROM `cus_users` WHERE `cus_username` = '$cus_username'";
                  $check_otp_result = mysqli_query($conn, $check_otp_sql);

                  if ($check_otp_result) {
                    if (mysqli_num_rows($check_otp_result) > 0) {
                      while ($row = mysqli_fetch_assoc($check_otp_result)) {
                        $verify_otp = $row['otp'];
                      }
                    }
                  }

                  include "sign_up_process.php";




                  if (isset($_POST['otp_submit'])) {
                    $otp_inp = $_POST['otp_inp'];


                    $check_otp_sql = "SELECT `otp` FROM `cus_users` WHERE `cus_username` = '$cus_username'";
                    $check_otp_result = mysqli_query($conn, $check_otp_sql);

                    if ($check_otp_result) {
                      if (mysqli_num_rows($check_otp_result) > 0) {
                        while ($row = mysqli_fetch_assoc($check_otp_result)) {
                          $verify_otp = $row['otp'];
                        }
                      }
                    }




                    // starts the otp functionalities

                    if ($otp_inp == $verify_otp) {







                      $sql_cus_customer_info = "INSERT INTO `customers` (`customer_id`, `cus_id`, `customer_name`, `customer_email`, `customer_phone_no`, `customer_address`, `join_datetime`) VALUES (NULL, '$cus_id_check_no_is', '$cus_username', '$cus_email', '$cus_phone_no', '$cus_address', current_timestamp());";

                      $result_cus_customer_info = mysqli_query($conn, $sql_cus_customer_info);
                      if ($result_cus_customer_info) {
                        echo signup_success();
                      }
                      $sql_cus_verified = "INSERT INTO `cus_user` (`verify_status`) VALUES ('Verified user (verified by email)');";

                      $result_cus_verified = mysqli_query($conn, $sql_cus_customer_info);
                      if ($result_cus_verified) {
                        echo signup_success();
                      }
                    } else {
                      // echo 'cannot uploaded teh img';
                      $sql_for_id = "SELECT * FROM `cus_users` WHERE `cus_username` = '$cus_username'";
                      $result_for_id = mysqli_query($conn, $sql_for_id);
                      if ($result_for_id) {
                        if (mysqli_num_rows($result_for_id) > 0) {
                          while ($row = mysqli_fetch_assoc($result_for_id)) {
                            $cus_id_check_no_is = $row['cus_id'];
                          }
                        }
                      }


                      $sql_cus_customer_info = "INSERT INTO `customers` (`customer_id`, `cus_id`, `customer_name`, `customer_email`, `customer_phone_no`, `customer_address`, `join_datetime`) VALUES (NULL, '$cus_id_check_no_is', '$cus_username', '$cus_email', '$cus_phone_no', '$cus_address', current_timestamp());";

                      $result_cus_customer_info = mysqli_query($conn, $sql_cus_customer_info);
                      if ($result_cus_customer_info) {
                        echo signup_success();
                      }
                    }
                  } else {
                    echo signup_error();
                  }



                  // if (isset($_POST['otp_submit'])) {
                  //   $otp_inp = $_POST['otp_inp'];


                  //   $check_otp_sql = "SELECT `otp` FROM `cus_users` WHERE `cus_username` = '$cus_username'";
                  //   $check_otp_result = mysqli_query($conn, $check_otp_sql);

                  //   if ($check_otp_result) {
                  //     if (mysqli_num_rows($check_otp_result) > 0) {
                  //       while ($row = mysqli_fetch_assoc($check_otp_result)) {
                  //         $verify_otp = $row['otp'];
                  //       }
                  //     }
                  //   }




                  //   // starts the otp functionalities

                  //   if ($otp_inp == $verify_otp) {







                  //     $sql_cus_customer_info = "INSERT INTO `customers` (`customer_id`, `cus_id`, `customer_name`, `customer_email`, `customer_phone_no`, `customer_address`, `join_datetime`) VALUES (NULL, '$cus_id_check_no_is', '$cus_username', '$cus_email', '$cus_phone_no', '$cus_address', current_timestamp());";

                  //     $result_cus_customer_info = mysqli_query($conn, $sql_cus_customer_info);
                  //     if ($result_cus_customer_info) {
                  //       echo signup_success();
                  //     }
                  //   } else {
                  //     // echo 'cannot uploaded teh img';
                  //     $sql_for_id = "SELECT * FROM `cus_users` WHERE `cus_username` = '$cus_username'";
                  //     $result_for_id = mysqli_query($conn, $sql_for_id);
                  //     if ($result_for_id) {
                  //       if (mysqli_num_rows($result_for_id) > 0) {
                  //         while ($row = mysqli_fetch_assoc($result_for_id)) {
                  //           $cus_id_check_no_is = $row['cus_id'];
                  //         }
                  //       }
                  //     }


                  //     $sql_cus_customer_info = "INSERT INTO `customers` (`customer_id`, `cus_id`, `customer_name`, `customer_email`, `customer_phone_no`, `customer_address`, `join_datetime`) VALUES (NULL, '$cus_id_check_no_is', '$cus_username', '$cus_email', '$cus_phone_no', '$cus_address', current_timestamp());";

                  //     $result_cus_customer_info = mysqli_query($conn, $sql_cus_customer_info);
                  //     if ($result_cus_customer_info) {
                  //       echo signup_success();
                  //     }
                  //   }
                  // } else {
                  //   echo signup_error();
                  // }
                }
              } elseif ($cus_pass == '') {

                preloader_include();

                echo (login_user_password_blank());
                // exit();
              } else {
                preloader_include();
                echo (signup_defficulties_error());
              }
            }
          }
        } else {
          echo signup_password_not_matched();
        }
      }





      ?>


      <main class="form-signin">
        
          

<style>
          #otp-input::placeholder {
            text-align: center !important;

          }
        </style>
        <div class="container <?php
                            //   if ($otp_func_run_starts == 1) {
                            //     echo 'd-flex';
                            //   } else {
                            //     echo 'd-none';
                            //   }

                              ?>">
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="container">
              <div class="container bg-light mb-4">
                We have sent an otp on your email. Please verify your email

                <?php echo $otp_func_run_starts; ?>

              </div>
              <div class="form-control pt-2 mb-4 pb-4">
                <input class="form-control mb-4 pb-4 mt-2" type="number" name="otp_inp" id="otp-input" placeholder="Your otp">
                <button class="btn btn-outline-primary" type="submit" name="otp_submit">Submit otp</button>
              </div>
            </div>
            <p class="mt-5 mb-3 text-muted ">© All rights are reserved by <?php echo $website_name ?>. || 2022 - <?php echo date('Y') ?></p>

          </form>
        </div>



     


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

  <!-- <script>
let main_form = document.getElementById("main_form");

function submitForm(event){

//Preventing page refresh
event.preventDefault();
}

//Calling a function during form submission.
main_form.addEventListener('submit', submitForm);
  </script> -->

</body>




<?php

// include "inc/_footer.php";
// }

?>