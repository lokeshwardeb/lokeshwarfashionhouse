<?php
include "inc/conn.php";
$active_class = 'products';
$get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['id']), ENT_QUOTES);
// echo $get_id;


$sql_product_keywords = "SELECT * FROM `products` WHERE `product_id` = '$get_id'";
$result_product_keywords = mysqli_query($conn, $sql_product_keywords);
if ($result_product_keywords) {
    if (mysqli_num_rows($result_product_keywords) > 0) {
        while ($row = mysqli_fetch_assoc($result_product_keywords)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_desc = $row['product_desc'];
            $product_img = $row['product_img'];
            $product_price = $row['product_price'];
            $product_status = $row['product_status'];
            $product_featured_status = $row['make_as_featured'];
            $product_keywords = $row['product_keywords'];
            $product_added_datetime = $row['product_added_datetime'];
        }
    }
}
// $sql_product_keywords = "";
// $result_product_keywords = "";


$keywords = $product_keywords;


include "inc/_header.php";
// include("inc/functions.php");
require_once("inc/functions.php");


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
<a href = "shop.php" class="mb-4"><button class = "btn btn-primary mb-4">Go to products</button></a><br>

<div id="hover_box" class=""></div>

<div class = "container " id = "product_info_main">
    Product Id: ' . $product_id . ' <br>
    Product Name : ' . $product_name . ' <br>
    Product Description: ' . $product_desc . ' <br>
    Product Price: ' . product_currency_bdt() .  $product_price . ' <br>
    <input type = "hidden" value="' . $row["product_name"] . '" name="product_name">
    <input type = "hidden" value="' . $row['product_price'] . '" name="product_price">
 
    <input type = "hidden" value="' . PRODUCT_INFO_PATH . '' . $row['product_img'] . '" name="product_image">
    
   <div class = ""> Product Status: '; ?><span class="<?php
                                                        if ($product_status == " In-stock") {
                                                            echo 'text-success';
                                                        }
                                                        if ($product_status == "Out-stock") {
                                                            echo 'text-danger';
                                                        } ?>">
                <?php echo '' . $product_status . ' </span> </div> <br>'; ?>

                <div id="featuredProductStatusId" class="fs-5 <?php
                                                                if ($product_featured_status == " not_featured_product") {
                                                                    echo 'd-none';
                                                                } ?>">
                                                                <span class="<?php
                                                                                                    if ($product_featured_status == "featured_product") {
                                                                                                        echo 'bg-dark text-warning';
                                                                                                    }
                                                                                                    if ($product_featured_status == "not_featured_product") {
                                                                                                        // echo 'bg-dark text-danger';
                                                                                                    } ?>">
                        <?php
                        if ($product_featured_status == "featured_product") {
                            echo 'Featured Product';
                        }
                        if ($product_featured_status == "not_featured_product") {
                            // echo 'Not Featured Product';
                        }
                        echo '' .

                            ' </span> </div> <br>
     <br>
</div>



</div>
<div class="col-6 " id="product">
<div class="main" id="disp_main_img">
    <span  id="lences"></span>
<img src="' . PRODUCT_INFO_PATH . '' . $product_img . '" width="100%!important" height="100%!important" alt="" srcset="" class="product_img_cus_disp">
</div>
   
</div>

</div>
        
        ';



                        ?>
                        <style>
                            /* .product_img_cus_disp{
        transition: transform 2s;
    }
    .product_img_cus_disp:hover{
        transform: scale(1.3);
    } */

                            #disp_main_img {

                                margin-bottom: 50px;
                                /* width: 100px; */
                                /* width: 100%;
height: 100%;
padding-left: -25px; */
                                /* margin-left: 50px;
margin-right: 50px; */
                                overflow: hidden !important;
                                /* position: relative; */
                            }

                            #lences {
                                display: none;
                                position: absolute;
                                height: 200px;
                                width: 400px !important;
                                background-color: rgba(0, 0, 0, .4);
                                /* transform: translate(-50%, -50%); */
                                pointer-events: none !important;
                                overflow: hidden !important;
                                outline: hidden !important;
                            }

                            /* #hover_box{
height: 500px;
width: 200px;
background-size: cover !important ;
transform: translate(-50%);
background: url("<?php echo  PRODUCT_INFO_PATH . $product_img  ?>") !important;
} */
                            #hover_box {
                                border: 1px solid black;
                                height: 100% !important;
                                width: 100% !important;
                                background: url("<?php echo PRODUCT_INFO_PATH . $product_img ?> ") !important;
                                background-size: 600% 600%;
                                overflow: hidden !important;

                                display: none !important;

                            }

                            /* #hover_box:hover{
display: block !important;

} */


img{
    max-width: 600px;
    max-height: 500px;
}



                        </style>



                        <!-- <div class="container" id="product_qty_main">
                            <div class="box ms-2 ps-5 d-flex">
                                <label for="name"></label>
                                <button class="dec button pe-4 btn">-</button>
                                <input type="text" name="product_qty" id="1" value="1" class="numInp">
                                <button class="inc button ps-4 btn">+</button>
                            </div>
                            <div class="price d-inline-flex">
                                <div class="price_symbol">

                                    <?php echo product_currency_bdt(); ?>
                                </div>
                                <div class="price_amount" name="product-price">
                                    <?php echo $product_price ?>
                                </div>
                            </div><br>
                        </div> -->



                </div>




                <script>
