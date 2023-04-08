<?php 

$active_class = 'checkout';
include("inc/_header.php");

include("inc/functions.php");
include("inc/const.php");
include("inc/_navbar.php");

include("inc/conn.php");
include("inc/_company_info.php");

$order_no = '#loke1254545';
$create_date = date_create(date("d-m-Y")) ;
date_add($create_date, date_interval_create_from_date_string("10 month"));
$est_delivary_date = date_format($create_date, "d-m-Y");
echo '
<div class= "container   mb-4 pb-4">
<div class="container order_details_info page mt-4 pt-4 pb-4">
Thanks for your order. Here is details information about your product. Please keep in mind that the order no is very important to track the order and get info about this. It is also nessary for future. So, Please save the order no for future usage. <br>
Order No: <b>'.$order_no.'</b> <br>
Estimated delivary date: '.$est_delivary_date.'

</div>';
?>