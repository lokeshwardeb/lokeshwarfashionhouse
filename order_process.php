<?php 

$active_class = 'checkout';
include("inc/_header.php");

include("inc/conn.php");

include("inc/functions.php");
include("inc/const.php");
include("inc/_navbar.php");

include("inc/conn.php");
include("inc/_company_info.php");
// require "inc/sent-mail.php";

$_SESSION['generate_invoice'] = 0;

if(!isset($_POST['place_order'])){
  echo "
  <script>window.location.href = 'index.php'</script>
  ";
}


if (!isset($_SESSION['cart'][0])) {
  echo "
  <script>window.location.href = 'index.php'</script>
  ";
} else {



if (isset($_POST['place_order'])) {
    $first_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['first_name']), ENT_QUOTES);
    $last_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['last_name']), ENT_QUOTES);
    $order_username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']), ENT_QUOTES);
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']), ENT_QUOTES);
    $order_customer_phone_no = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['order_customer_phone_no']), ENT_QUOTES);
    $address1 = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['address1']), ENT_QUOTES);
    $address2 = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['address2']), ENT_QUOTES);
    $country = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['country']), ENT_QUOTES);
    $district_state = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['state']), ENT_QUOTES);
    $zip_code = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['zip_code']), ENT_QUOTES);
    $paymentMethod = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['paymentMethod']), ENT_QUOTES);
    $upazila = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['upazila']), ENT_QUOTES);


