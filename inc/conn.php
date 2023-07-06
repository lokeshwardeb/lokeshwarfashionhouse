<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'lokeshwarfashionhouse';

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


<<<<<<< HEAD
if($conn){
  // echo 'connected';
}else{
  echo 'not connected for this error =>' . mysqli_connect_error();
=======
// if($conn){
//     // echo 'connected with the database';
// }
// else{
//     echo 'Sorry ! Cannot connected with the database for this error =>'. mysqli_connect_error();
//     header('location: ../install.php');

// }


// $select_conn = mysqli_connect($hostname, $username, $password);


// if($select_conn){
//   $select_db_exist = mysqli_select_db($select_conn, $database);
//   mysqli_select_db($select_conn, $select_db_exist);
>>>>>>> 8383d5ca96af6b456919603d9d11eec914831a8d
  
}



?>