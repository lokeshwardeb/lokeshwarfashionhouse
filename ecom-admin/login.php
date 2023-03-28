<?php
// session_start();
// $_SESSION['loggedin'] = false;
// this variable is to make activate the active class
$active_class = 'login';
include "inc/conn.php";



// include "inc/_company_info.php";

include "inc/_header.php";
// include("inc/functions.php");
if(isset($_SESSION['username'])){
    header("location: home.php");
  }
  else{




// include "inc/_navbar.php";

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
</style>





<body class="login">
  <div id="preloader"></div>
  <div class="container title-bar  mt-4" id="orderSec">

    <div class="text-center">

      <?php
include  "inc/functions.php";

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

                  header("location: home.php");
                  // die("hi");
                } else {
                  // $_SESSION['loggedin'] = false;
                preloader_include();
                 echo(login_password_not_matched()) ;
                }
              }
            } else {
              preloader_include();
              echo(login_user_doesnot_exist());
            }
          } else {

           preloader_include();

            echo(login_user_password_blank());
            // exit();
          }




          // echo 'this is the verify' . $verify;
        } else {
          preloader_include();
          echo(login_defficulties_error());
        }
      }



      ?>


      <main class="form-signin">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <img class="mb-4 " src="<?php echo 'uploaded_img/' . $website_logo ?>" alt="" width="100vw" height="100vh">
          <h1 class="h3 mb-3 fw-normal">ADMIN PANEL</h1>
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
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

          <p class="mt-5 mb-3 text-muted ">© All rights are reserved by <?php echo $website_name ?>. || 2022 - <?php echo date('Y') ?></p>
        </form>
      </main>





    </div>

  </div>



  </main>



  <?php

  // include "inc/_footer.php";


  // ?>


</body>




<?php

include "inc/_footer.php";
}

?>