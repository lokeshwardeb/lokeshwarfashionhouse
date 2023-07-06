<?php
include 'inc/_error_reporting.php';
$active_class = 'shop';
// $website_slogan = 'feel the shopping';

include("inc/_header.php");
include("inc/conn.php");
include("inc/const.php");
include("inc/functions.php");

?>

<?php
include("inc/_navbar.php");

$get_order_no = $_GET['order_no'];
$get_order_phone_no = $_GET['order_phone_no'];



?>
 <style>
    .prod_hover:hover {
      color: blue !important;
    }
  </style>



<?php


// $check_users_sql = "SELECT * FROM `customers` c JOIN order_customers oc ON c.customer_id = oc.cus_id WHERE oc.order_no = '$get_order_no';";

// $result_check_users = mysqli_query($conn, $check_users_sql);


// if($result_check_users){
//     while($row = mysqli_fetch_assoc($result_check_users)){
//         $check_username = $row[''];
//     }
// }



// echo str_replace("#", "%23", $get_order_no);







// $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id WHERE ord_prod.orders_id = '$get_order_no';";
$sql_customer_select = "SELECT * FROM `order_customers` oc JOIN orders o ON oc.order_no = o.order_no WHERE o.order_no = '$get_order_no';
                ";
// $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders as ord ON ord.order_no = ord_prod.orders_id WHERE ord_prod.orders_id = '$get_order_no' AND ord.order_no = '$get_order_no';";

$result_customer_select = mysqli_query($conn, $sql_customer_select);
if ($result) {
    //   if (mysqli_num_rows($result_customer_select) > 0) {
    $total_price = 0;
    while ($row = mysqli_fetch_assoc($result_customer_select)) {


        $order_customer_name = $row['customer_firstname'] . ' ' . $row['customer_lastname'];
        $order_customer_email = $row['order_email'];
        $order_customer_shipping_address = $row['order_shipping_address'];

        //   get the cus_id
        $cus_id = $row['cus_id'];
    }

    // get the users id
    $get_customer = "SELECT * FROM `customers` WHERE `customer_id` = '$cus_id';";
    $result_get_customer = mysqli_query($conn, $get_customer);

    if ($result_get_customer) {
        if (mysqli_num_rows($result_get_customer) > 0) {
            while ($row = mysqli_fetch_assoc($result_get_customer)) {
                $check_the_username = $row['customer_name'];
            }
        }
    }


    if ($check_the_username !== $_SESSION['cus_username']) {
        error_alert("Your username is not matching !");

        echo "
                        <script>
                        window.location.href = 'shop.php';
                        </script>
                        
                        ";
    } else {
        //    succcess_alert("Your username is matching");
    }





    // $get_main_customer = "SELECT * FROM `cus_users` WHERE `cus_id` = '$users_id'";
    // $result_get_main_customer = mysqli_query($conn, $get_main_customer);

    // if($result_get_main_customer){
    //     if(mysqli_num_rows($result_get_main_customer) > 0){
    //         $check_main_username = $row['cus_username'];
    //     }
    // }

    // echo 'the main username' . $check_main_username;



    //   }
}


?>







<style>
    /* @media print {
        .invoice_page_grab{
            background-color: green !important;
        }
    } */
</style>

<div class="container print_style">
    <div class="invoice_page_grab m-4 page p-4">
        <div class="row">
            <div class="col-12 fs-1 text-center mb-5"><img src="<?php echo SITE_URL . 'ecom-admin/uploaded_img/' . $website_logo ?>" alt="" width="100px" height="100px" srcset=""></div>
            <div class="col-12 fs-1 text-center mb-5"><?php echo $website_name ?></div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12"> Order No: <b><?php echo $get_order_no ?></b></div>
                    <div class="col-12"> Customer Name: <?php echo $order_customer_name ?></div>
                    <div class="col-12"> Customer Email: <?php echo $order_customer_email ?></div>
                    <div class="col-12"> Customer Phone No: <?php echo $get_order_phone_no ?></div>


                </div>

            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12"><b>Order Delivery Shipping Address: </b> <?php echo  $order_customer_shipping_address ?></div>
                    <!-- <div class="col-12">Order Billing Address: Paikpara, Brahamanbaria</div> -->
                </div>
            </div>
        </div>

        <div class="container mt-4">
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
        </div>

    </div>

    <!-- <div class="container">
        <div class="container">
            h
        </div>
    </div> -->

    <div class="container m-4 d-print-none">
        <button type="submit" class="btn " style="background-color: black; color:white" onclick="window.print()">Print Invoice</button>
    </div>



</div>

</main>
<!-- the main content ends here -->

<?php
include("inc/_footer.php");

?>