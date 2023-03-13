<?php

if(isset($_POST['ChangeIcons'])){
    if ($active_theme == 'light-theme') {
      // echo 'light-theme';
     $theme_up_sql = "UPDATE `admin_users` SET `active_theme` = 'dark-theme' WHERE `username` = '$active_username'";
     $theme_up_result = mysqli_query($conn, $theme_up_sql);
     if($theme_up_result){
      dark_theme_success();
     }else{
      dark_theme_error();
     }
  
    }
    elseif($active_theme == ''){
        $theme_up_sql = "UPDATE `admin_users` SET `active_theme` = 'light-theme' WHERE `username` = '$active_username'";
        $theme_up_result = mysqli_query($conn, $theme_up_sql);
        if($theme_result){
         light_theme_success();
        }else{
         light_theme_success();
        }
    }
    else{
      // echo 'light-theme';
     $theme_up_sql = "UPDATE `admin_users` SET `active_theme` = 'light-theme' WHERE `username` = '$active_username'";
     $theme_up_result = mysqli_query($conn, $theme_up_sql);
     if($theme_result){
      light_theme_success();
     }else{
      light_theme_success();
     }
  
    }
  
    
    
  }

?>