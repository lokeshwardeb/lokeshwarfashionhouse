<?php

// require_once __DIR__ . '/vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf();
// $mpdf->WriteHTML('<h1>Hello world!</h1>');
// $mpdf->Output('THIS.pdf', 'I');



require_once __DIR__ . '/vendor/autoload.php';

require_once "inc/_company_info.php";
require_once "inc/const.php";






$ht = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
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
    }
    .site_info{
      font-size: 08px !important;
      margin-left: 220px;
      margin-bottom: 15px;
      margin-top: 15px;
    }

    </style>
</head>
<body >
    <div class="container new">

        <div class="container">
          <center style="margin-left:270px; margin-right:auto; ">
            <img src="' . PHOTO_UPLOADED_PATH . $website_logo .'" alt="" style="">
          </center>
          <center style="text-align: center; ">'.$website_name.'</center>

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
              <td>'.$website_facebook_page.'</td>
            </tr>
            
                <tr>
                  <th scope="row"></th>
                  <td colspan="2"></td>
                  <td></td>
                  <td>'.SITE_URL.'</td>
                 
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td colspan="2"></td>
                  <td></td>
                  <td>'.$website_phone_no.'</td>
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td colspan="2"></td>
                  <td></td>
                  <td>'.$website_contract_email.'</td>
                </tr>
                
              </tbody>
            </table>
          </div>
<!-- 
          <div class="info_section_new">
            Customer name: <br>
            Customer Phone no: <br>
            Customer Email Address: <br>
            Product Shipping Address: <br>
            Customer name: <br>
          </div> -->



          <div class="container info">

            <div class="order_no">
             Order no: #lokfahou-458545845
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
                  <td>Customer Name: Lokeshwar Deb</td>
               
                </tr>
                <tr>
                  <!-- <th scope="row">2</th> -->
                  <td>Customer Phone no:</td>
                
                </tr>
                <tr>
                  <!-- <th scope="row">3</th>
                  <td colspan="2"></td> -->
                  <td>Customer Email Address:</td>
              
                </tr>
                <tr>
                  <!-- <th scope="row">3</th>
                  <td colspan="2"></td> -->
                  <td>Product Shipping Address:</td>
                  
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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
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
             <td></td>
            
          </tr>
          <tr>
            <!-- <th scope="row">2</th> -->
            <td class="td_sp">  </td>
            <td class="td_sp">  </td>
            <td>Sub-Total:</td>
             <!-- below add the values -->
             <td></td>
            
           
          </tr>
          <tr>
            <!-- <th scope="row">3</th> -->
            <!-- <td colspan="2">Larry the Bird</td> -->
            <td class="td_sp">  </td>
            <td class="td_sp">  </td>
            <td>Total Price:</td>
            <!-- below add the values -->
            <td></td>
            
          </tr>
          <tr>
            <!-- <th scope="row">2</th> -->
            <td class="td_sp">  </td>
            <td class="td_sp">  </td>
            <td >Payable Amount:</td>
             <!-- below add the values -->
             <td style = "font-family:"nikosh";">50 TAKA ৳
                জ

             </td>
          </tr>
        </tbody>
      </table>
   
</div>

<div class="container payment_status_stamp">
  <img src="img/paid_stamp.png" style="margin: auto;" alt="">
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
$mpdf->Output('THIS.pdf', 'I');
?>


<link rel="stylesheet" href="css/all.min.css">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        Welcome on mysite

        <div class="container border-success border-top border-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>





    </div>
</body>

</html>