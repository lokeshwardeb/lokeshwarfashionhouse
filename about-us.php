<?php
include 'inc/_error_reporting.php';
$active_class = 'home';
// $website_slogan = 'feel the shopping';

include("inc/_header.php");
include("inc/conn.php");
include("inc/const.php");
include("inc/functions.php");
include("inc/_navbar.php");

?>
    <div class="container hero-area-canvas-bg mt-4 pt-4 mb-4 pb-4 text-dark">
        <div class="container mt-2">
           <h1>About us (<?php echo $website_name ?>)</h1>
           <p>Welcome to our about us page. <?php echo $website_name ?> is a online based store where you can find various fashionable products and clothing items. You will find best quality products from us. We are a online based ecommerce store.</p>

           <div class="container mt-5 pt-5">
            <!-- <div class="section-title text-center mt-4 mb-4">
              About us
            </div> -->
            <div class="row">
              <div class="col-lg-6 col-md-12 mb-4">
                <img src="img/lokeshwar_fashion_house 1.png" class="img-fluid" alt="" srcset="">
              </div>
              <div class="col-lg-6 col-md-12 mb-4 bg-light custom-round">
                <div class="mt-4 ">
                  We are a online fashion store. You will find fashionable and designable clothes on our store. We are a
                  online fashion store. You will find fashionable and designable clothes on our store. We are a online
                  fashion store. You will find fashionable and designable clothes on our store. We are a online fashion
                  store. You will find fashionable and designable clothes on our store. We are a online fashion store. You
                  will find fashionable and designable clothes on our store.
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>














<?php
include("inc/_footer.php")
?>

</body>
</html>