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



include("inc/functions.php");
include "inc/_navbar.php";

include("inc/const.php");
?>







<div class="container title-bar mt-4 full-width" id="orderSec">
  <?php include "inc/_title_bar.php"; ?>
  <?php


  // $search_class = 'orders';

  include "inc/_search.php"; ?>
  <div class="orders">
    <div class="row">
      <div class="col-md-12 col-lg-4 ">



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

     
    if ($search_class == "orders") {
      $active_class = 'orders';
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ;

      $sql = "SELECT * FROM `orders` WHERE `order_no` LIKE '%$search%' OR `product_name` LIKE '%$search%' OR `product_desc` LIKE '%$search%' OR `price` LIKE '%$search%' OR `order_status` LIKE '%$search%' ORDER BY `id` DESC";
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
    
    if ($search_class == "products") {
      $search = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text']), ENT_QUOTES) ; 

      $sql = "SELECT * FROM `products` WHERE  `product_id` LIKE '%$search%' OR `product_name` LIKE '%$search%'  OR `product_desc` LIKE '%$search%' OR`product_img` LIKE '%$search%' OR`product_price` LIKE '%$search%'  OR `product_status` LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo '<div class="container products-section">
        <div class="section-title text-center mt-4 mb-4">
          Products
        </div>
      
        <div class="f-products-section">
          <div class="row  cus-d-block">';
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo  '<div class="col-md-12 col-lg-4 products-col mb-4 p-3 custom-bg-light">
          <div class="product-info">
            <a href="product_details_cus_disp.php?id='.$row['product_id'].'" class="nav-link">
              <div class="p-img">
                <img src="' . PRODUCT_INFO_PATH . '' . $row['product_img'] . '" alt="" srcset="">
              </div>
              <div class="p-title d-block mt-2 mb-3 ms-4" name="product-name" id="pro-name">
               ' . $row['product_name'] . '
              </div>
              <div class="p-title d-block mt-2 mb-3 ms-4" name="product-name" id="pro-name">
               ' . $row['product_desc'] . '
              </div>
            </a>
            <div class="box ms-2 ps-5 d-flex text-center">
              <label for="name"></label>
              <button class="dec button pe-4 btn">-</button>
              <input type="text" name="qty" id="1" value="1" class="numInp" disabled>
              <button class="inc button ps-4 btn">+</button>
            </div>
            <div class="price d-inline-flex">
              <div class="price_symbol">';
          
          echo '</div>
              <div class="price_amount" name="product-price">' . product_currency_bdt() .  $row['product_price'] . '</div>
            </div><br>
    
    
          </div>
          <div class="price-button d-inline-flex mt-4">
            <div class="cart-button me-4 ">
              <button type="submit" class="btn btn-outline-dark btn-sm-md" onclick="cart()">Add to cart</button>
            </div>
            <div class="buy-button">
              <button type="submit" class="btn btn-dark btn-md-sm">Buy now</button>
            </div>
          </div>
    
    
    
    
        </div>';
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