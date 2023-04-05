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
if(isset($_SESSION['cus_username'])){
  // echo '<div class="text-light mt-2">'.$_SESSION["cus_username"].'</div>' ;
}

// include("inc/_heading_header.php")
 


?>
<main>

<!-- welcome to order tracking -->

<?php 
// main php code starts here
$get_order_no = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text_order_track_no']));
$get_order_phone_no = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['search_text_order_track_pho_no']));

// echo $get_order_no;
// echo $get_order_phone_no;

$sql = "SELECT * FROM `orders` WHERE `order_no` = '$get_order_no' AND `order_phone_no` = '$get_order_phone_no'";
$result = mysqli_query($conn, $sql);

if($result){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $order_no = $row['order_no'];
      $order_shipping_address = $row['order_shipping_address'];
      $order_phone_no = $row['order_phone_no'];
      $order_status = $row['order_status'];
      $order_est_delivery_datetime = $row['order_est_delivery_datetime'];
      $order_placed_datetime = $row['order_placed_datetime'];
    }
  }
}





// main php code ends here

?>
<style>
  .order_section{
    /* background-color: #ffa500; */
    background-color: #ff7a00;
    color: white;
  }
  .estimated_dalivary_datetime{
    background-color: #ffa500;
    color: white;
  }
  .ord_status{
    color: <?php if($order_status == 'completed')
    {
      echo 'green';
    }

    if($order_status == 'In-process'){
      echo '#ffa500';
    }

    if($order_status == 'pending'){
      echo '#ffa500';
    }
    if($order_status == 'cancelled'){
      echo 'red';
    }
    ?>;
  }
  .page{
    
    background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}
 
</style>

<div class="container mb-4 mt-4">
  <div class="row">
    <div class="col-4">
      <div class="container page rounded">
      <div>order address</div>
      <address><?php echo $order_shipping_address ?></address>
      <div class="phone_no">
      <span>Phone no</span>  
      <div class="number">
      <?php echo $order_phone_no ?>
      </div>
      </div>
      <div class="order_status mt-2">
        <div class="ord_status_title">
          Order Status
        </div>
        <div class="ord_status">
          <?php echo $order_status ?>

        </div>
      </div>
      </div>
    
    </div>
    <div class="col-8">
      <div class="container order_section pb-4 pt-2 rounded">
       <div class="order_title text-center fs-3">Order No</div> 
      <div class="fs-3 text-center"><?php echo $order_no ?></div> 
      </div>

      <div class="container page rounded">
        <div class="estimated_dalivary_datetime text-center fs-4 pt-2">
        <div class="est_ord_dat_tim_title">
        estimate dalivary date
        </div>  
        <div class="est_ord_dat_ti">
          <?php echo $order_est_delivery_datetime ?>
        </div>
        
        </div>
<div class="order_placed_on text-center fs-5">order placed in <?php
$strtotime = strtotime($order_placed_datetime);
$order_placed_date_is = date("d-m-Y h:i:s A", $strtotime);
echo $order_placed_date_is ?></div>
<div class="order_acpected">Order acepted</div>
<div class="pakaging_starts">Order packaging has been starts</div>
<div class="handed_on_courier">Order handed on couried</div>
<div class="delivared_on_customer">Order hasbeen delivared on the customer</div>
<!-- div. -->

      </div>
    </div>
  </div>
</div>


</main>
<!-- the main content ends here -->

<?php
include("inc/_footer.php");

?>