var lences = document.getElementById("lences")
              var disp_main_img = document.getElementById("disp_main_img");
              var hover_box = document.getElementById("hover_box");
              var product_info_main = document.getElementById("product_info_main");
              var product_qty_main = document.getElementById("product_qty_main");
          
              
              disp_main_img.addEventListener("mouseenter", function(){
                  hover_box.style.display = "block";
                  lences.style.display = "block";
                  product_info_main.style.display = "none";
                  product_qty_main.style.display = "none";
          
              });
          
              disp_main_img.addEventListener("mouseleave", function(){
                  hover_box.style.display = "none";
                  lences.style.display = "none";
                  product_info_main.style.display = "block";
                  product_qty_main.style.display = "block";
              })
              
          
              disp_main_img.addEventListener("mousemove", function (e) {
                  var x = e.clientX - e.target.offsetLeft;
                  var y = e.clientY - e.target.offsetTop;
                 var xx = lences.style.left = x + 750+ 'px';
                 var xx1 = lences.style.left = x + 750;
                var yy =   lences.style.top = y + 250+ 'px';
                var yy1 =   lences.style.top = y + 250;
          
          
                console.log(y)
                
              //   if(x > 40  && x < 500){
              //     hover_box.style.display = "block";
              //   }
                
              //   if(x < 40  && x > 500){
              //     // hover_box.setAttribute("style", "display:none !important");
              //     hover_box.setAttribute("style", `display:none !important;`);
                  
              //     hover_box.style.display = "none";
              //     // lences.style.display = "none";
              //     // hover_box = "none";
                  
              //   }
          
              if(y < -80){
                  lences.style.width = "150px";
                  yy = lences.style.left = "800px";
          
              }
          
                if(x < 40){
                  lences.style.width = "150px";
                  xx = lences.style.left = "800px";
          
          
                }
          
                if(x > 500){
                  lences.style.width = "150px";
                  xx = lences.style.left = "1250px";
          
          
                }
          
                if(x > 340){
                  lences.style.width = "150px";
                  xx = lences.style.left = "1250px";
          
          
                }else{
                  lences.style.width = "300px";
          
                }
          
              //   if(xx < '1200px'){
              //     lences.style.width = "300px";
              //     // xx = lences.style.left = "1250px";
              //    var xx = lences.style.left = x + 750+ 'px';
          
          
              //   }
              //   else if(xx > '1200px'){
              //     xx = lences.style.left = "1250px";
              //     lences.style.width = "150px";
              //   }else{
              //     var xx = lences.style.left = "800px";
              //     lences.style.width = "300px";
          
              //   }
          
          
          
                
              //   hover_box.setAttribute("style", `background-position: ${(x-(500 /2 /6)+14) * -6}px ${(y - (500 / 2 /6)+ 44) * -6 }px !important; background-repeat: no-repeat !important; display:block !important;`)
                hover_box.setAttribute("style", `background-position: ${(x-(500 /2 /6)+14) * -6}px ${(y - (500 / 2 /6)+ 44) * -6 }px !important; background-repeat: no-repeat !important; display:block !important;`)
                  // hover_box.style.backgroundPosition = (x-(500 /2 /6)+250) * -6 +'px' + (y - (500 / 2 /6)+ 250) * -6 +'px';
                  // hover_box.style.backgroundPosition = (xx)+'px' + ' ' + (xx)+'px';
                  // hover_box.style.backgroundPositionX = xx;
                  // hover_box.style.backgroundPositionY = yy;
          
                  // hover_box.style.backgroundPosition = x + ' px !important' + ' ' + y + 'px';
                  // hover_box.style.backgroundPosition = xx1 +'px ' + yy1 + 'px !important; ';
              //    hover_box.style.backgroundPosition =  x + 750+ 'px' + ' ' + y + 250 + 'px';
                  hover_box.style.backgroundPosition = x + 750 + "px"+ " " + y + 250 + "px ;";
              })

                </script>

                <form action="cart_manage.php" method="post">
                <div class="container" id="product_qty_main">
                            <div class="box ms-2 ps-5 d-flex">
                                <label for="name"></label>
                                <input type="button" class="dec button pe-4 btn" value="-"></input>
                                <input type="text" name="product_qty" id="1" value="1" class="numInp">
                                <input type="button" class="inc button ps-4 btn" value="+"></input>
                            </div>
                            <div class="price d-inline-flex">
                                <div class="price_symbol">

                                    <?php echo product_currency_bdt(); ?>
                                </div>
                                <div class="price_amount" name="product-price">
                                    <?php echo $product_price ?>
                                </div>
                            </div><br>
                        </div>

                    <div class="price-button d-inline-flex mb-5 pb-5">
                        
                        <?php

                        echo '    <input type = "hidden" value="' . $product_name . '" name="product_name">
    <input type = "hidden" value="' . $product_price . '" name="product_price">
 
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