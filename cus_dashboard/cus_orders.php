<?php
// this variable is to make activate the active class

// session_start();
include "../inc/conn.php";
$active_class = "my orders";

include "inc/_cus_header.php";
include "inc/_cus_navbar.php";


if(!isset($_SESSION['cus_username'])){
//   header("location: index.php");
  die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>') ;

  // exit;

}
elseif(isset($_SESSION['cus_username'])){
  
// $active_theme = 'dark_theme';
  
include "inc/functions.php";

include "inc/_navbar.php";

include "inc/_company_info.php";



?>







<div class="container title-bar mt-4" id="orderSec">
  
  <?php include "../inc/_title_bar.php";?>
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
            if($result_check){
              while($row = mysqli_fetch_assoc($result_check)){
              $check_user_id =  $row['cus_id'];
              }
            }
$check_customer_sql = "SELECT * FROM `customers` WHERE `cus_id` = '$check_user_id'";
$result_customer_check = mysqli_query($conn, $check_customer_sql);
if($result_customer_check){
while($row = mysqli_fetch_assoc($result_customer_check)){
  $customer_id = $row['customer_id'];
  
}

  
}
$sql_orders_check = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
$result_sql_orders_check = mysqli_query($conn, $sql_orders_check);
if($result_sql_orders_check){
  if(mysqli_num_rows($result_sql_orders_check) > 0){
    $total_orders_count = mysqli_num_rows($result_sql_orders_check);
    $sql_in_process = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id' AND `order_status` = 'In-process'";
    $result_sql_in_process = mysqli_query($conn, $sql_in_process);

    if($result_sql_in_process){
      $in_process_orders_count = mysqli_num_rows($result_sql_in_process);
    }
    // $in_process_orders_count = 
    $sql_delivered = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id' AND `order_status` = 'completed'";
    $result_delivered = mysqli_query($conn, $sql_delivered);

    if($result_delivered){
      $delivered_orders_count = mysqli_num_rows($result_delivered);
    }

  }else{
    $total_orders_count = 0;
    $in_process_orders_count = 0;
    $delivered_orders_count = 0;
  }
}


           
              ?>
              <span class="fs-5"><?php echo $total_orders_count?> </span>
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
              <span class="fs-5"><?php echo  $in_process_orders_count?> </span>
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
              <span class="fs-5"><?php echo $delivered_orders_count ?> </span>
            </p>
          </div>
          <div class="col-6">
            <img class="img-fluid" src="<?php echo SITE_URL ?>ecom-admin/img/delivered.png " alt="" srcset="" width="150px" height="100px" style="border-radius: 20px;">
          </div>
        </div>

      </div>


      <!-- new order section -->
      <div class="container">
        <div class="">
          <div class="fs-4 mb-4 mt-2">Recent orders</div>
          <?php 
          
          $sql = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
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

              
              <td><a href="cus_orders_details.php?id='.$row['id'].'"><button type="submit" class="btn btn-dark">Order Details</button></a></td>
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