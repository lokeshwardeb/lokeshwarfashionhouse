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
          $hash = password_hash($cus_pass, PASSWORD_DEFAULT);

          $hash_verify = password_verify($pass, $hash);

          if (mysqli_num_rows($result) == 1 ) {

           echo signup_username_exist_error();




            // echo 'this is the verify' . $verify;
          } else {
            if ($cus_pass !== '') {

              $sql = "INSERT INTO `cus_users` ( `cus_username`,  `cus_email`, `cus_phone_no`, `cus_pass`, `cus_photo`, `cus_address`, `cus_joined_datatime`) VALUES ('$cus_username',  '$cus_email', '$cus_phone_no', '$hash', '$cus_photo', '$cus_address', current_timestamp());";

              $result = mysqli_query($conn, $sql);

              if ($result) {
                if(move_uploaded_file($cus_photo_tmp, $cus_photo_upload)){

                  echo signup_success();
                }else{
                  echo 'cannot uploaded teh img';
                }
              } else {
              echo signup_error();
              }
            } elseif($cus_pass == '') {

              preloader_include();

              echo (login_user_password_blank());
              // exit();
            }

            else{
              preloader_include();
              echo (signup_defficulties_error());
            }
            
          }
        }else{
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
            <span><a href="index.php" id="forgotPassword"> <input type="button" value="Go home" class="btn btn-primary">  </a></span>
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