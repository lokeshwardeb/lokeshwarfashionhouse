<?php
include 'inc/_error_reporting.php';
$active_class = 'order tracking';
// $website_slogan = 'feel the shopping';

include("inc/_header.php");
include("inc/conn.php");
include("inc/const.php");
include("inc/functions.php");

?>

<?php
include("inc/_navbar.php");
// <?php
if (isset($_SESSION['cus_username'])) {
  // echo '<div class="text-light mt-2">'.$_SESSION["cus_username"].'</div>' ;
}

// include("inc/_heading_header.php")



?>
<main>

  <!-- welcome to order tracking -->

  <?php

  // main php code starts here
  // $_SESSION['ord_trac_no_res_found'] = 0;

  $get_order_no = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text_order_track_no']),ENT_QUOTES);
  $get_order_phone_no = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text_order_track_pho_no']), ENT_QUOTES);

  // echo $get_order_no;
  // echo $get_order_phone_no;

  $sql_check = "SELECT * FROM `orders` WHERE `order_no` = '$get_order_no' AND `order_phone_no` = '$get_order_phone_no'";
  $result__check = mysqli_query($conn, $sql_check);

  if ($result__check) {

    // $_SESSION['ord_trac_no_res_found'] = 0;

    if (mysqli_num_rows($result__check) > 0) {
    $query_result_run = 0;

      while ($row = mysqli_fetch_assoc($result__check)) {
        $order_no = $row['order_no'];
        $order_shipping_address = $row['order_shipping_address'];
        $order_phone_no = $row['order_phone_no'];
        $order_status = $row['order_status'];
        $order_est_delivery_datetime = $row['order_est_delivery_datetime'];
        $order_placed_datetime = $row['order_placed_datetime'];
        $order_accepting_status = $row['order_accepting_status'];
        $order_packaging_status = $row['order_packaging_status'];
        $courier_handing_status = $row['courier_handing_status'];
        $courier_handing_desc = $row['courier_handing_desc'];
        $cancel_reason = $row['cancel_reason'];
        $payment_method = $row['payment_method'];
      }
    }else{
    $query_result_run = 1;

    }
  }else{
    $query_result_run = 1;
  }

  if (!$result__check) {

    // echo  $_SESSION['ord_trac_no_res_found'] = 1;
  }
  if ($result__check) {
    // echo  $_SESSION['ord_trac_no_res_found'] = 0;
  }





  // main php code ends here

  ?>
  <style>
    .order_section {
      /* background-color: #ffa500; */
      background-color: #ff7a00;
      color: white;
    }

    .estimated_dalivary_datetime {
      background-color: #ffa500;
      color: white;
    }

    .ord_status {
      color: <?php if ($order_status == 'completed') {
                echo 'green';
              }

              if ($order_status == 'In-process') {
                echo '#ffa500';
              }

              if ($order_status == 'pending') {
                echo '#ffa500';
              }
              if ($order_status == 'cancelled') {
                echo 'red';
              }
              ?>;
    }

    .page {

      background-color: white;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>

  <div class="container mb-4 mt-4">
    <div class="row">
      <div class="col-md-12 col-lg-4">
        <div class="container page rounded pt-3">
          <div>Order Shipping Address</div>
          <address><?php echo $order_shipping_address ?></address>
          <div class="phone_no">
            <span>Phone no</span>
            <div class="number">
              <?php echo $order_phone_no ?>
            </div>
          </div>
          <div class="order_status mt-2 pb-3">
            <div class="ord_status_title">
              Order Status
            </div>
            <div class="ord_status">
              <?php echo ucwords($order_status)  ?>

            </div>
          </div>
        </div>

      </div>
      <?php

      if ($query_result_run == 1) {
        echo ' <div class="container col-md-12 col-lg-8 page pt-4 text-danger">
       Sorry,  No order was found with this order no <b> ' . $get_order_no . '</b> and this phone no <b>' . $get_order_phone_no . '</b>
          </div>';
      } else {




      ?>
        <div class="col-md-12 col-lg-8">
          <div class="container order_section pb-4 pt-2 rounded">
            <div class="order_title text-center fs-3">Order No</div>
            <div class="fs-3 text-center"><?php echo $order_no ?></div>
          </div>

          <div class="container page rounded">
            <div class="estimated_dalivary_datetime text-center fs-4 pt-2">
              <div class="est_ord_dat_tim_title">
                Estimated dalivery date
              </div>
              <div class="est_ord_dat_ti pb-3">
                <img src="img/fast-delivery.png" width="50px" height="50px" class="img-fluid bg-body-secondary rounded-circle" alt="" srcset="">
                <?php
                $strtotime = strtotime($order_est_delivery_datetime);
                $order_est_delivery_datetime_is = date("D d-M-Y ", $strtotime);
                if ($_SESSION['ord_trac_no_res_found'] == 0) {
                  echo $order_est_delivery_datetime_is;
                }


                // echo $order_est_delivery_datetime

                ?>
              </div>

            </div>

            <?php
            $_SESSION['ord_acep_sta_ord_trac'] = 0;
            $_SESSION['ord_pack_sta_ord_trac'] = 0;
            $_SESSION['ord_couri_hand_sta_ord_trac'] = 0;

            $ord_acep_sta_ord_trac =  $_SESSION['ord_acep_sta_ord_trac'];
            $ord_pack_sta_ord_trac =  $_SESSION['ord_pack_sta_ord_trac'];
            $ord_couri_hand_sta_ord_trac =  $_SESSION['ord_couri_hand_sta_ord_trac'];






            if ($order_accepting_status == 'order accepted' && $query_result_run == 0) {
              // $_SESSION['ord_acep_sta_ord_trac'] = 1;




            ?>

              <div class="container status_section pb-3">



                <div class="order_placed_on text-center fs-5">Order placed in <?php
                                                                              $strtotime = strtotime($order_placed_datetime);
                                                                              $order_placed_date_is = date("d-m-Y h:i:s A", $strtotime);
                                                                              echo $order_placed_date_is ?></div>


                <div class="order_acpected mb-4 fs-5"><img src="img/post.png" width="50px" height="50px" class="img-fluid bg-secondary rounded-circle" alt="" srcset=""> Order accepted</div>
                <?php

                if ($order_packaging_status !== '' && $order_accepting_status == 'order accepted') {
                  $_SESSION['ord_pack_sta_ord_trac'] = 1;
                  echo '
                      <div class="pakaging_starts mb-4 fs-5"><img src="img/box.png" width="50px" height="50px" class="img-fluid bg-warning rounded-circle" alt="" srcset=""> ' . $order_packaging_status . '</div>
                      ';
                } else {
                  // echo '
                  //       <div class="pakaging_starts">Order packaging has been starts</div>
                  //       ';
                }
                if ($courier_handing_status == !'' && $order_packaging_status !== '' && $order_accepting_status == 'order accepted') {
                  $_SESSION['ord_couri_hand_sta_ord_trac'] = 1;
                  $courier_handing_desc;
                  if ($courier_handing_desc == '') {
                    echo '
    <div class="handed_on_courier fs-5 mb-4">  <img src="img/delivery-man.png" width="50px" height="50px" class="img-fluid bg-secondary rounded-circle" alt="" srcset=""> Order handed on courier</div>
    
    
    ';
                  } else {
                    echo '
    <div class="handed_on_courier fs-5">' . $courier_handing_desc . '</div>
    
    
    ';
                  }
                }

                if ($order_status == 'completed' && $courier_handing_status == !'' && $order_packaging_status !== '' && $order_accepting_status == 'order accepted') {
                  echo '
<div class="delivared_on_customer fs-5 mb-3"><img src="img/delivery.png" width="50px" height="50px" class="img-fluid bg-body-secondary rounded-circle" alt="" srcset=""> Order has been delivared to the customer</div>


';
                }

                if ($order_status == 'cancelled' && $courier_handing_status == !'' && $order_packaging_status !== '' && $order_accepting_status == 'order accepted') {
                  echo '
  
<div class="delivared_on_customer text-danger" >Order has been cancelled</div>
<div class="delivared_on_customer">' . ucfirst($cancel_reason) . '</div>
  
  ';
                }

                ?>

              </div>

          <?php
            } elseif($order_accepting_status == '' && $query_result_run == 0) {
         ?>
         <div class="container status_section pb-3">
         <div class="order_placed_on text-center fs-5">Order placed in <?php
                                                                              $strtotime = strtotime($order_placed_datetime);
                                                                              $order_placed_date_is = date("d-m-Y h:i:s A", $strtotime);
                                                                              echo $order_placed_date_is ?></div>
         </div>
         
         <?php


            }
          }
          ?>
          <!-- div. -->







          </div>
        </div>
    </div>
  </div>
  <style>
    .prod_hover:hover {
      color: blue !important;
    }
  </style>
  <!-- <hr> -->
  <div class="container ">
    <div class="row">
      <div class="col-md-12 col-lg-4"></div>
      <div class="col-md-12 col-lg-8">
        <div class="container page mb-4 border-top border-success border-4 table-responsive">
          <?php
          if ($order_status !== 'cancelled') {

          ?>
            <table class="table table-borderless">
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
                $sql_ord_select = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id WHERE ord_prod.orders_id = '$get_order_no' AND ord.order_phone_no = '$get_order_phone_no';
              ";
                // $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders as ord ON ord.order_no = ord_prod.orders_id WHERE ord_prod.orders_id = '$get_order_no' AND ord.order_no = '$get_order_no';";

                $result_ord_select = mysqli_query($conn, $sql_ord_select);
                if ($result) {
                  if (mysqli_num_rows($result_ord_select) > 0) {
                    $total_price = 0;
                    while ($row = mysqli_fetch_assoc($result_ord_select)) {
                      $qt = $row['product_qty'];
                      $pri = $row['product_price'];

                      echo '
                  <tr>
                  <th scope="row"><img src="' . PRODUCT_INFO_PATH . $row["product_img"] . '" class="img-fluid" height="150px" width="150px" alt="" srcset="">  </th>
                  <td><a href="product_details_cus_disp.php?id=' . $row['product_id'] . '" class="nav-link prod_hover">' . $row["product_name"] . '</a></td>
                  <td>Price: ' . product_currency_bdt() . $per_price = $row['product_price'] . '</td>
                  <td>Qty: ' . $product_qty = $row['product_qty'] . '</td>
                  <td>' . product_currency_bdt() . $total_price += $row['product_price'] * $row['product_qty'] . '</td>
                </tr>
                  
                  ';
                    }
                  }
                }


                ?>



              </tbody>
            </table>

            <div class="info-section border-top border-dark border-1 pt-4 pb-4">
              <div class="container text-end table-responsive">
                <table class="table table-borderless ">
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
                      <td class="col-md-12 col-lg-10"><span class="text-end">Total Items:</span></td>
                      <td class="col-md-12 col-lg-10"><span class=""><?php echo $qt ?>Product(s)</span></td>

                    </tr>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td class="col-md-12 col-lg-10"> <span class="">Sub-Total:</span></td>
                      <td class="col-md-12 col-lg-10"><?php echo product_currency_bdt() .  $pri; ?></td>

                    </tr>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td class="col-md-12 col-lg-10"> <span>Total Price:</span></td>
                      <td class="col-md-12 col-lg-10"><?php echo product_currency_bdt() .  $total_price ?></td>

                    </tr>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td class="col-md-12 col-lg-10"> <span>Payable Amount:</span></td>
                      <td class="col-md-12 col-log-10"> <?php
                                          if ($order_status == 'completed' || $order_status == 'cancelled') {
                                            echo product_currency_bdt() . 0;
                                          } else {
                                            echo product_currency_bdt() . $total_price;
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
      <?php
          } else {
            echo '
            <div class="conatiner page">
            <div class="text-danger">
              The order was cancelled
            </div>
            <div class="text-danger">
              ' . $cancel_reason . '
            </div>
          </div>
            
            ';
          }
      ?>

      </div>
    </div>
  </div>
</main>
<!-- the main content ends here -->

<?php
include("inc/_footer.php");

?>