<?php
include "inc/conn.php";
  require_once "get_users_info/UserInformation.php";
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

        $sql_insert_user = "INSERT INTO `analyzer`(`user_ip_address`, `user_os`, `user_browser`, `user_device`) VALUES ('$USER_IP_ADDRESS','$USER_OS','$USER_BROWSER','$USER_DEVICE')";
        $result_insert_user = mysqli_query($conn, $sql_insert_user);

        

    }
  }

  if(!isset($_COOKIE['visit_lokfahou'])){
    setcookie("visit_lokfahou", "visited", time() + 60 * 60 * 24 * 30);

// $sql_unique_user = "INSERT INTO `analyzer_unique_users`(`unique_users`) VALUES ('ip: $USER_IP_ADDRESS + os: $USER_OS + browser: $USER_BROWSER + device: $USER_DEVICE')";
$sql_unique_user = "INSERT INTO `analyzer_unique_users`(`unique_users`, `users_ip_address`, `users_os`, `users_browser`, `users_device`) VALUES ('yes','$USER_IP_ADDRESS','$USER_OS','$USER_BROWSER','$USER_DEVICE')";
$result_unique_user = mysqli_query($conn, $sql_unique_user);

  }else{
    
    // echo $_COOKIE['visit_lokfahou'];
  }
  // setcookie("visit_lokfahou", "visited", time() - 60 * 60 * 24 * 30);




?>