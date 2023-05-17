<?php
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


?>



<style>
          #otp-input::placeholder {
            text-align: center !important;

          }
        </style>
        <div class="container <?php
                              if ($otp_func_run_starts == 1) {
                                echo 'd-flex';
                              } else {
                                echo 'd-none';
                              }

                              ?>">
          <form action="" method="post">
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
