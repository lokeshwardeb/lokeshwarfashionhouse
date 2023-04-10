<?php
// this variable is to make activate the active class

// session_start();
include "../inc/conn.php";
$active_class = "my orders";

include "inc/_cus_header.php";
include "inc/_cus_navbar.php";


if (!isset($_SESSION['cus_username'])) {
  //   header("location: index.php");
  die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

  // exit;

} elseif (isset($_SESSION['cus_username'])) {

  // $active_theme = 'dark_theme';

  include "../inc/functions.php";

  include "inc/_navbar.php";

  include "inc/_company_info.php";



?>







  <div class="container title-bar mt-4" id="orderSec">

    <?php include "../inc/_title_bar.php"; ?>
    <?php


    $search_class = 'home';

    include "inc/_search.php";

    include("inc/_theme.php");


    ?>

    <div class="orders">
      <div class="row">
        <div class="col-4 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2">
          <div class="row">
            <div class="col-6">
              <div class="fs-4">Total Orders </div>
              <p class="dashb-order-info">
                <?php
                $check_username = $_SESSION["cus_username"];

                $sql_check = "SELECT * FROM `cus_users` WHERE `cus_username` = '$check_username'";
                $result_check = mysqli_query($conn, $sql_check);
                if ($result_check) {
                  while ($row = mysqli_fetch_assoc($result_check)) {
                    $check_user_id = $row['cus_id'];
                  }
                }
                $check_customer_sql = "SELECT * FROM `customers` WHERE `cus_id` = '$check_user_id'";
                $result_customer_check = mysqli_query($conn, $check_customer_sql);
                if ($result_customer_check) {
                  while ($row = mysqli_fetch_assoc($result_customer_check)) {
                    $customer_id = $row['customer_id'];
                  }
                }
                $sql_orders_check = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
                $result_sql_orders_check = mysqli_query($conn, $sql_orders_check);
                if ($result_sql_orders_check) {
                  if (mysqli_num_rows($result_sql_orders_check) > 0) {

                    $orders_sql_check = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
                    $orders_result_check = mysqli_query($conn, $orders_sql_check);
                    if ($orders_result_check) {
                      while ($row = mysqli_fetch_assoc($orders_result_check)) {
                        $order_no = $row['order_no'];
                        $total_amount = $row['total_amount'];
                        $order_status = $row['order_status'];
                      }
                    }

                    $total_orders_count = mysqli_num_rows($result_sql_orders_check);
                    $sql_in_process = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id' AND `order_status` = 'In-process'";
                    $result_sql_in_process = mysqli_query($conn, $sql_in_process);

                    if ($result_sql_in_process) {
                      $in_process_orders_count = mysqli_num_rows($result_sql_in_process);
                    }
                    // $in_process_orders_count = 
                    $sql_delivered = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id' AND `order_status` = 'completed'";
                    $result_delivered = mysqli_query($conn, $sql_delivered);

                    if ($result_delivered) {
                      $delivered_orders_count = mysqli_num_rows($result_delivered);
                    }
                  } else {
                    $total_orders_count = 0;
                    $in_process_orders_count = 0;
                    $delivered_orders_count = 0;
                  }
                }



                ?>
                <span class="fs-5">
                  <?php echo $total_orders_count ?>
                </span>
              </p>
            </div>
            <div class="col-6">
              <img class="img-fluid" src="<?php echo SITE_URL ?>ecom-admin/img/products.jpg" width="150px" style="border-radius: 20px;" height="100px" alt="" srcset="">
            </div>
          </div>

        </div>
        <div class="col-4 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2">
          <div class="row">
            <div class="col-6">
              <div class="fs-4"> Orders in Process </div>
              <p class="dashb-order-info">
                <?php


                ?>
                <span class="fs-5">
                  <?php echo $in_process_orders_count ?>
                </span>
              </p>
            </div>
            <div class="col-6">
              <img class="img-fluid" src="<?php echo SITE_URL ?>ecom-admin/img/process.jpg" alt="" srcset="" width="100px" height="100px" style="border-radius: 20px;">
            </div>
          </div>

        </div>
        <div class="col-4 custom-box-bg-color border-start border-primary border-5 pt-2">

          <div class="row">
            <div class="col-6">
              <div class="fs-4"> Delivered Products </div>
              <p class="dashb-order-info">
                <?php

                ?>
                <span class="fs-5">
                  <?php echo $delivered_orders_count ?>
                </span>
              </p>
            </div>
            <div class="col-6">
              <img class="img-fluid" src="<?php echo SITE_URL ?>ecom-admin/img/delivered.png " alt="" srcset="" width="150px" height="100px" style="border-radius: 20px;">
            </div>
          </div>

        </div>
        <style>
          .hover-table {
    /* transform: ease-in .50s; */
    transition: 500ms linear ;

}

.hover-table:hover {
    /* transform: ease-in .50s; */
    background-color: #0D6EFD;
    color: white !important;
   
}
  .on-table-hover{
    transition: 500ms linear ;
  }
  .on-table-hover table{
    transition: 500ms linear ;
  }
  .on-table-hover:hover{
    transition: 500ms linear ;

    background-color: #0D6EFD;
    color: white !important;
  }
  .on-table-hover:hover table{
    transition: 500ms linear ;

    background-color: #0D6EFD;
    color: white !important;
  }
</style>

        <!-- new order section -->
        <div class="container">
          <div class="">
            <div class="fs-4 mb-4 mt-2">Recent orders</div>
            <?php


            $sql = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
            $result = mysqli_query($conn, $sql);


            $sql_new_ord_che = "SELECT * FROM `orders` WHERE `order_no` = '$order_no' AND `customer_id_on_order` = '$customer_id'";
            $result_new_ord_che = mysqli_query($conn, $sql_new_ord_che);

            if (mysqli_num_rows($result) > 0) {
              if (mysqli_num_rows($result_new_ord_che) > 0) {

                $sql_new_ord_che = "SELECT * FROM `order_products` WHERE `customer_id_on_order` = '$customer_id'";
                $result_new_ord_che = mysqli_query($conn, $sql_new_ord_che);

                if ($result_new_ord_che) {
                  if (mysqli_num_rows($result_new_ord_che) > 0) {
                    while ($row = mysqli_fetch_assoc($result_new_ord_che)) {
                      $product_id = $row['product_id'];
                     
                    }
                  }
                }
                $sql_check_order_status = "SELECT * FROM `orders` WHERE  `customer_id_on_order` = '$customer_id'";
                $result_check_order_status = mysqli_query($conn, $sql_check_order_status);
                if($result_check_order_status){
                  while($row = mysqli_fetch_assoc($result_check_order_status)){
                    $order_status = $row['order_status'];
                  }
                }

                $sql_ch_orders_no_new = "SELECT * FROM `order_products` op JOIN products p ON p.product_id = op.product_id JOIN orders AS ord ON ord.order_no = op.orders_id WHERE ord.customer_id_on_order = '$customer_id'";
                $result_ch_orders_no_new = mysqli_query($conn, $sql_ch_orders_no_new);
                if($result_ch_orders_no_new){
                  if(mysqli_num_rows($result_ch_orders_no_new) > 0){
                    while($row = mysqli_fetch_assoc($result_ch_orders_no_new)){
                      $orders_no_new_check = $row['order_no'];
                    }
                  }
                }

                $sql_product_display = "SELECT * FROM `products` WHERE `product_id` = '$product_id'";
                $result_product_display = mysqli_query($conn, $sql_product_display);


                echo '<table class="table  custom-default-box-bg-color  ">
                <thead>
                  <tr>
                    <th scope="col">SL.No</th>
                    <th scope="col">Order no</th>
                    
                    <th scope="col">Payble amount</th>
                    
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>';
                $no = 1;
                $total_price = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                  $price = $value['product_price'];
                  $total_price += $price;
                }
                while ($row = mysqli_fetch_assoc($result_product_display)) {
                  $product_id = $row['product_id'];
                  $product_name = $row['product_name'];
                  $product_desc = $row['product_desc'];
                  $product_price =  $row['product_price'];
                }

                //             $sql_orders_status = "SELECT * FROM `order_products` WHERE `orders_id` = '$order_no'";
                //             $result_order_status_check = mysqli_query($conn, $sql_orders_status);
                // if($result_order_status_check){
                //   while($row = mysqli_fetch_assoc($result_order_status_check)){
                //     $
                //   }
                // }
                $sql_ch_orders = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
                // $sql_ch_orders = "SELECT * FROM `order_products` op JOIN products p ON p.product_id = op.product_id WHERE customer_id_on_order = '$customer_id';";
                // $sql_ch_orders = "SELECT * FROM `order_products` op JOIN products p ON p.product_id = op.product_id JOIN orders AS ord ON ord.order_no = op.orders_id WHERE ord.customer_id_on_order = '$customer_id' AND ord.order_no = '$orders_no_new_check';";
                $result_ch_orders = mysqli_query($conn, $sql_ch_orders);

                if ($result_ch_orders) {
                  
                   while ($row = mysqli_fetch_assoc($result_ch_orders)) {
                    $order_no_new = $row['order_no'];
                    // if(mysqli_num_rows($result_ch_orders) > 1){

                    // }else{

                    // }

                  // $product
                  // include("")
                  echo '<tr class="hover-table on-table-hover">
                  <th scope="row">' . $no++ . '</th>
                  <td><b>' . $row['order_no'] . '</b></td>
                  <td><b>' . $row['total_amount'] . '</b></td>
                 
                  <td class="">';
                  $sql_get_prod = "SELECT * FROM `order_products` op JOIN products p ON p.product_id = op.product_id WHERE customer_id_on_order = '$customer_id' AND op.orders_id = '$order_no_new';";
                  $result_get_prod = mysqli_query($conn, $sql_get_prod);
                  if($result_get_prod){
                    if(mysqli_num_rows($result_get_prod) . 0){
                      $sl_no = 1;
                      while ($get_prod_row = mysqli_fetch_assoc($result_get_prod)){

                        echo '                  <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">'.$sl_no.'</th>
                            <td>'. $get_prod_row['product_name'].'</td>
                            <td>'. $get_prod_row['product_qty'].'</td>
                            <td>'. $get_prod_row['product_price'].'</td>
                            
                          </tr>
                       
                        </tbody>
                      </table>';
$sl_no++;
                      }
                    }
                  }

                  echo '

                  
                  </td>
                 
             
                  
                  <td class="'; ?>
                  <?php

                  if ($row['order_status'] == 'completed') {
                    echo "text-success";
                  }
                  if ($row['order_status'] == 'In-process') {
                    echo "text-warning";
                  }
                  if ($row['order_status'] == 'cancelled') {
                    echo "text-danger";
                  }


                  ?>




            <?php echo '">' . ucfirst($row['order_status']) . '</td>
    
                  
                  <td><a href="cus_orders_details.php?id=' . $row['id'] . '"><button type="submit" class="btn btn-dark">Order Details</button></a></td>
                </tr>
                
                
               ';
                }

                
                // $sql_new_ord_che = "SELECT * FROM `order_products` op JOIN products p ON p.product_id = op.product_id WHERE customer_id_on_order = 1010;";
                // $result_new_ord_che = mysqli_query($conn, $sql_new_ord_che);

                // if ($result_new_ord_che) {
                //   if (mysqli_num_rows($result_new_ord_che) > 0) {
                //     while ($row = mysqli_fetch_assoc($result_new_ord_che)) {
                //      echo $product_id = $row['product_id'];
                     
                //     }
                //   }
                // }

                }
               



                echo ' </tbody>
                </table>';
              }
            } else {
              echo '<div class = "text-center custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
            Sorry ! No orders are not found ..
            
            </div>';
            }



            ?>
          </div>
        </div>
        <?php

        ?>

      </div>



    </div>
  </div>

  </main>

<?php

  include "inc/_cus_footer.php";
}

?>