$ordering_username = $_SESSION['cus_username'];
    // $sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$order_username'";
    $sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$ordering_username'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          $cus_id = $row['cus_id'];
        }


        $sql_customer = "SELECT * FROM `customers` WHERE `cus_id` = '$cus_id'";
        $result_customer = mysqli_query($conn, $sql_customer);

        if ($result_customer) {
          while ($row = mysqli_fetch_assoc($result_customer)) {
            $customer_id = $row['customer_id'];
          }
          $sql_select_order_sql = "SELECT * FROM `orders`";
          $result_order_select = mysqli_query($conn, $sql_select_order_sql);
          if ($result_order_select) {
            while ($row = mysqli_fetch_assoc($result_order_select)) {
              $order_unique_id = $row['id'];
            }
          }
          $unique_id = $order_unique_id + 1;
          $rand_no = rand(1111, 9999);

          $last_id = mysqli_insert_id($conn);

          $order_no = "#lokfa" . date("dmY") . $rand_no . $order_unique_id;
          // $order_no = '#loke1254545';
          $create_date = date_create(date("d-m-Y")) ;
          date_add($create_date, date_interval_create_from_date_string("7 days"));
          $est_delivary_date = date_format($create_date, "d-m-Y");
          $order_address = $address1 . ', ' . $upazila . '-' . $district_state . '-' . $zip_code . ', ' . $country;


          $sele_ord_sql = "SELECT * FROM `orders` WHERE `order_no` = '$order_no'";
          $sele_ord_result = mysqli_query($conn, $sele_ord_sql);
          while ($row = mysqli_fetch_assoc($sele_ord_result)) {
            $order_id = $row['id'];
          }

          $total = 0;
          foreach ($_SESSION['cart'] as $key => $value) {
            $product_id =  $value['product_id'];

            $product_price = $value['product_price'];

            $product_qty = $value['product_qty'];
            $total = $total + $value["product_price"];

            

            if ($place_order_result) {
            //   echo 'order placed';
            }
            $place_order_customer_sql = "INSERT INTO `order_customers` (`cus_id`, `order_no`, `customer_firstname`, `customer_lastname`) VALUES ('$customer_id', '$order_no', '$first_name', '$last_name');";

            $place_order_customer_result = mysqli_query($conn, $place_order_customer_sql);

            if ($place_order_customer_result) {
            //   echo 'order placed';
            }
            $product_id =  $value["product_id"];

            $product_price = $value['product_price'];

            $product_qty = $value['product_qty'];
            

            $sql_order_product_sql  = "INSERT INTO `order_products` (`orders_id`, `product_id`, `product_qty`, `customer_id_on_order`) VALUES ('$order_no', '$product_id', '$product_qty', '$customer_id');";

            $result_order_product_sql = mysqli_query($conn, $sql_order_product_sql);
          }

            if ($result_order_product_sql) {
            //   echo 'order placed with product';
            echo order_placed_success();

          //   echo '
          //   <div class= "container   mb-4 pb-4">
          //   <div class="container order_details_info page mt-4 pt-4 pb-4">
          //   Thanks for your order. Here is details information about your product. Please keep in mind that the order no is very important to track the order and get info about this. It is also nessary for future. So, Please save the order no for future usage. <br>
          //   Order No: <b>'.$order_no.'</b> <br>
          //   Phone No: <b>'.$order_customer_phone_no.'</b> <br>
          //   Estimated delivary date: '.$est_delivary_date.'


            
          //   </div>
          //   <a href="order_invoice_pdf.php"><button class = "btn btn-primary">Download Invoice</button></a>
          // <a href="cus_dashboard/cus_orders.php"><button class = "btn btn-primary">Go to my orders</button></a>
          //   </div>
            
          //   ';
            
              
              
            }else{
                echo order_placed_error();
            }
      
           $product_total_price =  $_SESSION['product_total_price'];
          

          $place_order_sql = "INSERT INTO `orders` (`id`, `order_no`, `product_id`, `order_phone_no`, `order_email`,`customer_id_on_order`, `order_est_delivery_datetime`, `order_shipping_address`, `payment_method`, `order_status`,  `total_amount`) VALUES (NULL, '$order_no', '$product_id', '$order_customer_phone_no', '$email', '$customer_id', '$est_delivary_date', '$order_address','cod', 'pending', '$product_total_price');";

            $place_order_result = mysqli_query($conn, $place_order_sql);

          // foreach($_SESSION['cart'] as $key => $value){

            
          //   unset($_SESSION['cart']);
          // }

          // if($place_order_result){
      
          // }

          if($place_order_result){
            include "inc/sent-mail.php";
            require_once "inc/sent_mail_template_inc.php";
            $order_phone_no = $order_customer_phone_no;


            
     
             $order_no;
            $customer_name = $first_name . ' ' . $last_name;
         $order_customer_phone_no;
       $email;
            
            // $_SESSION['generate_invoice'] = 1;
            // $_SESSION['gi_order_no'] = $order_no;
            // $_SESSION['gi_customer_name'] = $first_name . ' ' . $last_name;
            // $_SESSION['gi_phone_no'] = $order_customer_phone_no;
            // $_SESSION['gi_customer_email'] = $email;

                  // code for email send to customer for placing order

                  // sent_mail("Lokeshwar Fashion House", $email, $first_name . ' ' . $last_name, "Order Placed Successfully", mail_template("", "order_placed", $ordering_username, $order_no , $order_phone_no,), "Your order Has been placed check your email $email for details");


                  

                  // code for making and generating order invoice

                  // generate_invoice = 1 means the process started and 0 means it is not started

                  // usued the form to post and send the data.

                  unset($_SESSION['product_total_price']);

                  unset($_SESSION['cart'][0]);

            echo '
            <form action="order_invoice_pdf.php" method="post">
              <input type="hidden" name="down_ord_in_order_no" value="'.$order_no.'">
              <input type="hidden" name="down_ord_in_customer_name" value="'.$customer_name.'">
              <input type="hidden" name="down_ord_in_phone_no" value="'.$order_customer_phone_no.'">
              <input type="hidden" name="down_ord_in_email" value="'.$email.'">
              <input type="hidden" name="down_ord_in_shipping_address" value="'.$order_address.'">
           
           
            ';

            echo '
            <div class= "container   mb-4 pb-4">
            <div class="container order_details_info page mt-4 pt-4 pb-4">
            Thanks for your order. Here is details information about your product. Please keep in mind that the order no is very important to track the order and get info about this. It is also nessary for future. So, Please save the order no for future usage. <br>
            Order No: <b>'.$order_no.'</b> <br>
            Phone No: <b>'.$order_customer_phone_no.'</b> <br>
            Estimated delivary date: '.$est_delivary_date.'


            
            </div>
            
            <button type="submit" name="download_order_invoice" class = "btn btn-primary">Download</button>
            <a href="cus_dashboard/cus_orders.php"><input class = "btn btn-primary" type= "button" value="Go to my orders"></input></a>
           
            </div>
            </form>
            ';

            



                  // unset($_SESSION['cart'][0]);
            
            header("location: index.php");
          }else{
            echo 'order place error on placing order';
          }
        
         
        //   echo '
        //   <script>window.location.href= "sign_up.php"</script>
        //  ';
        
        }
      } else {
        // $_SESSION['continue_checkout_status'] = 1;
        echo '
        <script>window.location.href= "sign_up.php"</script>
       ';
        // header("location: login.php");
        // echo '<script>alert("this is alert")</script>';
      }
      // unset($_SESSION['continue_checkout_status']);
    }
  }else{
    echo 'not isset runs';
  }




}
