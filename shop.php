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

<div class="container products-section">
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

                    <input type = "hidden" value="' . $row["product_name"] . '" name="product_name">
                    <div class="p-title d-block mt-2 mb-3 ms-4 product-title"  id="pro-name">
                     ' . $row['product_name'] . '
                    </div>

                    <input type = "hidden" value="' . PRODUCT_INFO_PATH . '' . $row['product_img'] . '" name="product_image">

                    <div class="p-title d-block mt-2 mb-3 ms-4 product-description" name="product-name" id="pro-name">
                     ' . $row['product_desc'] . '
                    </div>
                  </a>
                  <div class="box ms-2 ps-5 d-flex">
                    <label for="name"></label>
                    <input type="button" class="dec button pe-4 btn" value="-">
                    <input type="text"  name="product_qty" id="1" value="1" class="numInp product-qty" >
                    <input type="button" class="inc button ps-4 btn" value="+">
                  </div>
                  <div class="price d-inline-flex">
                    <div class="price_symbol">';
          product_currency_bdt();
          echo '</div>
                    <div class="price_amount" name="product_price">' . $row['product_price'] . '</div>
                  </div><br>
                  
                  <input type = "hidden" value="' . $row['product_price'] . '" name="product_price">
    
      
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


    <div class="buy-button more-products" style="">
      <a href="shop.php"><button type="submit" class="btn btn-outline-dark mt-4 more-products-btn" style="">More Products</button></a>
    </div>

  </div>
</div>

<!-- products section ends here -->







<!-- banner slider section starts here -->


<div id="carouselExampleCaptions" class="carousel slide banner-section">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/front-self.jpg" class="d-block w-100 main-banner-img" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/one-side-self.jpg" class="d-block w-100 main-banner-img " alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pink-room.jpg" class="d-block w-100 main-banner-img img-fluid" alt="..." height="250px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- banner slider section ends here -->


<!-- cart model starts here -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cart Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- cart model ends here -->


<!-- about us starts here -->
<div class="container mt-5 pt-5 mb-5">
  <div class="section-title text-center mt-4 mb-4">
    About us
  </div>
  <div class="row ">
    <div class="col-md-12 col-lg-6">
      <img src="img/lokeshwar_fashion_house 1.png" class="img-fluid" alt="" srcset="">
    </div>
    <div class="col-md-12 col-lg-6 bg-light custom-round">
      <div class="mt-4 ">
        <?php echo $website_description ?>
      </div>
    </div>
  </div>
</div>
<!-- about us ends here -->


</main>
<!-- the main content ends here -->

<?php
include("inc/_footer.php");

?>