<?php
include "inc/conn.php";
$active_class = 'orders';
include "inc/_header.php";
if (!isset($_SESSION['username'])) {
    header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

    // exit;

} elseif (isset($_SESSION['username'])) {


    include "inc/_navbar.php";
// include "../inc/functions.php";
    // include "../inc/const.php";

?>

    <div class="container full-width title_bar mt-4">
        <?php

        include "inc/_title_bar.php";



        ?>

        <?php

        $search_class = 'orders';

        include "inc/_search.php";
        include("inc/functions.php");

        include("inc/_theme.php");


        $get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['id']), ENT_QUOTES);
        // echo $get_id;
        // $product_last_checked_in_datetime = date("d-m-Y h:i:s:a");
        $time_now = date("d-m-Y h:i:s:a");


        $sql = "SELECT * FROM `orders` WHERE `id` = '$get_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {


            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_no = $row['order_no'];
                    $order_id = $row['id'];
                    $product_id_on_order = $row['product_id'];
                    $orders_quantity = $row['orders_quantity'];
                    $customer_id_on_order = $row['customer_id_on_order'];
                    $order_status = $row['order_status'];
                    $order_phone_no = $row['order_phone_no'];
                    $order_email = $row['order_email'];
                    $order_shipping_address = $row['order_shipping_address'];
                    $order_placed_datetime = $row['order_placed_datetime'];
                    $order_delivered_datetime = $row['order_delivered_datetime'];
                    $order_payment_method = $row['payment_method'];
                    $order_payment_status = $row['payment_status'];
                    $product_last_checked_in = $row['product_last_checked_in'];
                    $product_last_checked_in_datetime = $row['product_last_checked_in_datetime'];
                    $cancel_reason = $row['cancel_reason'];
                    $check_cancel_reason = $row['cancel_reason'];
                    $total_amount = $row['total_amount'];
                    $courier_handing_status = $row['courier_handing_status'];
                    $courier_handing_desc = $row['courier_handing_desc'];
                    $order_accepting_status = $row['order_accepting_status'];
                    $order_packaging_status = $row['order_packaging_status'];
                    $order_est_delivery_datetime = $row['order_est_delivery_datetime'];
                }

                // get customer details
                $order_product_id_sql = "SELECT * FROM `customers` WHERE `customer_id` = '$customer_id_on_order'";
                $result = mysqli_query($conn, $order_product_id_sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $customer_id = $row['customer_id'];
                        $customer_name = $row['customer_name'];
                        $customer_email = $row['customer_email'];
                        $customer_phone_no = $row['customer_phone_no'];
                        $customer_address = $row['customer_address'];
                    }
                }

                // products id

                // $product_id = 10;
                $order_product_id_sql = "SELECT * FROM `products` WHERE `product_id` = '$product_id_on_order'";
                $result = mysqli_query($conn, $order_product_id_sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $product_desc = $row['product_desc'];
                        $product_img = $row['product_img'];
                        $product_price = $row['product_price'];
                        $product_status = $row['product_status'];
                        $product_added_datetime = $row['product_added_datetime'];
                    }
                }

                if ($product_img == '') {
                    $product_img = 'nature-sea.jpg';
                }
                $order_customer_sql = "SELECT * FROM `order_customers` WHERE `cus_id` = '$customer_id' AND `order_no` = '$order_no'";
                $order_customer_result = mysqli_query($conn, $order_customer_sql);
                
                while($row = mysqli_fetch_assoc($order_customer_result)){
                    $order_customer_firstname = $row['customer_firstname'];
                    $order_customer_lastname = $row['customer_lastname'];
                }
                

                if (isset($_POST['save_changes'])) {
                    // $id = $row['id'];
                    $product_last_checked_in = htmlspecialchars(mysqli_real_escape_string($conn,  $_POST['product_last_checked_in']), ENT_QUOTES);
                    $time_now = date("d-m-Y h:i:s:a");

                    $product_last_checked_in_datetime_input = $_POST['product_last_checked_in_datetime_input'];

                    $courier_handing_desc = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['courier_handing_desc']));
                    $order_packaging_status_input = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['order_packaging_status_input']));
                    $order_est_delivery_datetime_input = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['order_est_delivery_datetime_input']));

                    //  echo 'the verify is ' . $verify = password_verify($password, $hash);



                    $order_status = mysqli_real_escape_string($conn, $_POST['order_status']);

                    $order_payment_status = mysqli_real_escape_string($conn, $_POST['payment_status']);
                    $cancel_reason = $_POST['cancel_reason'];

                    // $active_current_time = $_POST['active_current_time'];
                    // $time = $_POST['this_time'];


                    $sql = "SELECT * FROM `orders`";


                    // if the database is empty then insert the data into the table

                    $result = mysqli_query($conn, $sql);

                    // check if the password and cpassword are same
                    if ($result) {
                        // if there any data contains on the db
                        if (mysqli_num_rows($result) > 0) {

                            // if ($product_last_checked_in_datetime_input !== '') {

                            // }
                            // if ($product_last_checked_in_datetime_input == '') {

                            // }

                            if(filter_has_var(INPUT_POST, 'order_packaging_status')){
                                if($order_packaging_status_input == ''){
                                    $order_packaging_status_sql = "UPDATE `orders` SET `order_packaging_status` = 'packaging has started' WHERE `orders`.`id` = '$order_id';";
                                    $order_packaging_status_result = mysqli_query($conn, $order_packaging_status_sql);
                                    if($order_packaging_status_result){
                                        update_success_message();
                                    }else{
                                        update_error_message();
                                    }
                                }else{
                                    $order_packaging_status_sql = "UPDATE `orders` SET `order_packaging_status` = '$order_packaging_status_input' WHERE `orders`.`id` = '$order_id';";
                                    $order_packaging_status_result = mysqli_query($conn, $order_packaging_status_sql);
                                    if($order_packaging_status_result){
                                        update_success_message();
                                    }else{
                                        update_error_message();
                                    }
                                }
                               
                            }else{
                                $order_packaging_status_sql = "UPDATE `orders` SET `order_packaging_status` = '' WHERE `orders`.`id` = '$order_id';";
                                $order_packaging_status_result = mysqli_query($conn, $order_packaging_status_sql);
                                if($order_packaging_status_result){
                                    update_success_message();
                                }else{
                                    update_error_message();
                                }
                            }


                            if (filter_has_var(INPUT_POST, 'product_handed_on_courier')) {
                                $handed_on_courier_status_sql = "UPDATE `orders` SET `courier_handing_status` = 'handed on courier', `courier_handing_desc` = '$courier_handing_desc' WHERE `orders`.`id` = '$order_id';";

                                $handed_on_courier_status_result = mysqli_query($conn, $handed_on_courier_status_sql);

                                if ($handed_on_courier_status_result) {
                                    update_success_message();
                                } else {
                                    update_error_message();
                                }
                            } else {
                                $handed_on_courier_status_sql = "UPDATE `orders` SET `courier_handing_status` = '', `courier_handing_desc` = '' WHERE `orders`.`id` = '$order_id';";

                                $handed_on_courier_status_result = mysqli_query($conn, $handed_on_courier_status_sql);

                                if ($handed_on_courier_status_result) {
                                    update_success_message();
                                } else {
                                    update_error_message();
                                }
                            }



                            if (filter_has_var(INPUT_POST, 'this_time')) {

                                if ($order_status == 'In-process') {
                                    $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input', `product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$time_now', `order_status` = '$order_status', `cancel_reason` = 'order_In-process' WHERE `orders`.`id` = $order_id";

                                    $order_update_result = mysqli_query($conn, $order_update_sql);

                                    if ($order_update_result) {
                                        update_success_message();
                                    } else {
                                        update_error_message();
                                    }
                                }
                                if ($order_status == 'completed') {
                                    $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input', `product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$time_now', `order_status` = '$order_status', `cancel_reason` = 'order_completed' WHERE `orders`.`id` = $order_id";

                                    $order_update_result = mysqli_query($conn, $order_update_sql);

                                    if ($order_update_result) {
                                        update_success_message();
                                    } else {
                                        update_error_message();
                                    }
                                }
                                if ($order_status == 'cancelled') {
                                    $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$time_now', `order_status` = '$order_status', `cancel_reason` = '$cancel_reason' WHERE `orders`.`id` = $order_id";

                                    $order_update_result = mysqli_query($conn, $order_update_sql);

                                    if ($order_update_result) {
                                        update_success_message();
                                    } else {
                                        update_error_message();
                                    }
                                }
                                if ($check_cancel_reason == '') {
                                    $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$product_last_checked_in_datetime_input', `order_status` = '$order_status', `cancel_reason` = 'order_$order_status' WHERE `orders`.`id` = $order_id";

                                    $order_update_result = mysqli_query($conn, $order_update_sql);

                                    if ($order_update_result) {
                                        update_success_message();
                                    } else {
                                        update_error_message();
                                    }
                                }
                            } else {


                                if ($product_last_checked_in_datetime_input == '') {

                                    if ($order_status == 'In-process') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$time_now', `order_status` = '$order_status', `cancel_reason` = 'order_In-process'  WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }
                                    if ($order_status == 'completed') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$time_now', `order_status` = '$order_status', `cancel_reason` = 'order_completed'  WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }
                                    if ($order_status == 'cancelled') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$time_now', `order_status` = '$order_status', `cancel_reason` = '$cancel_reason'  WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }
                                    if ($check_cancel_reason == '') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$product_last_checked_in_datetime_input', `order_status` = '$order_status', `cancel_reason` = 'order_$order_status' WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }
                                } else {
                                    if ($order_status == 'In-process') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$product_last_checked_in_datetime_input', `order_status` = '$order_status', `cancel_reason` = 'order_In-process' WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }
                                    if ($order_status == 'completed') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$product_last_checked_in_datetime_input', `order_status` = '$order_status', `cancel_reason` = 'order_completed' WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }
                                    if ($order_status == 'cancelled') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$product_last_checked_in_datetime_input', `order_status` = '$order_status', `cancel_reason` = '$cancel_reason' WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }

                                    if ($check_cancel_reason == '') {
                                        $order_update_sql = "UPDATE `orders` SET `payment_status` = '$order_payment_status', `order_est_delivery_datetime` = '$order_est_delivery_datetime_input',`product_last_checked_in` = '$product_last_checked_in', `product_last_checked_in_datetime` = '$product_last_checked_in_datetime_input', `order_status` = '$order_status', `cancel_reason` = 'order_$order_status' WHERE `orders`.`id` = $order_id";

                                        $order_update_result = mysqli_query($conn, $order_update_sql);

                                        if ($order_update_result) {
                                            update_success_message();
                                        } else {
                                            update_error_message();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }




                if ($order_accepting_status == '') {
                    echo '<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">New order ! Well done!</h4>
    <p>Aww yeah, you successfully read this important alert message. This is a new order from your site. A customer has recently placed an order with the products.</p>
    <hr>
    <p class="mb-0">Do you accept the order ? If you accept the order then click on I accept the order button or else click on cancell the order.</p>
    <form action = "" method = "post">
    <div class = "row mt-2 mb-4">
    <div class = "col-6"><button class = "btn btn-primary btn-sm" name= "order_accepted_submit">I accept the order</button></div>
    <div class = "col-6"><button class = "btn btn-danger btn-sm" name= "order_cancelled_submit">Cancel the order</button></div>
    </div>
    </form>
  </div>';
                }

                if (isset($_POST['order_accepted_submit'])) {
                    $sql_order_accepted = "UPDATE `orders` SET `order_accepting_status` = 'order accepted', `order_status` = 'In-process', `cancel_reason` = '' WHERE `orders`.`id` = '$order_id';";
                    $result_order_accepted = mysqli_query($conn, $sql_order_accepted);
                    if ($result) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Order accepted!</strong> Your order is accepted and you should start your order processing.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
                    }
                }
                if (isset($_POST['order_cancelled_submit'])) {
                    $sql_order_cancelled = "UPDATE `orders` SET `order_accepting_status` = 'not accepted by admin', `order_status` = 'cancelled', `cancel_reason` = 'not accepted by admin' WHERE `orders`.`id` = '$order_id';";
                    $result_order_cancelled = mysqli_query($conn, $sql_order_cancelled);
                    if ($result) {

                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Order cancelled!</strong> Your order is cancelled and you have cancelled the order.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
                    }
                }


                echo '
        
                <div class="row">
                <div class="col-6 page mb-4 pt-4 container">
                <a href = "orders.php" class="mb-4"><button class = "btn btn-primary mb-4">Go to orders</button></a><br>
                    Order No: <b> ' . $order_no . ' </b> <br>';
                
                
                
                //     $product_get_sql = ""
                
                    
                // while($row = mysqli_fetch_assoc())
                    echo '
                    
                
                    User Name: ' . $customer_name . ' <br>
                    User Email: ' . $customer_email . ' <br>
                    User Phone: ' . $customer_phone_no . ' <br>
                    User Address: ' . $customer_address . ' <br>
                    Order Customer Name: ' . $order_customer_firstname . ' ' . $order_customer_lastname . ' <br>
                    Order phone no Address: ' . $order_phone_no . ' <br>
                    Order email Address: ' . $order_email . ' <br>
                    
                    Ordered placed on : ' . $order_placed_datetime . ' <br>
                    Ordered delivered on : ' . $order_delivered_datetime . ' <br>
                    current time is : ' . $product_last_checked_in_datetime . '<br>
                    Payment Method: ' . $order_payment_method . ' <br>
                    Product last checked in : ' . ucfirst($product_last_checked_in)  . ' <br>
                    Product last checked in datetime: ' . $product_last_checked_in_datetime . ' <br>
                    <div class = "fs-5">  Payment Status: '; ?><span class="<?php
                                                                            if ($order_payment_status == "paid") {
                                                                                echo 'text-success ';
                                                                            }
                                                                            if ($order_payment_status == "unpaid") {
                                                                                echo 'text-danger';
                                                                            }
                
                
                
                                                                            ?>"><?php echo '' . ucfirst($order_payment_status)  . ' </span> </div> <br>
                    Order Shipping Address: ' . $order_shipping_address . ' <br>
                    
                  
                   <div class = ""> Product Status: '; ?><span class="<?php
                                                                        if ($product_status == "In-stock") {
                                                                            echo 'text-success';
                                                                        }
                                                                        if ($product_status == "Out-stock") {
                                                                            echo 'text-danger';
                                                                        }
                
                
                                                                        ?>"><?php echo '' . $product_status . ' </span> </div> <br>
                   <div class = "fs-5"> Order Status: '; ?><span class="<?php
                                                                        if ($order_status == "In-process") {
                                                                            echo 'text-warning bg-dark ';
                                                                        }
                                                                        if ($order_status == "completed") {
                                                                            echo 'text-success bg-dark ';
                                                                        }
                                                                        if ($order_status == "cancelled") {
                                                                            echo 'text-danger';
                                                                        }
                
                
                                                                        ?>"><?php echo '' . ucfirst($order_status)  . ' </span> </div> <br>
                
                                                                        ';?>
                                                                        <?php 
                                                                   
                                                                    if ($order_status == "cancelled") {
                                                                        echo '
                                                                        <div class ="fs-5 no-disp" id = "theCancelledResonShowDiv" >Reason for the cancelation: ' .ucfirst($cancel_reason)  . ' </div><br><br>';
                                                                    }   
                                                                        echo '
                
                    Product Added Datetime: ' . $product_added_datetime . ' <br><br>
                
                </div>
                <div class="col-6 page mb-4 pt-4 ">
                    ';
                
                    if($order_status == 'pending'){
                echo '<img src=" '.SITE_URL.'img/fast-delivery.png"  class = "img-fluid" alt="" srcset="">
                
                <div class="fs-4">Your order is '.$order_status.' at this moment</div>
                
                ';
                
                    }
                    if($order_status == 'In-process'){
                echo '<img src=" '.SITE_URL.'img/delivery-man.png"  class = "img-fluid" alt="" srcset="">
                <div class="fs-4">Your order is '.$order_status.' at this moment</div>
                
                ';
                    }
                    if($order_status == 'completed'){
                echo '<img src=" '.SITE_URL.'img/delivery.png"  class = "img-fluid" alt="" srcset="">
                <div class="fs-4">Your order was '.$order_status.' successfully</div>
                
                ';
                    }
                
                    echo '
                    
                </div>
                
                </div>
        
        ';



                                                            ?>

                            <div class="row">
                                <div class="col-2">
                                    <button class="btn btn-dark mb-4" onclick="productEdit()">Edit</button><br>

                                </div>


                                <div class="col-10">
                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                        <button class="btn btn-danger mb-4" name="product_delete">Delete</button><br>

                                    </form>
                                    <?php



                                    ?>
                                </div>
                            </div>

                            <div class="container page border-success border-top border-5">
<table class="table table-borderless ">
              <thead>
                <tr>
                  <th scope="col" class="fs-5">Order Summary</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

                <?php
                // $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id WHERE ord_prod.orders_id = '$get_order_no';";
                $sql_ord_select = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id WHERE ord_prod.orders_id = '$order_no' ;
              ";
                // $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders as ord ON ord.order_no = ord_prod.orders_id WHERE ord_prod.orders_id = '$get_order_no' AND ord.order_no = '$get_order_no';";

                $result_ord_select = mysqli_query($conn, $sql_ord_select);
                if ($result) {
                  if (mysqli_num_rows($result_ord_select) > 0) {
                    $total_price = 0;
                    $to_pri = 0;
                    while ($row = mysqli_fetch_assoc($result_ord_select)) {
                      $qt = $row['product_qty'];
                      $pri = $row['product_price'];
                      $to_pri += $row['product_qty'] * $row['product_price'];

                      echo '
                  <tr>
                  <th scope="row"><img src="' . PRODUCT_INFO_PATH . $row["product_img"] . '" class="img-fluid" height="150px" width="150px" alt="" srcset="">  </th>
                  <td><a href="product_details_cus_disp.php?id=' . $row['product_id'] . '" class="nav-link prod_hover">' . $row["product_name"] . '</a></td>
                  <td>Price: '  . product_currency_bdt() . $per_price = $row['product_price'] . '</td>
                  <td>Qty: ' . product_currency_bdt() . $product_qty = $row['product_qty'] . '</td>
                  <td>'  . product_currency_bdt() . $total_price = $to_pri. '</td>
                </tr>
                  
                  ';
                  $total_price = 0;
                    }
                  }
                }


                ?>



              </tbody>
            </table>
            <div class="info-section border-top border-dark border-1 pt-4 pb-4">
              <div class="container text-end">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // if ($query_result_run  == 1) {
                    //   echo ' <div class="container pt-4 text-danger">
                    // Sorry,  No order was found with this order no <b> ' . $get_order_no . '</b> and this phone no <b>' . $get_order_phone_no . '</b>
                    //    </div>';
                    // }else{
                    //   echo ' <div class="container pt-4 text-danger">
                    //   Sorry,  No order was found with this order no <b> ' . $get_order_no . '</b> and this phone no <b>' . $get_order_phone_no . '</b>
                    //      </div>';
                    // }

                    ?>
                    <tr>
                      <!-- <th scope="row"></th> -->
                      <td class="col-10"><span class="text-end">Total Items:</span></td>
                      <td class="col-10"><span class=""><?php echo $qt ?>Product(s)</span></td>

                    </tr>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td class="col-10"> <span class="">Sub-Total:</span></td>
                      <td class="col-10"><?php echo product_currency_bdt() .  $to_pri; ?></td>

                    </tr>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td class="col-10"> <span>Total Price:</span></td>
                      <td class="col-10"><?php echo product_currency_bdt() .  $to_pri ?></td>

                    </tr>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td class="col-10"> <span>Payable Amount:</span></td>
                      <td class="col-10"> <?php
                                          if ($order_status == 'completed' || $order_status == 'cancelled') {
                                            echo product_currency_bdt() . 0;
                                          } else {
                                            echo product_currency_bdt() . $to_pri;
                                          }

                                          ?>
                      </td>

                    </tr>

                  </tbody>
                </table>



                <span>
                  <?php
                  if ($order_status == 'completed') {
                    echo 'Paid by: ' . strtoupper($payment_method);
                  } else {
                  }
                  ?>
                </span>
              </div>
            </div>
</div>

                            <div id="productEdit" class="no-disp">


                                <div class="container full-width">

                                </div>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Product Last Checked In</label>
                                        <div class="input-group">
                                            <input type="hidden" value="">
                                            <span class="input-group-text" id="basic-addon3">@</span>
                                            <input type="text" class="form-control" placeholder="Product Name" id="basic-url" aria-describedby="basic-addon3" name="product_last_checked_in" value="<?php echo $product_last_checked_in; ?>">
                                        </div>
                                        <div class="form-text">Example help text goes outside the input group.</div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Estmated delivery date time</label>
                                        <div class="input-group">
                                            <input type="hidden" value="">
                                            <span class="input-group-text" id="basic-addon3">@</span>
                                            <input type="text" class="form-control" placeholder="Product Name" id="basic-url" aria-describedby="basic-addon3" name="order_est_delivery_datetime_input" value="<?php echo $order_est_delivery_datetime; ?>">
                                        </div>
                                        <div class="form-text">Example help text goes outside the input group.</div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Product Last Checked In Date time</label>
                                        <div class="input-group">
                                            <input type="hidden" value="">
                                            <span class="input-group-text" id="basic-addon3">@</span>
                                            <input type="text" class="form-control" placeholder="Product Name" id="basic-url" aria-describedby="basic-addon3" name="product_last_checked_in_datetime_input" value="<?php echo $product_last_checked_in_datetime; ?>">


                                        </div>
                                        <div class="checkbox mb-3">
                                            <label>
                                                <input type="checkbox" value="<?php echo $time_now ?>" name="this_time"> Use current time
                                            </label>
                                        </div>
                                        <div class="form-text">Note: If you want to add custom time date then you can write on the box. If the box is blank then current time and date will be added as last checked in datetime. </div>

                                    </div>

                                    <div class="mb-3" id="courierDesc">
                                        <label for="basic-url" class="form-label">Order packaging has been started</label>
                                        <div class="input-group">
                                            <input type="hidden" value="">
                                            <span class="input-group-text" id="basic-addon3">@</span>
                                            <input type="text" class="form-control" placeholder="Courier handing Description" id="courierHandingDesc" aria-describedby="basic-addon3" name="order_packaging_status_input" value="<?php echo $order_packaging_status; ?>">


                                        </div>


                                        <div class="checkbox mb-3">
                                            <label>
                                                <input id="courierChecked" type="checkbox" value="<?php echo $order_packaging_status ?>" name="order_packaging_status" <?php
                                                                                                                                                        if ($order_packaging_status !== '') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        }

                                                                                                                                                        ?> >
                                                Order packaging has been started 
                                            </label>
                                        </div>
                                        <div class="form-text">Note: If you want to add custom time date then you can write on the box. If the box is blank then current time and date will be added as last checked in datetime. </div>

                                    </div>

                                    <div class="mb-3" id="courierDesc">
                                        <label for="basic-url" class="form-label">Courier handing Description</label>
                                        <div class="input-group">
                                            <input type="hidden" value="">
                                            <span class="input-group-text" id="basic-addon3">@</span>
                                            <input type="text" class="form-control" placeholder="Courier handing Description" id="courierHandingDesc" aria-describedby="basic-addon3" name="courier_handing_desc" value="<?php echo $courier_handing_desc; ?>">


                                        </div>


                                        <div class="checkbox mb-3">
                                            <label>
                                                <input id="courierChecked" type="checkbox" value="<?php echo $courier_handing_status ?>" name="product_handed_on_courier" <?php
                                                                                                                                                        if ($courier_handing_status !== '') {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        }

                                                                                                                                                        ?> >
                                                Product Courier handed on courier
                                            </label>
                                        </div>
                                        <div class="form-text">Note: If you want to add custom time date then you can write on the box. If the box is blank then current time and date will be added as last checked in datetime. </div>

                                    </div>
                                    





                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Payment Status</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon3">@</span>


                                            <select class="form-select" name="payment_status" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <!-- <option selected value="In-stock">Choose...</option> -->

                                                <option <?php

                                                        if ($order_payment_status == 'paid') {
                                                            echo 'selected';
                                                        }


                                                        ?> value="paid">Paid</option>
                                                <option <?php

                                                        if ($order_payment_status == 'unpaid') {
                                                            echo 'selected';
                                                        }


                                                        ?> value="unpaid">Unpaid</option>

                                                <!-- <option value="3">Three</option> -->
                                            </select>
                                            <!-- <button class="btn btn-outline-secondary" type="button">Button</button> -->



                                        </div>
                                        <div class="form-text">Example help text goes outside the input group.</div>
                                    </div>





                                    <div class="mb-3">
                                        <label for="basic-url" class="form-label">Order Status</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon3">@</span>


                                            <select class="form-select" name="order_status" id="orderStatus" onchange="onChangeisCancelled()" aria-label="Example select with button addon">
                                                <!-- <option selected value="In-stock">Choose...</option> -->

                                                <option <?php

                                                        if ($order_status == 'In-process') {
                                                            echo 'selected';
                                                        }


                                                        ?> value="In-process">In-process</option>
                                                <option <?php

                                                        if ($order_status == 'completed') {
                                                            echo 'selected';
                                                        }


                                                        ?> value="completed">Completed</option>
                                                <option <?php

                                                        if ($order_status == 'cancelled') {
                                                            echo 'selected';
                                                        }


                                                        ?> value="cancelled">Cancelled</option>
                                                <!-- <option value="3">Three</option> -->
                                            </select>
                                            <!-- <button class="btn btn-outline-secondary" type="button">Button</button> -->



                                        </div>
                                        <div class="form-text">Example help text goes outside the input group.</div>
                                    </div>



                                    <div class="mb-3 no-disp" id="orderCancelledReasonDiv">
                                        <label for="resonInput" class="form-label">Why the order was cancelled ? Please write the reason for cancelling the order........</label>
                                        <div class="input-group">
                                            <input type="hidden" value="">
                                            <span class="input-group-text" id="basic-addon3">@</span>

                                            <?php



                                            ?>
                                            <input type="text" class="form-control" placeholder="Reason for the cancelation" id="resonInput" aria-describedby="basic-addon3" name="cancel_reason" value="<?php

                                                                                                                                                                                                            if ($cancel_reason == 'order_In-process' || $cancel_reason == 'order_completed') {
                                                                                                                                                                                                                echo '';
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo $cancel_reason;
                                                                                                                                                                                                            }
                                                                                                                                                                                                            ?>">
                                        </div>
                                        <div class="form-text">Example help text goes outside the input group.</div>

                                    </div>







                                    <button type="submit" class="btn btn-primary float-end mt-4 mb-5" name="save_changes"> Save changes</button><br><br>
                                    <label for="" class="mb-5"></label>
                                </form>
                            </div>



                    <?php

                } else {
                    echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
      Sorry ! the searching result with "' . $search . '" are not found ..
      
      </div>';
                }
            }





                    ?>



    </div>








<?php
    include "inc/_footer.php";
}

?>