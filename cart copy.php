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
      <table class="table <?php
                          // if($_SESSION['cart'][0] == ''){
                          //   echo 'd-none';
                          // }

                          if (count($_SESSION['cart']) == 0) {
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
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php

          if (count($_SESSION['cart']) == 0) {
            echo '<div class="text-center fs-4">The cart is empty</div>';
          }

          // if($_SESSION['cart'][0] == ''){
          //   echo '<div class="text-center fs-4">The cart is empty</div>';
          // }


//           echo '
//           <script>
          
          
//           </script>
          
//           ';


// // cart manage starts here


// if (isset($_POST['add_cart'])) {
//   $product_id = $_POST['product_id'];
//   $product_name = $_POST['product_name'];
//   $product_desc = $_POST['product_desc'];
//   $product_price = $_POST['product_price'];
//   $product_qty = $_POST['product_qty'];
//   $product_image = $_POST['product_image'];



//   if (isset($_SESSION['cart'])) {
// // check all the product name if it contains on the cart session
//     $myCartItems = array_column($_SESSION['cart'], "product_name");

//     if(in_array($_POST['product_name'], $myCartItems)){
//         echo "<script>

//         alert('item already exist on cart')
//         window.location.href = 'index.php'
//         </script>";
//     }else{
//       $count = count($_SESSION['cart']);
//       $_SESSION['cart'][$count] =  array(
//         "product_id" => $product_id,
//         "product_name" => $product_name,
//         "product_desc" => $product_desc,
//         "product_price" => $product_price,
//         "product_qty" => $product_qty,
//         "product_image" => $product_image
//       );
//       echo '
//       <script>
//       alert("Item added on the cart")
//       window.location.href = "cart.php";
      
//       </script>
      
//       ';
  
//     }

 
 
//     // session_destroy();
//   } else {
//     $_SESSION['cart'][0] = array(
//       "product_id" => $product_id,
//       "product_name" => $product_name,
//       "product_desc" => $product_desc,
//       "product_price" => $product_price,
//       "product_qty" => $product_qty,
//       "product_image" => $product_image
//     );

//     echo '
//     <script>
//     alert("Item added on the cart")
//     window.location.href = "cart.php";
    
//     </script>
    
//     ';


//   }
// }









// // cart manage ends here






          // displaying the cart items
          $total = 0;

          // $pro_qty = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['pro_qty']), ENT_QUOTES) ;
            // setcookie("product_qty", null, time() - 3600);


        // echo  $product_qty_cookie = $_COOKIE["product_qty"];
          $no = 1;
          foreach ($_SESSION['cart'] as $key => $value) {
  
            // if(isset($product_qty_cookie) && $product_qty_cookie !== ''){
            //   $value['product_qty'] = $product_qty_cookie;

            // }

            // if(isset($product_qty_cookie) && $product_qty_cookie >= 10){
            //   $_COOKIE["product_qty"] = 10;
            // }

            // $product_qty_cookie;
            // echo 'this' . $value[$key];

            $multi = $value["product_price"] * $value['product_qty'];
            $total = $total + $multi;
            $product_price_cart = $value["product_price"];
            $product_qty_cart = $value["product_qty"];
            $value["product_qty"] = 

            $_SESSION['product_total_price'] = $total;
            $_SESSION['product_qty_is'] = $product_qty_cookie;
            // setcookie("product_qty", null, time() - 3600);

            // echo '
            // <script>
            // document.cookie = "product_qty=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=./;";
            // </script>
            
            // ';

            // if($pro_qty !== '' && $pro_qty <= 10){
            //   $value['product_qty'] = $pro_qty;
            // }

            // if($product_qty_cart == )
            $site_url = SITE_URL;
            // main template
            // <td><input id="cart_input_qty" type="number" class="input-group form-control" min="1" max="10" value="' . $value["product_qty"] . '"  onchange="multi(' . $product_price_cart . ')"></td>

            echo '
 <tr>
      <th scope="row">' . $no . '</th>
      <td><img src="' . $value["product_image"] . '"  class="img-fluid product_img" alt="" srcset=""></td>
      <td>' . $value["product_name"] . '</td>
      <td>' . product_currency_bdt() . $value["product_price"] . '</td>
      <form action="" method="post">

      <td><input name="inp_the_qty" id="cart_input_qty" type="number" class="input-group form-control" min="1" max="10" value="' . $value["product_qty"] . '"  onchange="multi(' . $product_price_cart . ')"></td>

      <td><button type="submit" class="input-group from-control btn btn-danger btn-sm" name="remove_cart">Remove</button></td>

      </form>

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
        <h2>Total: </h2>

        <?php
        // $_COOKIE['product_total_price']

        // setcookie("product_total_price", $total, time() - 3600);

        // unset($_COOKIE['product_total_price']);
        // setcookie('product_qty', null, time() - 60*60*24, "./"); // 

        echo '
   

          ';


        // echo product_currency_bdt() .  $total;






        ?>
        <div class="container d-flex" style="justify-content: center;">
          <div class="icon d-flex">
            <div class="fs-4"><?php echo product_currency_bdt() ?></div>

          </div>
          <div class="price d-flex">
            <div class="fs-4" id="cart_total_price">
<?php 

echo $total;


?>
            </div>
          </div>

        </div>





        <script>
          // function multi(product_price){
          //           let cart_input_qty = document.getElementById("cart_input_qty");

          //           let qty_value = cart_input_qty.value;

          //           let price  = product_price;
          //           let qty = qty_value;
          //           let total_price = price * qty;

          //           document.getElementById("cart_total_price").innerHTML =  total_price;

          //         }
        </script>
      </div>

      <a href="checkout.php"><button type="submit" class="btn btn-primary mt-4" name="process_checkout">Checkout</button></a>

    </div>
  </div>



</div>


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