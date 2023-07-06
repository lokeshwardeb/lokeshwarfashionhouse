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
<!-- <form action="checkout.php" method="get"> -->
<div class="container-fluid pt-4 pb-5 mb-5">
  <div class="row">
    <div class="col-8 table-responsive">

      <table class="table <?php 
      // if($_SESSION['cart'][0] == ''){
      //   echo 'd-none';
      // }

      if(count($_SESSION['cart']) == 0){
        echo 'd-none';

      }

      
// echo "
// <script>
// // JavaScript anonymous function
// (() => {
//     if (window.localStorage) {

//         // If there is no item as 'reload'
//         // in localstorage then create one &
//         // reload the page
//         if (!localStorage.getItem('reload')) {
//             localStorage['reload'] = true;
//             window.location.reload();
//         } else {

//             // If there exists a 'reload' item
//             // then clear the 'reload' item in
//             // local storage
//             localStorage.removeItem('reload');
//         }
//     }
// })(); // Calling anonymous function here only

// </script>";
      
      
      ?>">
        <thead>
          <tr>
               <script>



                // window.onload
    //             const reloadUsingLocationHash = () => {
    //   window.location.hash = "reload";
    // }
    // window.onload = reloadUsingLocationHash();

    // for (let i = 0; i < 4; i++) {
    //   // const element = array[i];
    //   window.location();
      
    // }


    // window.onload = function () {window.location.reload()}


               </script>
            <?php
            //  echo $_COOKIE['grand_total']; 
             
             ?>
             <div class="text-danger text-center mb-2 ">*NOTE: Please click on <b>Update Cart</b>  button each time you changes the cart items quantity</div>
             <div class="text-danger text-center mb-4 ">*লক্ষ করুন: প্রতেকবার পণের পরিমাণ পরিবর্তন করার পর <b>Update Cart</b> বাটনে ক্লিক করুন</div>
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
  ?>

<!-- <form action="checkout" method="post"> -->


<?php

$_SESSION['cart_qty'][0] = array(
  "product_qty" => $product_qty,
);
       
            $no = 1;
          foreach ($_SESSION['cart'] as $key => $value) {
            $total = $total + $value["product_price"];
            echo '
 <tr>
      <th scope="row">'.$no.'</th>
      <td><img src="' . $value["product_image"] . '"  class="img-fluid product_img" alt="" srcset=""></td>
      <td>' . $value["product_name"] . '</td>
      <td>' .product_currency_bdt() . $value["product_price"] . ' <input class="iprice" type = "hidden" value= "'.$value["product_price"].'"></td>
      <form action="cart_manage.php" method="post">
      <td><input name="iproduct_qty" type="number" class="iqty input-group form-control" min="1" max="10" value="' . $value["product_qty"] . '" onchange="subTotal()"></td>
      <td class="d-flex"><div>'.product_currency_bdt().'</div><div class="itotal" name="itotal"></div></td>
      
      <input type = "hidden" value="' . $value["product_id"] . '" name="product_id">
      <input type = "hidden" value="' . $value["product_name"] . '" name="product_name">
      <input class="idprice" name="iprice" type = "hidden" value= "'.$value["product_price"].'">
      <td><button type="submit" class="input-group from-control btn btn-dark btn-sm" name="update_cart">Update cart</button></td>
      <td><button type="submit" class="input-group from-control btn btn-danger btn-sm" name="remove_cart">Remove</button></td>

      </form>
    </tr>
 
 ';
 $no++;
          }
    
        

          ?>

<!-- </form> -->
        </tbody>
      
      </table>
    
    </div>
    <div class="col-4 text-center">
      <div class="container border-primary border rounded bg-light pt-3 pb-5">
        <h2>Grand Total: </h2>
        <div class="container d-flex" style="justify-content:center;">
        <?php
 $grand_total_cookie = $_COOKIE['grand_total'];
if(isset($_COOKIE['grand_total'])){
$_SESSION['grand_total'] = $_COOKIE['grand_total'];
// echo 'cookie set';
// echo "
// <script>
// // JavaScript anonymous function
// (() => {
//     if (window.localStorage) {

//         // If there is no item as 'reload'
//         // in localstorage then create one &
//         // reload the page
//         if (!localStorage.getItem('reload')) {
//             localStorage['reload'] = true;
//             window.location.reload();
//         } else {

//             // If there exists a 'reload' item
//             // then clear the 'reload' item in
//             // local storage
//             localStorage.removeItem('reload');
//         }
//     }
// })(); // Calling anonymous function here only

// </script>";
  
}else{
  echo '
  <script>
  // location.reload();
  </script>
  
  ';

  // echo "
  // <script>
  // // JavaScript anonymous function
  // (() => {
  //     if (window.localStorage) {

  //         // If there is no item as 'reload'
  //         // in localstorage then create one &
  //         // reload the page
  //         if (!localStorage.getItem('reload')) {
  //             localStorage['reload'] = true;
  //             window.location.reload();
  //         } else {

  //             // If there exists a 'reload' item
  //             // then clear the 'reload' item in
  //             // local storage
  //             localStorage.removeItem('reload');
  //         }
  //     }
  // })(); // Calling anonymous function here only

  // </script>";
  echo 'not set cookie';
}

// echo "
// <script>
// // JavaScript anonymous function
// (() => {
//     if (window.localStorage) {

//         // If there is no item as 'reload'
//         // in localstorage then create one &
//         // reload the page
//         if (!localStorage.getItem('reload')) {
//             localStorage['reload'] = true;
//             window.location.reload();
//         } else {

//             // If there exists a 'reload' item
//             // then clear the 'reload' item in
//             // local storage
//             localStorage.removeItem('reload');
//         }
//     }
// })(); // Calling anonymous function here only

// </script>";
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
// var gt = 
// if(getCookie("grand_total") == ''){
//  gt =  gTotal.value;
//  gTotal.innerText
// document.cookie = `grand_total=${gt}`;
// }
// getCookie("grand_total")


function subTotal(){
  gt = 0;
  for (let i = 0; i < iprice.length; i++) {
  // const element = array[i];
itotal[i].innerText = (iprice[i].value) * (iqty[i].value);
gt = gt + (iprice[i].value) * (iqty[i].value);
  
}

gTotal.innerText = gt;
document.cookie = `grand_total=${gt}`;
// JavaScript anonymous function
(() => {
    if (window.localStorage) {

        // If there is no item as 'reload'
        // in localstorage then create one &
        // reload the page
        if (!localStorage.getItem('reload')) {
            localStorage['reload'] = true;
            window.location.reload();
        } else {

            // If there exists a 'reload' item
            // then clear the 'reload' item in
            // local storage
            localStorage.removeItem('reload');
        }
    }
})(); // Calling anonymous function here only

}
subTotal();





        </script>


      </div>

   <a href="checkout.php"><button type="submit" class="btn btn-primary mt-4" name="checkout">Checkout</button></a>

    </div>
  </div>



</div>
<!-- </form> -->

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