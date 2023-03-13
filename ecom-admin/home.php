<?php
// this variable is to make activate the active class
$active_class = 'home';
// $active_theme = 'dark_theme';
include "inc/conn.php";

include "inc/_header.php";

if(!isset($_SESSION['username'])){
  header("location: index.php");
  die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>') ;

  // exit;

}
elseif(isset($_SESSION['username'])){
  
// $active_theme = 'dark_theme';
  
include "inc/functions.php";

include "inc/_navbar.php";

include "inc/_company_info.php";



?>







<div class="container title-bar mt-4" id="orderSec">
  
  <?php include "inc/_title_bar.php";?>
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
              $sql = "SELECT * FROM `orders`";
              $result = mysqli_query($conn, $sql);

              if($result){
                $total_orders_count = mysqli_num_rows($result);
              }

              ?>
              <span class="fs-5"><?php echo $total_orders_count?> </span>
            </p>
          </div>
          <div class="col-6">
            <img class="img-fluid" src="img/products.jpg" width="150px" style="border-radius: 20px;" height="100px" alt="" srcset="">
          </div>
        </div>

      </div>
      <div class="col-4 custom-box-bg-color border-start border-primary border-5 custom-box-height pt-2">
        <div class="row">
          <div class="col-6">
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
          <div class="col-6">
            <img class="img-fluid" src="img/process.jpg" alt="" srcset="" width="100px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>
      <div class="col-4 custom-box-bg-color border-start border-primary border-5 pt-2">

        <div class="row">
          <div class="col-6">
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
          <div class="col-6">
            <img class="img-fluid" src="img/delivered.png" alt="" srcset="" width="150px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>


      <!-- new order section -->
      <div class="container">
        <div class="">
          <div class="fs-4 mb-4 mt-2">Recent orders</div>
          <?php 
          
          $sql = "SELECT * FROM `orders` ORDER BY `orders`.`id` DESC";
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
              <th scope="row">'.$no++ . '</th>
              <td>'.$row['id'].'</td>
              <td>'.$row['product_name'].'</td>
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

              
              <td><a href="orders_details.php?id='.$row['id'].'"><button type="submit" class="btn btn-dark">Order Details</button></a></td>
            </tr>';
            }
          }
          else{
            echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
            Sorry ! the searching result with "'.$search.'" are not found ..
            
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

include "inc/_footer.php";
        }

?>