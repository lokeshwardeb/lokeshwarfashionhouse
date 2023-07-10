<?php 

include "inc/conn.php";
$active_class = 'dashboard';
include "inc/_header.php";
if(!isset($_SESSION['username'])){
  echo '
  <script>
  window.location.href = "login.php";
  </script>
  ';
  header("location: index.php");
  die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>') ;

  // exit;

}
elseif(isset($_SESSION['username'])){
  
   
 
  
include "inc/_navbar.php";

?>

<div class="container title_bar mt-4 full-width">
<?php

include "inc/_title_bar.php";

// include "inc/_search.php";

?>
  <?php 
  
  $search_class = 'dashboard';
  
  include "inc/_search.php";
  include("inc/functions.php");

  include("inc/_theme.php");
  
  
  ?>

<div class="container">
<div class="orders mb-4">
    <div class="row">
      <div class="col-lg-3 col-md-12 mb-4 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2">
        <div class="row">
          <div class="col-lg-6 mb-4 col-md-12">
            <div class="fs-4">Total Orders </div>
            <p class="dashb-order-info">
            <?php
              $sql = "SELECT * FROM `orders`";
              $result = mysqli_query($conn, $sql);

              if($result){
                $total_orders_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo $total_orders_count?> </span>
            </p>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-fluid" src="img/products.jpg" width="150px" style="border-radius: 20px;" height="100px" alt="products" srcset="">
          </div>
        </div>

      </div>
      <div class="col-lg-3 col-md-12 mb-4 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="fs-4"> Orders in Process </div>
            <p class="dashb-order-info">
            <?php
              $sql = "SELECT * FROM `orders` WHERE `order_status` = 'In-process'";
              $result = mysqli_query($conn, $sql);

              if($result){
                $in_process_orders_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo  $in_process_orders_count?> </span>
            </p>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-fluid" src="img/process.jpg" alt="process" srcset="" width="100px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>
      <div class="col-lg-3 col-md-12 mb-4 custom-box-bg-color border-start border-primary border-5 pt-2">

        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="fs-4"> Delivered Products </div>
            <p class="dashb-order-info">
              <?php
            $sql = "SELECT * FROM `orders` WHERE `order_status` = 'completed'";
              $result = mysqli_query($conn, $sql);

              if($result){
                $delivered_orders_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo $delivered_orders_count ?> </span>
            </p>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-fluid" src="img/delivered.png" alt="delivered" srcset="" width="150px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>
      <div class="col-lg-3 mb-4 col-md-12 custom-box-bg-color border-start border-primary border-5 pt-2">

        <div class="row">
          <div class="col-lg-6 mb-4 col-md-12">
            <div class="fs-4"> Cancelled Orders </div>
            <p class="dashb-order-info">
              <?php
            $sql = "SELECT * FROM `orders` WHERE `order_status` = 'cancelled'";
              $result = mysqli_query($conn, $sql);

              if($result){
                $delivered_orders_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo $delivered_orders_count ?> </span>
            </p>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-fluid" src="img/delivered.png" alt="delivered" srcset="" width="150px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>

                                                               

      <!-- <?php
      //  include "inc/conn.php";
      // $sql_order = "SELECT * FROM `orders`";
      $sql_order = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id ";
      $result = mysqli_query($conn, $sql_order);
      if ($num = mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div id="orders">' . 'the orders' . $row['product_name'] . '</div>';
        }
      }
      echo 'hi';
      ?> -->
    
    </div>
 


  </div>
</div>







</div>
<div class="container">

<!-- products count section -->
<div class="orders mt-4">
    <div class="row">
      <div class="col-lg-4 mb-4 col-md-12 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2">
        <div class="row">
          <div class="col-lg-6 mb-4 col-md-12">
            <div class="fs-4">Total Products </div>
            <p class="dashb-order-info">
            <?php
              $sql = "SELECT * FROM `products`";
              $result = mysqli_query($conn, $sql);

              if($result){
                $total_products_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo $total_products_count?> </span>
            </p>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-fluid" src="img/totalProducts.jpg" width="150px" style="border-radius: 20px;" height="100px" alt="" srcset="">
          </div>
        </div>

      </div>
      <div class="col-lg-4 mb-4 col-md-12 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="fs-4"> Products In-Stock </div>
            <p class="dashb-order-info">
            <?php
              $sql = "SELECT * FROM `products` WHERE `product_status` = 'In-stock'";
              $result = mysqli_query($conn, $sql);

              if($result){
                $in_stock_products_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo  $in_stock_products_count?> </span>
            </p>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-fluid" src="img/product-inStock.jpg" alt="" srcset="" width="100px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>
      <div class="col-lg-4 mb-4 col-md-12 custom-box-bg-color border-start border-primary border-5 pt-2">

        <div class="row">
          <div class="col-lg-6 ">
            <div class="fs-4">Products Out-stock</div>
            <p class="dashb-order-info">
              <?php
            $sql = "SELECT * FROM `products` WHERE `product_status` = 'Out-stock'";
              $result = mysqli_query($conn, $sql);

              if($result){
                $out_stock_products_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo $out_stock_products_count ?> </span>
            </p>
          </div>
          <div class="col-lg-6 col-md-12">
            <img class="img-fluid" src="img/products-outStock.jpg" alt="" srcset="" width="150px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>

      <div class="fs-2 container mt-4 pt-2 pb-4">Accept the new orders</div>                              

      <?php
      //  include "inc/conn.php";
      // $sql_order = "SELECT * FROM `orders`";
      $sql_order = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id WHERE ord.order_accepting_status = ''; ";
      $result = mysqli_query($conn, $sql_order);
      // if ($num = mysqli_num_rows($result) > 0) {
      //   while ($row = mysqli_fetch_assoc($result)) {
      //     echo ' <th scope="row">'.$no++ . '</th>
      //     <td>'.$row['id'].'</td>
      //     <td>'.$row['product_name'].'</td>
          
          
          
      //     ';
      //     echo '<div id="orders">' . 'the orders' . $row['product_name'] . '</div>';
      //   }
      
      if (mysqli_num_rows($result) > 0) {
        echo '
        <div class="table-responsive">
        <table class="table  custom-default-box-bg-color  ">
        <thead>
          <tr>
            <th scope="col">SL.No</th>
            <th scope="col">Order No</th>
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
          <th scope="row">'.$no++ . '</th>
          <td><b>'.$row['order_no'].'</b></td>
          <td>'. $row['product_name'].'</td>
          <td>'.$row['price'].'</td>
          <td>'.$row['product_desc'].'</td>
          <td class="';?><?php 
          
          if($row['order_status'] == 'completed'){
          echo "text-success";  
          } 
          if($row['order_status'] == 'In-process'){
          echo "text-warning";  
          } 
          if($row['order_status'] == 'cancelled'){
          echo "text-danger";  
          } 
          
          
          ?> <?php echo '">'. ucfirst( $row['order_status']).'</td>
';


echo '
  <td><a href="orders_details.php?id='.$row['id'].'"><button type="submit" class="btn btn-dark">Order Details</button></a></td>
        </tr>

        </div>
       ';
        }
      }
      else{
        echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4 ps-4" style="height:200px !important;">
        Sorry ! no recent orders are not found ..
        
        </div>';
      }




      // echo 'hi';
      ?>
    
    </div>
 


  </div>
</div>







</div>








<?php 
include "inc/_footer.php";

    }

?>