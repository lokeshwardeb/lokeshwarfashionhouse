<?php
// session_start();
include("inc/conn.php");
 
// this variable is to make activate the active class
// $active_class = 'home';
$search_class = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_class']), ENT_QUOTES) ;

if ($search_class == 'home') {
  $active_class = 'home';
}
if ($search_class == 'dashboard') {
  $active_class = 'dashboard';
}
if ($search_class == 'orders') {
  $active_class = 'orders';
}
if ($search_class == 'products') {
  $active_class = 'products';
}
if ($search_class == 'customers') {
  $active_class = 'customers';
}
if ($search_class == 'admins') {
  $active_class = 'admins';
}
// echo function b()
// include "inc/functions.php";

// include function b();

include "inc/conn.php";

include "inc/_header.php";



include "inc/_navbar.php";

?>







<div class="container title-bar mt-4 full-width" id="orderSec">
  <?php include "inc/_title_bar.php"; ?>
  <?php


  // $search_class = 'orders';

  include "inc/_search.php"; ?>
  <div class="orders">
    <div class="row">
      <div class="col-4 ">



        <!-- new order section -->
        <div class="container">

          <?php

$search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ;
          echo '<div class="fs-4 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2 ps-2 mb-4">Searching Results with "' . $search . '" </div>';

          $search_class = $_GET['search_class'];

          //           if ($search_class == "home") {
          // $active_class = 'home';

          //           }
          //           if ($search_class == "orders") {

          // // $active_class = 'home';
          // // $active_class = 'orders';



          //             $search = $_GET['search_text'];
          //             echo '<div class="fs-4 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2 ps-2">Searching Results with "' . $search . '" </div>';
          //             $sql = "SELECT * FROM `orders` WHERE `product_name` LIKE '%$search%' ORDER BY `product_name` DESC";
          //             $result = mysqli_query($conn, $sql);

          //             if (mysqli_num_rows($result) > 0) {
          //               while ($row = mysqli_fetch_assoc($result)) {
          //                 echo  '' . $row['product_name'] . '<br>';
          //               }
          //             }
          //           }
          //           if ($search_class == "products") {
          //           }
          //           if ($search_class == "customers") {
          //           }

          //           // if($)





          ?>

        </div>







      </div>



    </div>

  </div>


  <div class="container-fluid text-center">

    <?php
    // $search_class = 'orders';

    if ($search_class == "home") {
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ;

      // $sql = "SELECT * FROM `orders` WHERE `product_name` LIKE '%$search%' ORDER BY `product_name` DESC";
      $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id WHERE `order_no` LIKE '%$search%' OR `product_name` LIKE '%$search%' OR `product_desc` LIKE '%$search%' OR `price` LIKE '%$search%' OR `order_status` LIKE '%$search%' ORDER BY ord.`id` DESC";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Order No</th>
                  <th scope="col">Product ID</th>
                  <th scope="col">Product</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>';
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo  '<tr class="hover-table">
                <th scope="row">' . $no++ . '</th>
                <td>' . $row['order_no'] . '</td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['product_desc'] . '</td>
                <td>' . $row['order_status'] . '</td>

                
                <td><button type="submit" class="btn btn-dark">Order Details</button></td>
              </tr>';
        }
      } else {
        echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
              Sorry ! the searching result with "' . $search . '" are not found ..
              
              </div>';
      }
    }
    if ($search_class == "orders") {
      $active_class = 'orders';
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ;

      // $sql = "SELECT * FROM `orders` WHERE `order_no` LIKE '%$search%' OR `product_name` LIKE '%$search%' OR `product_desc` LIKE '%$search%' OR `price` LIKE '%$search%' OR `order_status` LIKE '%$search%' ORDER BY `id` DESC";

      $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id WHERE `order_no` LIKE '%$search%' OR `product_name` LIKE '%$search%' OR `product_desc` LIKE '%$search%' OR `price` LIKE '%$search%' OR `order_status` LIKE '%$search%' ORDER BY ord.`id` DESC";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Order No</th>
                  <th scope="col">Product ID</th>
                  <th scope="col">Product</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>';
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo  '<tr class="hover-table">
                <th scope="row">' . $no++ . '</th>
                <td><b>' . $row['order_no'] . '</b></td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['product_desc'] . '</td>
                <td>' . $row['order_status'] . '</td>

                
                <td><button type="submit" class="btn btn-dark">Order Details</button></td>
              </tr>';
        }
      } else {
        echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
              Sorry ! the searching result with "' . $search . '" are not found ..
              
              </div>';
      }
    }
    if ($search_class == "dashboard") {
      $active_class = 'dashboard';
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ;

      // $sql = "SELECT * FROM `orders` WHERE `product_name` LIKE '%$search%' ORDER BY `product_name` DESC";
      $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id WHERE `order_no` LIKE '%$search%' OR `product_name` LIKE '%$search%' OR `product_desc` LIKE '%$search%' OR `price` LIKE '%$search%' OR `order_status` LIKE '%$search%' ORDER BY ord.`id` DESC";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Product ID</th>
                  <th scope="col">Product</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>';
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo  '<tr class="hover-table">
                <th scope="row">' . $no++ . '</th>
                <td>' . $row['id'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['product_desc'] . '</td>
                <td>' . $row['status'] . '</td>

                
                <td><button type="submit" class="btn btn-dark">Order Details</button></td>
              </tr>';
        }
      } else {
        echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
              Sorry ! the searching result with "' . $search . '" are not found ..
              
              </div>';
      }
    }
    if ($search_class == "products") {
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ; 

      $sql = "SELECT * FROM `products` WHERE  `product_id` LIKE '%$search%' OR `product_name` LIKE '%$search%'  OR `product_desc` LIKE '%$search%' OR`product_img` LIKE '%$search%' OR`product_price` LIKE '%$search%'  OR `product_status` LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Product ID</th>
                  <th scope="col">Product</th>
                  <th scope="col">Description</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Added On</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>';
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo  '<tr class="hover-table">
                <th scope="row">' . $no++ . '</th>
                <td>' . $row['product_id'] . '</td>
                <td>' . $row['product_name'] . '</td>
                <td>' . $row['product_desc'] . '</td>
                <td>' . $row['product_price'] . '</td>
                <td>' . $row['product_added_datetime'] . '</td>
                <td>' . $row['product_status'] . '</td>

                
                <td><button type="submit" class="btn btn-dark">Order Details</button></td>
              </tr>';
        }
      } else {
        echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
              Sorry ! the searching result with "' . $search . '" are not found ..
              
              </div>';
      }
    }
    if ($search_class == "customers") {
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ;
      // $sql = "SELECT * FROM `customers`";

      $sql = "SELECT * FROM `customers` WHERE  `customer_id` LIKE '%$search%' OR `customer_name` LIKE '%$search%'  OR `customer_email` LIKE '%$search%' OR`customer_phone_no` LIKE '%$search%' OR`customer_address` LIKE '%$search%' OR `join_datetime` LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Customer ID</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Customer Email</th>
                  <th scope="col">Customer Phone</th>
                  <th scope="col">Customer Address</th>
                  <th scope="col">Joined In</th>
                </tr>
              </thead>
              <tbody>';
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo  '<tr class="hover-table">
                <th scope="row">' . $no++ . '</th>
                <td>' . $row['customer_id'] . '</td>
                <td>' . $row['customer_name'] . '</td>
                <td>' . $row['customer_email'] . '</td>
                <td>' . $row['customer_phone_no'] . '</td>
                <td>' . $row['customer_address'] . '</td>
                <td>' . $row['join_datetime'] . '</td>

                
                <td><button type="submit" class="btn btn-dark">Order Details</button></td>
              </tr>';
        }
      } else {
        echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
              Sorry ! the searching result with "' . $search . '" are not found ..
              
              </div>';
      }
    }
    if ($search_class == "admins") {
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ;
      // $sql = "SELECT * FROM `customers`";

      $sql = "SELECT * FROM `admin_users` WHERE  `id` LIKE '%$search%' OR `username` LIKE '%$search%'  OR `email` LIKE '%$search%' OR`datetime` LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Admin ID</th>
                  <th scope="col">Admin userName</th>
                  <th scope="col">Admin Email</th>
                  <th scope="col">Joined In</th>
                </tr>
              </thead>
              <tbody>';
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo  '<tr class="hover-table">
                <th scope="row">' . $no++ . '</th>
                <td>' . $row['id'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['datetime'] . '</td>
                

                
                <td><button type="submit" class="btn btn-dark">Admin Details</button></td>
              </tr>';
        }
      } else {
        echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
              Sorry ! the searching result with "' . $search . '" are not found ..
              
              </div>';
      }
    }

    // if($)





    ?>


    </tbody>
    </table>

  </div>
  </main>

  <?php

  include "inc/_footer.php";
  

  ?>