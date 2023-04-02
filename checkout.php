<?php
$active_class = 'checkout';
include("inc/_header.php");

include("inc/functions.php");
include("inc/const.php");
include("inc/_navbar.php");

include("inc/conn.php");
include("inc/_company_info.php");

if (!isset($_SESSION['cart'][0])) {
  echo "
  <script>window.location.href = 'index.php'</script>
  ";
} else {



?>
       <?php
       $promo_discount = 0;
            if (isset($_POST["redeem_promo_code"])) {
              $check_promo_code = $_POST['check_promo_code'];

              $sql_check_promo_code = "SELECT * FROM `products` WHERE `promo_code` = '$check_promo_code'";

              $result_check_promo_code = mysqli_query($conn, $sql_check_promo_code);
              if ($result_check_promo_code) {
                $validated_promo_code = $check_promo_code;
                while ($row = mysqli_fetch_assoc($result_check_promo_code)) {
        
                  $promo_discount =  $row["promo_code_discount"];
                }
              } else {
                echo 'it not runs';
              }
            }


            ?>


  <style>
    /* body{
        background-color: green !important;
      } */
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="checkout.css" rel="stylesheet">
  </head>

  <body>

    <div class="container mt-4">
      <main>


        <div class="row g-5">
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Your cart</span>
              <span class="badge bg-primary rounded-pill"><?php echo count($_SESSION['cart'])  ?></span>
            </h4>
            <ul class="list-group mb-3">

              <?php

              $total = 0;
              foreach ($_SESSION['cart'] as $key => $value) {


                echo '      
                <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0 d-flex">' .  $value['product_name'] . '</h6>
                <small class="text-muted">' . $value['product_desc'] . '</small>
                </div>
                <span class="text-muted">' . product_currency_bdt() . $value['product_price'] . '</span>
              </li>
                ';
                $total = $total + $value['product_price'];
              }


              ?>



              <li class="list-group-item d-flex justify-content-between d-none bg-light" id="showPromoCode">
                <div class="text-success">
                  <h6 class="my-0">Promo code</h6>
                  <small>
<?php echo $validated_promo_code ?>
                  </small>
                </div>
                <span class="text-success"><?php
                
                if($promo_discount > 0 && $promo_discount < $total){
                  echo '−' . product_currency_bdt(). $promo_discount ;
                
                }else{
                  $invalid_promo_code = 1;
                  echo ' <span class="text-danger">invalid promo code</span>';
                }
                
                
                
                ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong><?php
                
                
                // echo product_currency_bdt() . $total = $total - $promo_discount ;
                if($invalid_promo_code == 1){
                  echo product_currency_bdt() . $total;

                }else{
                echo product_currency_bdt() . $total = $total - $promo_discount ;

                }
                
                
                ?></strong>
              </li>
            </ul>

            <form class="card p-2" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code" name="check_promo_code">
                <button type="submit" class="btn btn-secondary" name="redeem_promo_code">Redeem</button>
              </div>
            </form>
            <?php
            if (isset($_POST["redeem_promo_code"])) {
              $check_promo_code = $_POST['check_promo_code'];

              foreach ($_SESSION['cart'] as $key => $value) {
               $product_name = $value['product_name'];
                $_SESSION['cart'][''];

                $sql_check_promo_code = "SELECT * FROM `products` WHERE `promo_code` = '$check_promo_code'";
                // $sql_check_promo_code = "SELECT * FROM `products` WHERE `product_id` = '$product_name' AND `promo_code` = 'LOKFASHOU153172'";
  
                $result_check_promo_code = mysqli_query($conn, $sql_check_promo_code);
                if ($result_check_promo_code) {
                  $validated_promo_code = $check_promo_code;
                  while ($row = mysqli_fetch_assoc($result_check_promo_code)) {
                    echo '
                    
                    <script>
                    let showPromoCodeSection =  document.getElementById("showPromoCode");
  
                    showPromoCodeSection.classList.remove("d-none");
                    </script>
                    
                    ';
                   
                  }
                } else {
                  echo 'it not runs';
                }
              }
              
             
            } 
            // $website_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['website_name']), ENT_QUOTES);

            $_SESSION['continue_checkout_status'] = 0;


            if(isset($_POST['place_order'])){
              $first_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['first_name']), ENT_QUOTES);
              $last_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['last_name']), ENT_QUOTES);
              $order_username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']), ENT_QUOTES);
              $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']), ENT_QUOTES);
              $phone_no = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['phone_no']), ENT_QUOTES);
              $address1 = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['address1']), ENT_QUOTES);
              $address2 = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['address2']), ENT_QUOTES);
              $country = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['country']), ENT_QUOTES);
              $state = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['state']), ENT_QUOTES);
              $zip_code = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['zip_code']), ENT_QUOTES);
              $paymentMethod = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['paymentMethod']), ENT_QUOTES);
