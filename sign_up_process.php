<?php
// session_start();
// $_SESSION['loggedin'] = false;
// this variable is to make activate the active class
$active_class = 'verify your email';
include "inc/conn.php";

include "inc/sent-mail_new.php";



include "inc/_company_info.php";

include "inc/_header.php";
// include("inc/functions.php");
// if(isset($_SESSION['username'])){
//     header("location: home.php");
//   }
// else{


  if(!isset($_SESSION['verify_cus_username'])){
    // header("sign_up.php");
    echo '
<script>
window.location.href = "login.php";
</script>
';
  }

  // else{
  //   echo '
  //   <script>
  //   window.location.href = "sign_up.php";
  //   </script>
  //   ';
  // }



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

  $cus_username =  $_SESSION['verify_cus_username'] ;

    if(isset($_POST['otp_submit'])){
      $otp_inp = $_POST['otp_inp'];

      $verify_sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$cus_username'";

      $verify_result = mysqli_query($conn, $verify_sql);

      if($verify_result){
        if(mysqli_num_rows($verify_result) > 0){
          while($row = mysqli_fetch_assoc($verify_result)){
            $verify_otp = $row['otp'];
          }

          if($verify_otp == $otp_inp){
            echo "your otp is correct";

            $update_verify_status_sql = "UPDATE `cus_users` SET `verify_status`='Email Verified' WHERE `cus_username` = '$cus_username'";
            $update_verify_status_result = mysqli_query($conn, $update_verify_status_sql);

            if($update_verify_status_result){
              succcess_alert("Your Email has been verified successfully. Login with your username");
              $_SESSION['verify_cus_username'] = '';
              unset($_SESSION['verify_cus_username']);

            }


          }else{
            echo 'otp not match';

          }


        }else{
        echo 'verify num row  not found and not run';

        }
      }else{
        echo 'verify not run';
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


<div class="container bg-light mb-4">
<img class="mb-4 d-block " src="<?php echo 'ecom-admin/uploaded_img/' . $website_logo ?>" alt="" width="100vw" height="100vh">
  
                We have sent an otp on your email. Please verify your email

                <!-- <?php echo $otp_func_run_starts; ?> -->

              </div>

              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <div class="container">
           
              <div class="form-control pt-2 mb-4 pb-4">
                <input class="form-control mb-4 pb-4 mt-2" type="number" name="otp_inp" placeholder="Your otp">
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