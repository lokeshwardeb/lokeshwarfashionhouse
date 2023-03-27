<?php
include "inc/conn.php";
$active_class = 'products';
include "inc/_header.php";


include "inc/_navbar.php";

?>

<div class="container full-width title_bar mt-4">
    <?php

    include "inc/_title_bar.php";
    include("inc/const.php");



    ?>

    <?php

    $search_class = 'products';

    include "inc/_search.php";
    include("inc/functions.php");

    include("inc/_theme.php");


    $get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['id']), ENT_QUOTES);
    // echo $get_id;


    $sql = "SELECT * FROM `products` WHERE `product_id` = '$get_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_desc = $row['product_desc'];
                $product_img = $row['product_img'];
                $product_price = $row['product_price'];
                $product_status = $row['product_status'];
                $product_featured_status = $row['make_as_featured'];
                $product_added_datetime = $row['product_added_datetime'];
            }

            if ($product_img == '') {
                $product_img = 'nature-sea.jpg';
            }




            echo '
       
<div class="row">
<div class="col-6">
<a href = "products.php" class="mb-4"><button class = "btn btn-primary mb-4">Go to products</button></a><br>
    Product Id: ' . $product_id . ' <br>
    Product Name : ' . $product_name . ' <br>
    Product Description: ' . $product_desc . ' <br>
    Product Price: ' . $product_price . ' <br>
    <input type = "hidden" value="' . $row["product_name"] . '" name="product_name">
    <input type = "hidden" value="' . $row['product_price'] . '" name="product_price">
 
    <input type = "hidden" value="' . PRODUCT_INFO_PATH . '' . $row['product_img'] . '" name="product_image">
    
   <div class = ""> Product Status: '; ?><span class="<?php
                                                        if ($product_status == "In-stock") {
                                                            echo 'text-success';
                                                        }
                                                        if ($product_status == "Out-stock") {
                                                            echo 'text-danger';
                                                        }


                                                        ?>"><?php echo '' . $product_status . ' </span> </div> <br>
    
   <div class = "fs-5" id="featuredProductStatusId"> Product Featured Status: '; ?><span class="<?php
                                                                                                if ($product_featured_status == "featured_product") {
                                                                                                    echo 'bg-dark text-warning';
                                                                                                }
                                                                                                if ($product_featured_status == "not_featured_product") {
                                                                                                    echo 'bg-dark text-danger';
                                                                                                }


                                                                                                ?>"><?php
                                                                                                    if ($product_featured_status == "featured_product") {
                                                                                                        echo 'Featured Product';
                                                                                                    }
                                                                                                    if ($product_featured_status == "not_featured_product") {
                                                                                                        echo 'Not Featured Product';
                                                                                                    }
                                                                                                    echo '' .

                                                                                                        ' </span> </div> <br>
     <br>

</div>
<div class="col-6">
    <img src="' . PRODUCT_INFO_PATH . '' . $product_img . '" width="80%!important" height="250px!important" alt="" srcset="">
</div>

</div>
        
        ';



                                                                                                    ?>

                    <div class="box ms-2 ps-5 d-flex">
                        <label for="name"></label>
                        <button class="dec button pe-4 btn">-</button>
                        <input type="text" name="qty" id="1" value="1" class="numInp">
                        <button class="inc button ps-4 btn">+</button>
                    </div>
                    <div class="price d-inline-flex">
                        <div class="price_symbol">

                            <?php product_currency_bdt(); ?>
                        </div>
                        <div class="price_amount" name="product-price"><?php echo $product_price ?></div>
                    </div><br>


</div>

<form action="cart_manage.php" method="post">
<div class="price-button d-inline-flex mb-5 pb-5">
    <?php 
    
    echo '    <input type = "hidden" value="' . $product_name. '" name="product_name">
    <input type = "hidden" value="'.$product_price.'" name="product_price">
 
    <input type = "hidden" value="' . PRODUCT_INFO_PATH . '' . $row['product_img'] . '" name="product_image">';
    
    ?>
    <div class="cart-button me-4 ">
        <button type="submit" class="btn btn-outline-dark btn-sm-md" name="add_cart">Add to cart</button>
    </div>
    <div class="buy-button">
        <button type="submit" class="btn btn-dark btn-md-sm">Buy now</button>
    </div>
</div>


</form>



</div>';

</div>



<?php

        } else {
            echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
      Sorry ! the searching result with "' . $search . '" are not found ..
      
      </div>';
        }
    }





?>



</div>








<?php
include "inc/_footer.php";


?>