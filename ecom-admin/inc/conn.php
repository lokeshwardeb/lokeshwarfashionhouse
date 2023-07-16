<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'lokeshwarfashionhouse';
// $db_hostname = 'sql301.infinityfree.com';
// $db_username = 'epiz_34172411';
// $db_password = 'XsThGKTD9H';
// $db_name = 'epiz_34172411_lokeshwarfashionhouse';


$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

// checking that if mysqli error occurs. It the mysqli database connect error occurs than it will follow the bellow code instractions and will process the code further


if(mysqli_connect_error()){
  // echo 'connect failed';
  // header("location: ./install.php");
  $_SESSION['server_error'] = 1;
  header("location: ./server_error.php");
}else{
  // echo 'connected';
  $_SESSION['server_error'] = 0;


}
// echo $_SESSION['server_error'];

// for initializing the utf8 and the bangla font language support on mysql database
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");


if($conn){
  // echo 'connected';
}else{
  echo 'not connected for this error =>' . mysqli_connect_error();
  
}



?>