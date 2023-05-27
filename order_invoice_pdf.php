<?php

// this variable is to make activate the active class
$active_class = 'home';
// $active_theme = 'dark_theme';
include "inc/conn.php";

session_start();


// if(!isset($_POST['place_order'])){
//     echo "
//     <script>window.location.href = 'index.php'</script>
//     ";
//   }

if (isset($_SESSION['cus_username'])) {


  if (isset($_POST['download_order_invoice'])) {



    // include "inc/_header.php";



    // include "inc/functions.php";

    // include "inc/_navbar.php";

    include "inc/_company_info.php";
    // require_once __DIR__ . '/vendor/autoload.php';

    // $mpdf = new \Mpdf\Mpdf();
    // $mpdf->WriteHTML('<h1>Hello world!</h1>');
    // $mpdf->Output('THIS.pdf', 'I');



    $down_ord_in_order_no = $_POST['down_ord_in_order_no'];
    $down_ord_in_customer_name = $_POST['down_ord_in_customer_name'];
    $down_ord_in_phone_no = $_POST['down_ord_in_phone_no'];
    $down_ord_in_email = $_POST['down_ord_in_email'];
    $down_ord_in_shipping_address = $_POST['down_ord_in_shipping_address'];

    // $sql_get_ord_details = "SELECT * FROM `order_products` op INNER JOIN order_customers oc ON op.customer_id_on_order = oc.cus_id;";
    // $sql_get_ord_details = "SELECT * FROM `order_products` op INNER JOIN order_customers oc ON op.customer_id_on_order = oc.cus_id INNER JOIN products p on op.product_id = p.product_id;";

    $sql_get_ord_details = "SELECT * FROM `order_products` op INNER JOIN products p ON op.product_id = p.product_id  WHERE op.orders_id = '$down_ord_in_order_no'";

    $result_get_ord_details = mysqli_query($conn, $sql_get_ord_details);

    if ($result_get_ord_details) {
      if (mysqli_num_rows($result_get_ord_details) > 0) {
        while ($row = mysqli_fetch_assoc($result_get_ord_details)) {
        }
      }
    }


    // function invoice_pdf($order_no, $ordered_customer_name, $ordered_customer_phone_no, $ordered_customer_email_address, $ordered_customer_shipping_address){



    // require_once "_company_info.php";
    // require_once "const.php";

    require_once "inc/_company_info.php";

    include "inc/const.php";

    require_once "inc/functions.php";

    // require_once "../vendor/autoload.php";

    // vendor/autoload.php

    // require SITE_URL. 'vendor/autoload.php';

    require "./vendor/autoload.php";
    // include  SITE_URL . 'vendor/autoload.php';



    $_SESSION['generate_invoice'];
    $_SESSION['gi_order_no'];
    $_SESSION['gi_customer_name'];
    $_SESSION['gi_phone_no'];
    $_SESSION['gi_customer_email'];


    $ht = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="' . PHOTO_UPLOADED_PATH . $website_logo . '" type="image/x-icon">
    <style>

  @import url("https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;500;600;700&display=swap");

   
 .Order_summary{

       
        margin-bottom:10px;
        /* font-style:; */
        font-weight: bolder !important;

    }
   
    .cus_table{
        margin-top:20px;
    }
   
    .cus-d-flex{
        display: flex !important;
    }
    .td_sp{
        padding-left: 50px !important;
    }
    *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family:nikosh;
  
    }

    img{
      border-radius: 50%!important;
      width: 150px; height: 150px;
      margin-bottom: 15px;
    }
    .info{
      margin-bottom: 45px;
      display: inline !important;
    }
    .info_section{
      line-height: 28px;
    }
    tr{
      padding-top: 145px !important;
      padding-bottom: 145px !important;
      margin-top: 145px !important;
      margin-bottom: 145px !important;

    }
    .tr_row{
      margin-bottom: 250px !important;
      padding-bottom: 250px !important;
    }

    {
      background-image: url("img/red_unpaid_img.png");
      background-repeat: no-repeat;
      background-size: cover;
    }
    .payment_status_stamp{
      margin: auto;
      padding: auto;
    }
    .info_section_new{
      /* text-align: right; */
      float: left !important;
    }
    .new{
      /* margin-top: -450; */
      background:white;
      padding-left:50px;
      padding-right:50px;
    }
    .site_info{
      font-size: 08px !important;
      margin-left: 220px;
     /* margin-bottom: 15px;*/
      margin-top: 15px;
    }
    body{
     /* background: url("background_eps/5172658.jpg") !important;*/

    }
    .main_container{
    }

    </style>
</head>
<body >
    <div class="main_container">
      <div class="container new">

        <div class="container">
          <center style="margin-left:270px; margin-right:auto; ">
            <img src="' . PHOTO_UPLOADED_PATH . $website_logo . '" alt="" style="">
          </center>
          <center style="text-align: center; ">' . $website_name . '</center>

          <div class="site_info" style="text-align: center !important;">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <tr>
              <th scope="row"></th>
              <td colspan="2"></td>
              <td></td>
              <td>' . $website_facebook_page . '</td>
            </tr>
            
                <tr>
                  <th scope="row"></th>
                  <td colspan="2"></td>
                  <td></td>
                  <td>' . SITE_URL . '</td>
                 
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td colspan="2"></td>
                  <td></td>
                  <td>' . $website_phone_no . '</td>
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td colspan="2"></td>
                  <td></td>
                  <td>' . $website_contract_email . '</td>
                </tr>
                
              </tbody>
            </table>
          </div>
<!-- 
          <div class="info_section_new">
            Customer name:  <br>
            Customer Phone no:  <br>
            Customer Email Address:   <br>
            Product Shipping Address: <br>
            Customer name: <br>
          </div> -->


<hr>


          <div class="container info">

            <div class="order_no">
             Order no: ' . $down_ord_in_order_no . '
            </div>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <!-- <th scope="row"></th> -->
                  <td>Customer Name: ' . $down_ord_in_customer_name . '</td>
               
                </tr>
                <tr>
                  <!-- <th scope="row">2</th> -->
                  <td>Customer Phone no: ' . $down_ord_in_phone_no . '</td>
                
                </tr>
                <tr>
                  <!-- <th scope="row">3</th>
                  <td colspan="2"></td> -->
                  <td>Customer Email Address:  ' . $down_ord_in_email . '</td>
              
                </tr>
                <tr>
                  <!-- <th scope="row">3</th>
                  <td colspan="2"></td> -->
                  <td>Product Shipping Address:   ' . $down_ord_in_shipping_address . ' </td>
                  
                </tr>
              </tbody>
            </table>


         
            
          </div>

        </div>

        <div class= "Order_summary" style="margin-bottom: 25px;"><b>Order-summary</b> </div>

        <div class="container"  style="background-color:white; border-color:#198754; border-top:10px; border-style:solid;">
        <table class="table cus_table" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>';

    $sl_no = 1;

    // $sql_get_ord_details = "SELECT * FROM `order_products` op INNER JOIN products p ON op.product_id = p.product_id  WHERE op.orders_id = '$down_ord_in_order_no'";

    $sql_get_ord_details = "SELECT * FROM `order_products` op INNER JOIN products p ON op.product_id = p.product_id INNER JOIN `orders` o ON op.orders_id = o.order_no WHERE op.orders_id = '$down_ord_in_order_no';";


    $result_get_ord_details = mysqli_query($conn, $sql_get_ord_details);

    if ($result_get_ord_details) {
      $total_items = mysqli_num_rows($result_get_ord_details);
      if (mysqli_num_rows($result_get_ord_details) > 0) {
        while ($row = mysqli_fetch_assoc($result_get_ord_details)) {
          $product_name = $row['product_name'];

          $product_price = $row['product_price'];
          $product_qty = $row['product_qty'];

          $product_img = $row['product_img'];
          $total_amount = $row['total_amount'];
          $ht .= '    <tr>
    <th scope="row">' . $sl_no . '</th>
    <td>' . $product_name . '</td>
    <td>' . $product_qty . '</td>
    <td>' . $product_price . '</td>
  </tr>';
          $sl_no++;
        }
      }
    }

    $ht .= '
      
  </tbody>
</table>
<div class="container ">
  <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- <th scope="row">1</th> -->
            <td class="td_sp">  </td>
            <td class="td_sp">  </td>
            <td>Total Items:</td>
             <!-- below add the values -->
             <td>' . $total_items . ' Product(s)</td>
            
          </tr>
          <tr>
            <!-- <th scope="row">2</th> -->
            <td class="td_sp">  </td>
            <td class="td_sp">  </td>
            <td>Sub-Total:</td>
             <!-- below add the values -->
             <td>' . product_currency_bdt() . $total_amount . '</td>
            
           
          </tr>
          <tr>
            <!-- <th scope="row">3</th> -->
            <!-- <td colspan="2">Larry the Bird</td> -->
            <td class="td_sp">  </td>
            <td class="td_sp">  </td>
            <td>Total Price:</td>
            <!-- below add the values -->
            <td>' . product_currency_bdt() .  $total_amount . '</td>
            
          </tr>
          <tr>
            <!-- <th scope="row">2</th> -->
            <td class="td_sp">  </td>
            <td class="td_sp">  </td>
            <td >Payable Amount:</td>
             <!-- below add the values -->
             <td style = "font-family:"nikosh";">
             ' . product_currency_bdt() . $total_amount . '

             </td>
          </tr>
        </tbody>
      </table>
   
</div>

<div class="container payment_status_stamp">

</div>
'?>
 <?php

$sql_get_ord_info_pay_details = "SELECT * FROM `orders` WHERE order_no = '$down_ord_in_order_no';";
$result_get_ord_info_pay_details = mysqli_query($conn, $sql_get_ord_info_pay_details);
if ($result_get_ord_info_pay_details) {
  if (mysqli_num_rows($result_get_ord_info_pay_details) > 0) {
    while ($row = mysqli_fetch_assoc($result_get_ord_info_pay_details)) {
      $payment_method = $row['payment_method'];
      $payment_status = $row['payment_status'];
    }
  }
}

if ($payment_method == 'cod' && $payment_status == 'unpaid' || $payment_status == '') {

  echo '<img src="img/red_unpaid_img.png" style="margin: auto;" alt="">';
  echo "unpaid";
}

// elseif ($payment_method !== 'cod' && $payment_status == 'unpaid' || $payment_status == '') {
//   echo '<img src="img/red_unpaid_img.png" style="margin: auto;" alt="">';
// }

// elseif ($payment_method !== 'cod' || $payment_method == '' && $payment_status == 'unpaid' || $payment_status == '') {
//   echo '<img src="img/red_unpaid_img.png" style="margin: auto;" alt="">';
// }

else {
  echo '<img src="img/paid_stamp.png" style="margin: auto;" alt="">';
}

echo '<img src="img/paid_stamp.png" style="margin: auto;" alt="">';


echo '

<img src="img/red_unpaid_img.png"  style="margin: auto; height: 255px !important;" alt="">


        </div>





    </div>
    </div>
</body>
</html>';






    $mpdf = new \Mpdf\Mpdf([
      'default_font_size' => 9,
      'default_font' => 'nikosh'
    ]);
    // $mpdf->default_font(['nikosh']);
    // $mpdf-> Mpdf([
    //   'default_font' => 'nikosh'
    // ]);
    $mpdf->WriteHTML($ht);
    $mpdf->Output('lokfahou-invoice.pdf', 'I');


    // }




    ?>
    <link rel="shortcut icon" href="<?php echo 'ecom-admin/uploaded_img/' . $website_logo ?>" type="image/x-icon">
<?php


    // $_SESSION['generate_invoice'] = 0;


  } else {
    header("location: index.php");
  }
} else {
  header("location: index.php");
}

?>