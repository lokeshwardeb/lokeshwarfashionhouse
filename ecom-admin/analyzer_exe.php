<?php
include "inc/conn.php";
  require_once "../get_users_info/UserInformation.php";
 $USER_IP_ADDRESS =   UserInfo::get_ip();
 $USER_OS =   UserInfo::get_os();
 $USER_BROWSER =  UserInfo::get_browser();
 $USER_DEVICE =  UserInfo::get_device();


//   $sql_analy_check = "SELECT * FROM `analyzer` WHERE `user_ip_address`='$USER_IP_ADDRESS',`user_os`='$USER_OS',`user_browser`='$USER_DEVICE'";
  $sql_analy_check = "SELECT * FROM `analyzer` WHERE `user_ip_address`='$USER_IP_ADDRESS'";
  $result_analy_check = mysqli_query($conn, $sql_analy_check);

  if($result_analy_check){
    if(mysqli_num_rows($result_analy_check) > 0){

    }else{
        // that means the user does not exits and this is a new user

        $sql_insert_user = "INSERT INTO `analyzer`(`user_ip_address`, `user_os`, `user_browser`, `datetime`) VALUES ('$USER_IP_ADDRESS','$USER_OS','$USER_BROWSER','$USER_DEVICE')";
        $result_insert_user = mysqli_query($conn, $sql_insert_user);

        

    }
  }




?>