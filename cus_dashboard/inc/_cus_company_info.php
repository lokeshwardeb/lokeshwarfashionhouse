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







// $company_name = $_POST['website_name'] ;

// echo 'the company name is '. $company_name;

// $author_name = 'lokeshwar'







?>