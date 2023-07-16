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



?>



<!-- products section starts here -->

<div class="container products-section mb-4">
  <div class="section-title text-center mt-4 mb-4">
    Products
  </div>

  <div class="f-products-section">
    <div class="row container cus-d-block">
      <?php

      $all_product_sql = "SELECT * FROM `products`"; // WHERE `make_as_featured` = 'featured_product'

      $all_product_result = mysqli_query($conn, $all_product_sql);



      if ($all_product_result) {
        if (mysqli_num_rows($all_product_result)) {
          while ($row = mysqli_fetch_assoc($all_product_result)) {
            echo '<div class="col-md-12 container col-lg-4 products-col mb-4 p-3 custom-bg-light">
            <form action="cart_manage.php" method="post" >
            <div class="product-info">
              <a href="product_details_cus_disp.php?id=' . $row['product_id'] . '" class="nav-link">
                  <div class="p-img">
                    <img src="' . PRODUCT_INFO_PATH . '' . $row['product_img'] . '"" alt="" >
                  </div>

                  <input type = "hidden" value="' . $row["product_id"] . '" name="product_id">
                  <input type = "hidden" value="' . $row["product_name"] . '" name="product_name">
                  <div class="p-title d-block mt-4 mb-3 ms-4 product-title"  id="pro-name">
                   ' . $row['product_name'] . '
                  </div>

                  <input type = "hidden" value="' . PRODUCT_INFO_PATH . '' . $row['product_img'] . '" name="product_image">

                  <div class="p-title d-block mt-2 mb-3 ms-4 product-description" name="product-name" id="pro-name">
                   ' . $row['product_desc'] . '
                  </div>
                  ';?>
                  <?php 

                  if($row['product_status'] == 'In-stock'){
echo '

<div class="p-title d-block mt-2 mb-3 ms-4 product-description text-success p-3" name="product-name" id="pro-name">
' . $row['product_status'] . '
</div>

';
                  }
                  if($row['product_status'] == 'Out-stock'){
echo '

<div class="p-title d-block mt-2 mb-3 ms-4 product-description text-danger p-3" name="product-name" id="pro-name">
' . $row['product_status'] . '
</div>

';
                  }

                  echo '
                 
                </a>
                <div class="box ms-2 ps-5 d-flex">
                  <label for="name"></label>
                  <input type="button" class="dec button pe-4 btn" value="-">
                  <input type="text"  name="product_qty" id="1" value="1" class="numInp product-qty" >
                  <input type="button" class="inc button ps-4 btn" value="+">
                </div>
                <div class="price d-inline-flex">
                  <div class="price_symbol">';
      echo  product_currency_bdt();
        echo '</div>
                  <div class="price_amount" name="product_price">' . $row['product_price'] . '</div>
                </div><br>
                
                <input type = "hidden" value="' . $row['product_price'] . '" name="product_price">
                <input type = "hidden" value="' . $row['product_desc'] . '" name="product_desc">
                <input type = "hidden" value="' . $row['product_status'] . '" name="product_status">
  
    
              </div>
              <div class="price-button d-inline-flex mt-4">
                <div class="cart-button me-4 ">
                  <button type="submit" class="btn btn-outline-dark btn-sm-md" name="add_cart">Add to cart</button>
                </div>
                <div class="buy-button">
                  <button type="submit" class="btn btn-dark btn-md-sm" name="add_cart">Buy now</button>
                </div>
              </div>
          </form>
          




        </div>';
          }
        }
      }


      ?>



    </div>


    <!-- <div class="buy-button more-products" style="">
      <a href="shop.php"><button type="submit" class="btn btn-outline-dark mt-4 more-products-btn" style="">More Products</button></a>
    </div> -->

  </div>
</div>

<!-- products section ends here -->



<!-- banner slider section starts here -->


<?php

        $sql = "SELECT * FROM `page_settings`";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $hero_aria_bold_word = $row['hero_aria_bold_word'];
                    $hero_aria_offer_title = $row['hero_aria_offer_title'];
                    $hero_aria_offer_title_photo = $row['hero_aria_offer_title_photo'];
                    $hero_aria_offer_canvas_img1 = $row['hero_aria_offer_canvas_img1'];
                    $hero_aria_offer_canvas_img2 = $row['hero_aria_offer_canvas_img2'];
                    $hero_aria_offer_canvas_img3 = $row['hero_aria_offer_canvas_img3'];
                    $hero_aria_canvar_offer_canvar_title_1 = $row['hero_aria_canvar_offer_canvar_title_1'];
                    $hero_aria_canvar_offer_canvar_title_2 = $row['hero_aria_canvar_offer_canvar_title_2'];
                    $hero_aria_canvar_offer_canvar_title_3 = $row['hero_aria_canvar_offer_canvar_title_3'];
                    $hero_aria_canvar_offer_canvar_sub_title_1 = $row['hero_aria_canvar_offer_canvar_sub_title_1'];
                    $hero_aria_canvar_offer_canvar_sub_title_2 = $row['hero_aria_canvar_offer_canvar_sub_title_2'];
                    $hero_aria_canvar_offer_canvar_sub_title_3 = $row['hero_aria_canvar_offer_canvar_sub_title_3'];
                    $datetime = $row['datetime'];
                }

                
            }
        }
?>


<style>
.slide_img{
  /* height: <?php ?>;
  width: <?php ?>; */


  /* height: 250px !important;
  width: 250px !important;
  margin: auto !important; */
  height: 100vh !important;
  width: 50vw!important;
  margin: auto !important;
}
/* 
.slide_img {
    height: auto;

    margin: auto !important;
} */
</style>

<!-- 




 -->

</main>
<!-- the main content ends here -->

<?php
include("inc/_footer.php");

?>