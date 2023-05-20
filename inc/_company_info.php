<?php 
include 'inc/_error_reporting.php';

// session_start();

include 'conn.php';

$sql = 'SELECT * FROM `settings`';


$result = @@mysqli_query($conn, $sql);



if ($result) {
    if (@mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $website_name = $row['website_name'];
            $website_description = $row['website_description'];
            $website_contract_email = $row['website_contract_email'];
            $website_slogan = $row['website_slogan'];
            $website_phone_no = $row['phone_no'];
            $website_facebook_page = $row['website_facebook_page'];
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
        $website_contract_email = '';
        $aurthors_name = '';
        $authors_email = '';
        $company_name = '';
        $company_phone_no = '';
        $website_facebook_page = '';
    }
}



if(isset($_SESSION['username'])){
    $check_username = $_SESSION['username'];



    $info_sql = "SELECT * FROM `admin_users` WHERE `username` = '$check_username';";
$info_result = @mysqli_query($conn, $info_sql);

if ($info_result) {
    while ($row = mysqli_fetch_assoc($info_result)) {
        $check_id = $row['id'];
        $profile_username = $row['username'];
        $email = $row['email'];
        $profile_description = $row['admin_description'];
        $phone_no = $row['admin_phone_no'];
        $admin_photo = $row['admin_photo'];
        $role = $row['admin_role'];
        $_SESSION['admin_photo'] = 'uploaded_img/' . $admin_photo;
    }
} else {
    $check_id = '';
    $profile_username = '';
    $email = '';
    $profile_description = '';
    $phone_no = '';
    $admin_photo = '';
    $role = '';
    $_SESSION['admin_photo'] = '';
}

}






$info_sql = "SELECT * FROM `admin_users`   ";
$info_result = @mysqli_query($conn, $info_sql);

if ($info_result) {
    while ($row = mysqli_fetch_assoc($info_result)) {
        $check_id = $row['id'];
        $admin_username = $row['username'];
        $admin_email = $row['email'];
        $profile_description = $row['admin_description'];
        $phone_no = $row['admin_phone_no'];
        $admin_photo = $row['admin_photo'];
        $role = $row['admin_role'];
        $_SESSION['admin_photo'] = 'uploaded_img/' . $admin_photo;
    }
} else {
    $check_id = '';
    $profile_username = '';
    $email = '';
    $profile_description = '';
    $phone_no = '';
    $admin_photo = '';
    $role = '';
    $_SESSION['admin_photo'] = '';
}



// $company_name = $_POST['website_name'] ;

// echo 'the company name is '. $company_name;

// $author_name = 'lokeshwar'







?>