if(!isset($_SESSION['cus_username'])){
  echo '
  <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  ';
}


              // $sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$order_username'";

              // $result = mysqli_query($conn, $sql);

              // if($result){
              //   if(mysqli_num_rows($result) > 0){

              //   }else{
              //     // $_SESSION['continue_checkout_status'] = 1;
              //     echo '
              //     <script>window.location.href= "sign_up.php"</script>
              //    ';
              //     // header("location: login.php");
              //   // echo '<script>alert("this is alert")</script>';
              //   }
              //   // unset($_SESSION['continue_checkout_status']);
              // }





              

            }
echo 'the first name is' . $first_name;
            ?>

     
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="first_name">
                  <div class="invalid-feedback">
                    Valid first name is redquired.
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="last_name">
                  <div class="invalid-feedback">
                    Valid last name is redquired.
                  </div>
                </div>

                <div class="col-12">
                  <label for="username" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" placeholder="Username" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="username">
                    <div class="invalid-feedback">
                      Your username is redquired.
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                  <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>

                <div class="col-12">
                  <label for="username" class="form-label">Phone no</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="phone_no" placeholder="Phone no" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="phone_no">
                    <div class="invalid-feedback">
                      Phone no is rdfdequireds.
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="address1">
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>

                <div class="col-12">
                  <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                  <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" name="address2">
                </div>

                <div class="col-md-5">
                  <label for="country" class="form-label">Country</label>
                  <select class="form-select" id="country" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="country">
                    <option value="" >Choose...</option>
                    <option value= "bangladesh">Bangladesh</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="state" class="form-label">State</label>
                  <select class="form-select" id="state" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="state">
                    <option value="">Choose...</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Cumilla">Cumilla</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="zip" placeholder="" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?> name="zip_code">
                  <div class="invalid-feedback">
                    Zip code <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>.
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="same-address" name="same_address">
                <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info" name="save_info">
                <label class="form-check-label" for="save-info">Save this information for next time</label>
              </div>

              <hr class="my-4">

              <h4 class="mb-3">Payment</h4>

              <div class="my-3">
                <div class="form-check">
                  <input id="cod" name="paymentMethod" value="cash_on_delivary" type="radio" class="form-check-input" checked <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <label class="form-check-label" for="cod">Cash on delivary</label>
                </div>
                <div class="form-check">
                  <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <label class="form-check-label" for="credit">Credit card</label>
                </div>
                <div class="form-check">
                  <input id="debit" name="paymentMethod" type="radio" class="form-check-input" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <label class="form-check-label" for="debit">Debit card</label>
                </div>
                <div class="form-check">
                  <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <label class="form-check-label" for="paypal">PayPal</label>
                </div>
              </div>

              <div class="row gy-3">
                <div class="col-md-6">
                  <label for="cc-name" class="form-label">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="cc-number" class="form-label">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <div class="invalid-feedback">
                    Credit card number is <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="cc-expiration" class="form-label">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <div class="invalid-feedback">
                    Expiration date <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="cc-cvv" class="form-label">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>>
                  <div class="invalid-feedback">
                    Security code <?php if(isset($_SESSION['cus_username'])){echo 'required';} ?>
                  </div>
                </div>
              </div>

              <hr class="my-4">

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php 
        // include("login.php");
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
  
                    echo "
                    <script>
                    // JavaScript anonymous function
                    (() => {
                        if (window.localStorage) {
              
                            // If there is no item as 'reload'
                            // in localstorage then create one &
                            // reload the page
                            if (!localStorage.getItem('reload')) {
                                localStorage['reload'] = true;
                                window.location.reload();
                            } else {
              
                                // If there exists a 'reload' item
                                // then clear the 'reload' item in
                                // local storage
                                localStorage.removeItem('reload');
                            }
                        }
                    })(); // Calling anonymous function here only
                 
                    </script>
                   ";
                    // header("location: index.php");
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
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <!-- <img class="mb-4 " src="<?php echo 'ecom-admin/uploaded_img/' . $website_logo ?>" alt="" width="100vw" height="100vh"> -->
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" >Understood</button>
      </div>
    </div>
  </div>
</div>

<?php if(isset($_SESSION['cus_username'])){
  echo '
  
  <button class="w-100 btn btn-primary btn-lg" type="submit" name="place_order" data-bs-toggle="modal" data-bs-target="#check_username">Continue to checkout</button>
  ';
}else{





?>
<button type="button" class="btn btn-primary w-100 btn-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
  Continue to checkout
</button>
<?php } ?>
            </form>
          </div>
        </div>
      </main>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–<?php echo date("Y") . ' ' . $website_name ?></p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="privacy-policy.php">Privacy</a></li>
          <li class="list-inline-item"><a href="termsofservice.php">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/checkout.js"></script>
  </body>

  </html>
<?php } ?>