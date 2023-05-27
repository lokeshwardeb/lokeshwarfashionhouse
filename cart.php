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
<form action="checkout.php" method="get">
<div class="container-fluid pt-4 pb-5 mb-5">
  <div class="row">
    <div class="col-8">

      <table class="table <?php 
      // if($_SESSION['cart'][0] == ''){
      //   echo 'd-none';
      // }

      if(count($_SESSION['cart']) == 0){
        echo 'd-none';

      }
      
      
      ?>">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">Products</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    
          <?php

if(count($_SESSION['cart']) == 0){
  echo '<div class="text-center fs-4">The cart is empty</div>';
  

}

// if($_SESSION['cart'][0] == ''){
//   echo '<div class="text-center fs-4">The cart is empty</div>';
// }
          

          // displaying the cart items
  
       
            $no = 1;
          foreach ($_SESSION['cart'] as $key => $value) {
            $total = $total + $value["product_price"];
            echo '
 <tr>
      <th scope="row">'.$no.'</th>
      <td><img src="' . $value["product_image"] . '"  class="img-fluid product_img" alt="" srcset=""></td>
      <td>' . $value["product_name"] . '</td>
      <td>' .product_currency_bdt() . $value["product_price"] . ' <input class="iprice" type = "hidden" value= "'.$value["product_price"].'"></td>
      <td><input name="iproduct_qty" type="number" class="iqty input-group form-control" min="1" max="10" value="' . $value["product_qty"] . '" onchange="subTotal()"></td>
      <td class="d-flex"><div>'.product_currency_bdt().'</div><div class="itotal"></div></td>
      <form action="cart_manage.php" method="post">
      <input type = "hidden" value="' . $value["product_name"] . '" name="product_name">
      <td><button type="submit" class="input-group from-control btn btn-danger btn-sm" name="remove_cart">Remove</button></td>

      </form>
    </tr>
 
 ';
 $no++;
          }
    
        

          ?>

   
        </tbody>
      
      </table>
    
    </div>
    <div class="col-4 text-center">
      <div class="container border-primary border rounded bg-light pt-3 pb-5">
        <h2>Grand Total: </h2>
        <div class="container d-flex" style="justify-content:center;">
        <?php


echo product_currency_bdt() ?>
        <h4 id="gTotal">
         
        </h4>
        </div>



        <script>
          var gt = 0;
var iprice =document.getElementsByClassName("iprice");
var iqty =document.getElementsByClassName("iqty");
var itotal =document.getElementsByClassName("itotal")
var gTotal =document.getElementById("gTotal");


function subTotal(){
  gt = 0;
  for (let i = 0; i < iprice.length; i++) {
  // const element = array[i];
itotal[i].innerText = (iprice[i].value) * (iqty[i].value);
gt = gt + (iprice[i].value) * (iqty[i].value);
  
}

gTotal.innerText = gt;

}
subTotal();





        </script>


      </div>

   <a href="checkout.php"><button type="submit" class="btn btn-primary mt-4" name="checkout">Checkout</button></a>

    </div>
  </div>



</div>
</form>

<style>
  .product_img {
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