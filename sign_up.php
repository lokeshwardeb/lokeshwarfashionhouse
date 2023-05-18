<?php
// session_start();
// $_SESSION['loggedin'] = false;
// this variable is to make activate the active class
$active_class = 'signup';
include "inc/conn.php";



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

      include "inc/sent-mail_new.php";

      // $_SESSION['verify_cus_username'] = '';

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
          $sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$cus_username'";

          $result = mysqli_query($conn, $sql);

          $_SESSION['verify_cus_username'] = $cus_username;

          $hash = password_hash($cus_pass, PASSWORD_DEFAULT);

          $hash_verify = password_verify($pass, $hash);

          if (mysqli_num_rows($result) == 1) {

            echo signup_username_exist_error();




            // echo 'this is the verify' . $verify;
          } else {
            if ($cus_pass !== '') {

    // otp functionality

    $otp = rand(1111, 9999);

    // $insert_otp_sql = "SELECT * FROM `cus_users` WHERE `cus_username` = $cus_username";
    // $insert_otp_result = mysqli_query($conn, $insert_otp_sql);

    // if($insert_otp_result){
    //   if(mysqli_num_rows($result) > 0 ){
    //     $ins_otp_sql = "UPDATE `cus_users` SET `otp`='$otp' WHERE `cus_username` = '$cus_username';";
    //     $ins_otp_result = mysqli_query($conn, $ins_otp_sql);

        
    //   }
    // }

    sent_mail("", $cus_email, $cus_username, "Verify your email -- $website_name", "
    <html>
    <body>
    <style>
    .container{
background-color: #0D6EFD !important;

color: white !important;
margin: auto !important;

    }

    .otp_box{
      background-color: #ddd !important;
      color: black !important;

      margin: auto !important;

      text-align: center !important;
    }
    </style>


    <div class='container'>

      Hi $cus_username, <br>

     Here is your otp for Email verification on $website_name .
     <div class= 'otp_box'>
      $otp
     </div>
    
    </div>


    </body>
    </html>
   
    
    ", "We have sent an otp to your email. Please verify the email");


              
             
             
             
             
              $sql = "INSERT INTO `cus_users` ( `cus_username`,  `cus_email`, `cus_phone_no`, `cus_pass`, `cus_photo`, `cus_address`, `otp`,  `cus_joined_datatime`) VALUES ('$cus_username',  '$cus_email', '$cus_phone_no', '$hash', '$cus_photo', '$cus_address', '$otp', current_timestamp());";

              $result = mysqli_query($conn, $sql);

              if ($result) {






                
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

                 

                  $sql_cus_customer_info = "INSERT INTO `customers` (`customer_id`, `cus_id`, `customer_name`, `customer_email`, `customer_phone_no`, `customer_address`, `join_datetime`) VALUES (NULL, '$cus_id_check_no_is', '$cus_username', '$cus_email', '$cus_phone_no', '$cus_address', current_timestamp());";

                  $result_cus_customer_info = mysqli_query($conn, $sql_cus_customer_info);
                  if ($result_cus_customer_info) {
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

//                 // otp functionality

//                 $otp = rand(1111, 9999);

//                 $insert_otp_sql = "SELECT * FROM `cus_users` WHERE `cus_username` = $cus_username";
//                 $insert_otp_result = mysqli_query($conn, $insert_otp_sql);

//                 if($insert_otp_result){
//                   if(mysqli_num_rows($result) > 0 ){
//                     $ins_otp_sql = "UPDATE `cus_users` SET `otp`='$otp' WHERE `cus_username` = '$cus_username';";
//                     $ins_otp_result = mysqli_query($conn, $ins_otp_sql);

                    
//                   }
//                 }

//                 sent_mail("", $cus_email, $cus_username, "Verify your email -- $website_name", "
//                 <html>
//                 <body>
//                 <style>
//                 .container{
// background-color: #0D6EFD !important;

// color: white !important;
// margin: auto !important;

//                 }

//                 .otp_box{
//                   background-color: #ddd !important;
//                   color: black !important;

//                   margin: auto !important;

//                   text-align: center !important;
//                 }
//                 </style>


//                 <div class='container'>

//                   Hi $cus_username, <br>

//                  Here is your otp for Email verification on $website_name .
//                  <div class= 'otp_box'>
//                   $otp
//                  </div>
                
//                 </div>


//                 </body>
//                 </html>
               
                
//                 ", "We have sent an otp to your email. Please verify the email");


header("location: sign_up_process.php");

              
              } else {
                echo signup_error();
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
        } else {
          echo signup_password_not_matched();
        }
      }





      ?>


      <main class="form-signin">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <img class="mb-4 " src="<?php echo 'ecom-admin/uploaded_img/' . $website_logo ?>" alt="" width="100vw" height="100vh">
          <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="cus_username" required>
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cus_password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cus_cpassword">
            <label for="floatingPassword">Confirm Password</label>
          </div>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingPassword" placeholder="Email" name="cus_email">
            <label for="floatingPassword">Email</label>
          </div>
          <div class="form-floating">
            <input type="file" class="form-control" id="floatingPassword" placeholder="Email" name="cus_photo">
            <!-- <span>User photo</span> -->
            <label for="floatingPassword">User photo</label>
          </div>
          <div class="form-floating">
            <input type="number" class="form-control" id="floatingPassword" placeholder="Phone no" name="cus_phone_no" required>
            <label for="floatingPassword">Phone no</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Address" name="cus_address" required>
            <label for="floatingPassword">Address</label>
          </div>



          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup">Sign up</button>

          <div class="form-floating mb-3 mt-4">
            <label for="forgotPassword"></label>
            <span>Forgot you password ?<a href="forgot_pass.php" id="forgotPassword"> Click here</a> to restore your account.</span> <br>
            <span>Already have a account ?<a href="login.php" id="forgotPassword"> Log in with your account </a> to restore your account.</span>
            <span><a href="index.php" id="forgotPassword"> <input type="button" value="Go home" class="btn btn-primary"> </a></span>
          </div>
          <!-- <div class="form-floating mb-3 mt-4">
            <label for="forgotPassword"></label>
            

          </div> -->

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