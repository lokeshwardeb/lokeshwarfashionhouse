<?php
include 'inc/_error_reporting.php';
$active_class = 'home';
// $website_slogan = 'feel the shopping';

include("inc/_header.php");
include("inc/conn.php");
include("inc/const.php");
include("inc/functions.php");

?>

<?php
include("inc/_navbar.php");



?>
<div class="container-fluid pt-4 pb-5 mb-5">
  <div class="row">
    <div class="col-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">Products</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    
          <?php

         
          

          // displaying the cart items
          $total = 0;
       
            
          foreach ($_SESSION['cart'] as $key => $value) {
            $total = $total + $value["product_price"];
            echo '
 <tr>
      <th scope="row">1</th>
      <td><img src="' . $value["product_image_show"] . '"  class="img-fluid" alt="" srcset=""></td>
      <td>' . $value["product_name"] . '</td>
      <td>' . $value["product_price"] . '</td>
      <td><input type="number" class="input-group form-control" min="1" max="10" value="' . $value["product_qty"] . '"></td>
      <form action="cart_manage.php" method="post">
      <input type = "hidden" value="' . $value["product_name"] . '" name="product_name">
      <td><button type="submit" class="input-group from-control btn btn-danger btn-sm" name="remove_cart">Remove</button></td>

      </form>
    </tr>
 
 ';
          }
    
        

          ?>

      

        </tbody>
      
      </table>
    
    </div>
    <div class="col-4 text-center">
      <div class="container border-primary border rounded bg-light pt-3 pb-5">
        <h2>Total: </h2>
        <h4>
          <?php


            echo product_currency_bdt() .  $total; ?>
        </h4>




      </div>

      <button type="submit" class="btn btn-primary mt-4">Checkout</button>

    </div>
  </div>



</div>


<style>
  img {
    height: 100px !important;
  }

  input {
    text-align: center !important;
  }
</style>




</div>
<!-- about us ends here -->


</main>
<!-- the main content ends here -->

<?php
// include("cart.php");
include("inc/_footer.php");

?>