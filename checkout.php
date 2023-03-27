<?php
$active_class = 'checkout';
include("inc/_header.php");

include("inc/_navbar.php");

include("inc/functions.php");
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


            ?>

     
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>

                <div class="col-12">
                  <label for="username" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" placeholder="Username" required>
                    <div class="invalid-feedback">
                      Your username is required.
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                  <input type="email" class="form-control" id="email" placeholder="you@example.com">
                  <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                  </div>
                </div>

                <div class="col-12">
                  <label for="username" class="form-label">Phone no</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="phone_no" placeholder="Phone no" required>
                    <div class="invalid-feedback">
                      Phone no is required.
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                  <div class="invalid-feedback">
                    Please enter your shipping address.
                  </div>
                </div>

                <div class="col-12">
                  <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                  <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="col-md-5">
                  <label for="country" class="form-label">Country</label>
                  <select class="form-select" id="country" required>
                    <option value="">Choose...</option>
                    <option>United States</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="state" class="form-label">State</label>
                  <select class="form-select" id="state" required>
                    <option value="">Choose...</option>
                    <option>California</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="same-address">
                <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info">
                <label class="form-check-label" for="save-info">Save this information for next time</label>
              </div>

              <hr class="my-4">

              <h4 class="mb-3">Payment</h4>

              <div class="my-3">
                <div class="form-check">
                  <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                  <label class="form-check-label" for="credit">Credit card</label>
                </div>
                <div class="form-check">
                  <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                  <label class="form-check-label" for="debit">Debit card</label>
                </div>
                <div class="form-check">
                  <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                  <label class="form-check-label" for="paypal">PayPal</label>
                </div>
              </div>

              <div class="row gy-3">
                <div class="col-md-6">
                  <label for="cc-name" class="form-label">Name on card</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                  <div class="invalid-feedback">
                    Name on card is required
                  </div>
                </div>

                <div class="col-md-6">
                  <label for="cc-number" class="form-label">Credit card number</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Credit card number is required
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="cc-expiration" class="form-label">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    Expiration date required
                  </div>
                </div>

                <div class="col-md-3">
                  <label for="cc-cvv" class="form-label">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Security code required
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </form>
          </div>
        </div>
      </main>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–<?php echo date("Y") . ' ' . $website_name ?></p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="privacy-policy.html">Privacy</a></li>
          <li class="list-inline-item"><a href="termsofservice.html">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/checkout.js"></script>
  </body>

  </html>
<?php } ?>