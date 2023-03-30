<?php 
include '../inc/_error_reporting.php';

// session_start();

include '../inc/conn.php';

$sql = 'SELECT * FROM `settings`';


$result = mysqli_query($conn, $sql);



if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $website_name = $row['website_name'];
            $website_description = $row['website_description'];
            $website_slogan = $row['website_slogan'];
            $aurthors_name = $row['authors_name'];
            $authors_email = $row['authors_email'];
            $company_name = $row['company_name'];
            $company_phone_no = $row['phone_no'];
            $website_logo = $row['logo_img_upload'];
            $login_page = $row['login_img'];
            $users_login_upload = $row['users_login_img'];

       
            // echo 'the website name is' . $website_name;
        }
    }
    else{
        $id = '';
        $website_name = '';
        $website_description = '';
        $aurthors_name = '';
        $authors_email = '';
        $company_name = '';
        $company_phone_no = '';
    }
}


if(isset($_SESSION['cus_username'])){
    $cus_sql = "SELECT * FROM `cus_users`";
    $cus_sql_result = mysqli_query($conn, $cus_sql);
    if($cus_sql_result){
        if(mysqli_num_rows($cus_sql_result) > 0){
            while($row = mysqli_fetch_assoc($cus_sql_result)){
                $cus_id = $row['cus_id'];
                $cus_username = $row['cus_username'];
                $cus_desc = $row['cus_desc'];
                $cus_email = $row['cus_email'];
                $cus_phone_no = $row['cus_phone_no'];
                $cus_pass = $row['cus_pass'];
                $cus_photo = $row['cus_photo'];
                $cus_address = $row['cus_address'];
                $cus_joined_datatime = $row['cus_joined_datatime'];

            }
        }else{
             $cus_id = '';
                $cus_username = '';
                $cus_desc = '';
                $cus_email = '';
                $cus_phone_no = '';
                $cus_pass = '';
                $cus_photo = '';
                $cus_address = '';
                $cus_joined_datatime = '';
                
        }
    }
}




$check_username = $_SESSION["cus_username"];

  $sql_check = "SELECT * FROM `cus_users` WHERE `cus_username` = '$check_username'";
  $result_check = mysqli_query($conn, $sql_check);
  if($result_check){
    while($row = mysqli_fetch_assoc($result_check)){
    $check_user_id =  $row['cus_id'];
    }
  }
$check_customer_sql = "SELECT * FROM `customers` WHERE `cus_id` = '$check_user_id'";
$result_customer_check = mysqli_query($conn, $check_customer_sql);
if($result_customer_check){
while($row = mysqli_fetch_assoc($result_customer_check)){
$customer_id = $row['customer_id'];

}


}
$sql_orders_check = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id'";
$result_sql_orders_check = mysqli_query($conn, $sql_orders_check);
if($result_sql_orders_check){
if(mysqli_num_rows($result_sql_orders_check) > 0){
$total_orders_count = mysqli_num_rows($result_sql_orders_check);
$sql_in_process = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id' AND `order_status` = 'In-process'";
$result_sql_in_process = mysqli_query($conn, $sql_in_process);

if($result_sql_in_process){
$in_process_orders_count = mysqli_num_rows($result_sql_in_process);
}
// $in_process_orders_count = 
$sql_delivered = "SELECT * FROM `orders` WHERE `customer_id_on_order` = '$customer_id' AND `order_status` = 'completed'";
$result_delivered = mysqli_query($conn, $sql_delivered);

if($result_delivered){
$delivered_orders_count = mysqli_num_rows($result_delivered);
}

}else{
$total_orders_count = 0;
$in_process_orders_count = 0;
$delivered_orders_count = 0;
}
}


 
  



// $company_name = $_POST['website_name'] ;

// echo 'the company name is '. $company_name;

// $author_name = 'lokeshwar'







?>