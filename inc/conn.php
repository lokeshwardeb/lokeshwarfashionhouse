<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'lokeshwarfashionhouse';

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

// for initializing the utf8 and the bangla font language support on mysql database
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");


if($conn){
  // echo 'connected';
}else{
  echo 'not connected for this error =>' . mysqli_connect_error();
  
}



?>