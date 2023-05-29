<?php
// error_reporting(0);
include "inc/conn.php";
$active_class = 'customers';
include "inc/_header.php";
if (!isset($_SESSION['username'])) {
    echo '
    <script>
    window.location.href = "login.php";
    </script>
    ';
    header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

    // exit;

} elseif (isset($_SESSION['username'])) {


    include "inc/_navbar.php";

?>

    <div class="container full-width title_bar mt-4">
        <?php

        include "inc/_title_bar.php";



        ?>

        <?php

        $search_class = 'products';

        include "inc/_search.php";
        include("inc/functions.php");

        include("inc/_theme.php");


        $get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['id']), ENT_QUOTES);
        // echo $get_id;

        // $auto_promo_code_activated = 0;
        $sql = "SELECT * FROM `customers` WHERE `customer_id` = '$get_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {

            // $sql_cus_info = "SELECT * FROM `admin_users` WHERE `username` = '$username'";
            // $result_cus_info = mysqli_query($conn, $sql_cus_info);

            // if($result_cus_info){
            //     if(mysqli_num_rows($result_cus_info) > 0 ){
            //         while($row = mysqli_fetch_assoc($result_cus_info)){

            //             // $cus_last_ip_address = $row['cus_last_ip_address'];
            //             // $cus_last_used_os = $row['cus_last_used_os'];
            //             // $cus_last_used_device = $row['cus_last_used_device'];
            //         }
            //     }
            // }



            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $customer_id =  $row["customer_id"];
                    $cus_id = $row['cus_id'];
                    $customer_name =   $row['customer_name'];
                    $customer_email =  $row['customer_email'];
                    $customer_phone_no = $row['customer_phone_no'];
                    $customer_address =  $row['customer_address'];
                    $customer_join_datetime = $row['join_datetime'];
                }

$select_cus_id_customer = "SELECT * FROM `cus_users` WHERE `cus_id` = '$cus_id'";
$result_select_cus_id_customer = mysqli_query($conn, $select_cus_id_customer);
if($result_select_cus_id_customer){
while($row = mysqli_fetch_assoc($result_select_cus_id_customer)){
    $customer_image =  $row['cus_photo'];
    
    $cus_last_ip_address = $row['cus_last_ip_address'];
    $cus_last_used_os = $row['cus_last_used_os'];
    $cus_last_used_device = $row['cus_last_used_device'];
}

    
    if ($customer_image == '') {
        $customer_image = 'nature-sea.jpg';
        
    }
}

$customer_total_orders = 0;


$select_customer_from_order_sql = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
$result_customer_orders_select_check = mysqli_query($conn, $select_customer_from_order_sql);

if($result_customer_orders_select_check){
    if(mysqli_num_rows($result_customer_orders_select_check) > 0){
        $customer_total_orders = mysqli_num_rows($result_customer_orders_select_check);
    }
}
               

          




                echo '
        
<div class="row">
<div class="col-6">
<a href = "customers.php" class="mb-4"><button class = "btn btn-primary mb-4">Go to customers</button></a><br>
    Customer IP Address (last login): ' . $cus_last_ip_address . ' <br>
    Customer OS (last login): ' . $cus_last_used_os . ' <br>
    Customer Device (last login): ' . $cus_last_used_device . ' <br>
    Customer ID: ' . $customer_id . ' <br>
    Customer Name : ' . $customer_name . ' <br>
    Customer Email: ' . $customer_email . ' <br>
    Customer Phone no: ' . $customer_phone_no . ' <br>
    Customer Join datetime: ' . $customer_join_datetime . ' <br>
    Customer Total orders: ' . $customer_total_orders . ' <br>

    <div class="row container mt-4">
    <div class="col-2">
        <button class="btn btn-dark mb-4" onclick="productEdit()">Edit</button><br>

    </div>


    <div class="col-10">
        <form action="'.$_SERVER["PHP_SELF"].'" method="post">
            <button class="btn btn btn-danger mb-4" name="block_customer_user" id="block_cus_btn">Block Customer User</button> <label for="block_cus_btn" class="text-danger"> (block customer user for spaming and security issues)</label><br>

        </form>
        <?php



        ?>
    </div>
</div>


</div>
'?>

<?php 
if($customer_image == ''){
echo '
<div class="col-6">
    <img src="uploaded_img/cus_photo_upload/' . $customer_image . '" width="80%!important" height="250px!important" alt="" srcset="">
</div>
        
        ';
}else{
    echo '
<div class="col-6">
    <img src="uploaded_img/' . $customer_image . '" width="80%!important" height="250px!important" alt="" srcset="">
</div>';
}



                                                                                                    ?>


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
}

?>