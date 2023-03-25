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
<?php 
// session_destroy();
if (isset($_POST['add_cart'])) {
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_qty = $_POST['product_qty'];
  $product_imgage_show = $_POST['product_image'];



  if (isset($_SESSION['cart'])) {
// check all the product name if it contains on the cart session
    $myCartItems = array_column($_SESSION['cart'], "product_name");

    if(in_array($_POST['product_name'], $myCartItems)){
        echo "<script>

        alert('item already exist on cart')
        window.location.href = 'index.php'
        </script>";
    }else{
      $count = count($_SESSION['cart']);
      $_SESSION['cart'][$count] =  array(
        "product_name" => $product_name,
        "product_price" => $product_price,
        "product_qty" => $product_qty,
        "product_image_show" => $product_imgage_show
      );
      echo '
      <script>
      alert("Item added on the cart")
      window.location.href = "cart.php";
      
      </script>
      
      ';
  
    }

 
 
    // session_destroy();
  } else {
    $_SESSION['cart'][0] = array(
      "product_name" => $product_name,
      "product_price" => $product_price,
      "product_qty" => $product_qty,
      "product_image_show" => $product_imgage_show
    );

    echo '
    <script>
    alert("Item added on the cart")
    window.location.href = "cart.php";
    
    </script>
    
    ';


  }
  // session_destroy();
  // print_r($_SESSION['cart']);

  // echo 'the qtu is' . $product_name;
  // echo 'the qtu is array' . $_SESSION['cart']['product_name'];
}

if(isset($_POST['remove_cart'])){
foreach ($_SESSION['cart'] as $key => $value) {
  if($value["product_name"] == $_POST["product_name"]){
    unset($_SESSION['cart'][$key]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    echo '<script>
alert("Item Removed")   
    window.location.href= "cart.php"
    
    </script>';
  }else{
    echo 'something error';
  }
}
}

// displaying the value


// echo '<pre>';
// print_r($_SESSION['cart']);
// echo '</pre>';

?>




</div>
<!-- about us ends here -->


</main>
<!-- the main content ends here -->

<?php 
// include("cart.php");
include("inc/_footer.php");

?>