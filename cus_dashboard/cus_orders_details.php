<?php
include "../inc/conn.php";
$active_class = 'orders';
include "inc/_cus_header.php";
if (!isset($_SESSION['cus_username'])) {
    // header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

    // exit;

} elseif (isset($_SESSION['cus_username'])) {


    include "inc/_cus_navbar.php";

?>

    <div class="container full-width title_bar mt-4">
        <?php

        include "inc/_cus_title_bar.php";



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







                echo '
        
<div class="row">
<div class="col-6">
<a href = "cus_orders.php" class="mb-4"><button class = "btn btn-primary mb-4">Go to orders</button></a><br>
    Order No: <b> ' . $order_no . ' </b> <br>
    Product Id: ' . $product_id . ' <br>
    Product Name : ' . $product_name . ' <br>
    Product Description: ' . $product_desc . ' <br>
    Quantity: ' . $orders_quantity . ' <br>
    Customer Id: ' . $customer_id . ' <br>
    Customer Name: ' . $customer_name . ' <br>
    Customer Email: ' . $customer_email . ' <br>
    Customer Phone: ' . $customer_phone_no . ' <br>
    Customer Address: ' . $customer_address . ' <br>
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
    Product Per Price: ' . $product_price . ' <br>
    Total Amount: ' . $total_amount . ' <br>
  
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
<div class="col-6">
    <img src="../ecom-admin/uploaded_img/products/' . $product_img . '" width="80%!important" height="250px!important" alt="" srcset="">
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

                            <div id="productEdit" class="no-disp">


                                <div class="container full-width">

                                </div>
                                    




                                    



                                 


                                        

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


</div>





<?php
    include "inc/_cus_footer.php";
}

?>