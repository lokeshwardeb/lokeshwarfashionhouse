<?php 
if(isset($_SESSION['cus_username'])){
include "cus_dashboard/inc/_cus_navbar.php";
}else{




?>
<style>
  .customr-user-select-none{
    -webkit-user-select: none;
    user-select: none;
  }

  #preloader{
    background: #ddd url(img/preloader_un.gif) no-repeat center center;
    height: 100vh !important;
    width: 100vw !important;
    position: fixed !important;
    z-index: 100 !important;
}

</style>


<body>

<?php 

if($active_class == 'checkout'){
    
echo '
<div  class="loading">

<div id="preloader" class="text-center pt-5 fs-4">
Please wait and do not close the window while we are processing...
</div>

</div>


';

}else{

echo '
<div id="preloader"></div>

';
}



?>
   




  <!-- the main content starts here -->
  <!-- <div id="preloader"></div> -->
  <main>
    
    <!-- navbar starts here -->
    <div class=" ">
      <!-- <h1>Hello, world!</h1> -->
      <nav class="container-fluid navbar d-print-none navbar-dark  navbar-expand-lg custom-navbar-bg customr-user-select-none">
        <div class="container-fluid">
          <a class="navbar-brand custom-light" href="./"><?php
          echo $website_name;
          ?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto">
              <li class="nav-item">
                <a class="nav-link custom-light text-center active m-auto me-4" aria-current="page"
                  href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link custom-light m-auto me-4" href="about-us.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link custom-light m-auto me-4" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link custom-light m-auto me-4" href="privacy-policy.php">Privacy Policy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link custom-light m-auto me-4" href="termsofservice.php">Terms of service</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link custom-light m-auto me-4" href="returnandrefundpolicy.html">Return and refund
                  policy</a>
              </li> -->
              <li class="nav-item">
              </li>
              <a class="nav-link custom-light text-center " href="login.php">Login/Signup</a>

              <li class="nav-item">
                <a class="nav-link custom-light m-auto me-4" href="#">Contract Us</a>
              </li>

              <!-- checkout button model starts here -->
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-light me-4 " data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                carts
              </button>
              <!-- checkout button model ends here -->

<!-- search button model starts here -->
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-light me-4 " data-bs-toggle="modal"
                data-bs-target="#searchModal">
                Search
              </button>
              <!-- search button model ends here -->
              <!-- buy now button in navbar starts here -->
             
              <form class="d-flex cus-col-mt" role="search">

              <a href="shop.php">  <button class="btn btn-dark" type="button">Buy now</button></a>
              </form>
              <!-- buy now button in navbar ends here -->

         

          </div>
        </div>
      </nav>
    </div>


    <!-- navbar ends here -->

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
         
        
        <!-- <table class="table">
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
    <tr>
      <th scope="row">1</th>
      <td><img src="img/front-self.jpg" class="img-fluid" alt="" srcset=""></td>
      <td>The new brang dkkm imagjkre ndjnje nejn</td>
      <td>@dfdafdmknkn thkjenmnk eikek ekjkekmkrj </td>
      <td><input type="number" class="input-group" min="1" max="10" ></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
<table class="table <?php
 if($_SESSION['cart'][0] == ''){
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
// include("functions.php");
         if($_SESSION['cart'][0] == ''){
          echo 'the cart is empty';
         }
          
// include_once("inc/functions.php");
          // displaying the cart items
          $total = 0;
       $no = 1;
            
          foreach ($_SESSION['cart'] as $key => $value) {
            // $total = $total + $value["product_price"];
            echo '
 <tr>
      <th scope="row">'.$no.'</th>
      <td><img src="' . $value["product_image_show"] . '"  class="img-fluid" alt="" srcset=""></td>
      <td>' . $value["product_name"] . '</td>
      <td>' . product_currency_bdt() . $value["product_price"] . '</td>
      <td><input type="number" class="input-group form-control" min="1" max="10" value="' . $value["product_qty"] . '"></td>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <a href="checkout.php"><button type="button" class="btn btn-primary">Checkout</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- cart model ends here -->


    <!-- search model starts here -->


  <!-- Modal -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Search Products ...</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <?php 
         $search_class = 'products';
         ?>
        <form class="d-flex" role="search" action="./cus_disp_search_exe.php" method="get ">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_text">
        <input class="form-control me-2 visually-hidden" type="search" placeholder="Search" aria-label="Search" name="search_class" value="<?php echo $search_class ?>">
       
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>


        </div>
        <div class="modal-footer">
      
        </div>
      </div>
    </div>
  </div>
  <!-- search model ends here -->

<?php 

}
?>