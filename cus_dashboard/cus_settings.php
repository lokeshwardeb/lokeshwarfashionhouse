<?php
// this variable is to make activate the active class

// session_start();
include "../inc/conn.php";
$active_class = "settings";

include "inc/_cus_header.php";
include "inc/_cus_navbar.php";


if (!isset($_SESSION['cus_username'])) {
    //   header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

    // exit;

} elseif (isset($_SESSION['cus_username'])) {

    // $active_theme = 'dark_theme';

    include "inc/functions.php";

    include "inc/_navbar.php";

    include "inc/_company_info.php";



?>







    <div class="container title-bar mt-4" id="orderSec">

        <?php include "../inc/_title_bar.php"; ?>
        <?php


        $search_class = 'home';

        include "inc/_search.php";

        include("inc/_theme.php");


        ?>

        <div class="container">
            <div class="border-5 border-start border-primary ps-4 bg-light pe-4 pt-2 mt-2 pb-2">Need help ? 
  <a href="" class=""> Contract support</a>
            </div>
            <div class="border-5 border-start border-primary p-4 bg-light pb-2 pt-2 mt-2">Do you want to Retun product ? Give the details of the product you want to return. <a href="">Return Product</a> </div>
            <div class="border-5 border-start border-primary p-4 bg-light pb-2 pt-2 mt-2">Do you want to know our returning policy ? Read out our returning policy by clicking here. <a href="<?php echo SITE_URL?>return-refund-policy.php">Returning Policy</a> </div>
            <div class="border-5 border-start border-primary p-4 bg-light pb-2 pt-2 mt-2">Do you want to know our terms of service ? Read out our terms of service by clicking here. <a href="">Terms of service</a> </div>
        </div>
    </div>

    <!-- <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01"></label>
  <select class="form-select border-5 border-start border-light" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div> -->
    </main>

<?php

    include "inc/_cus_footer.php";
}

?>