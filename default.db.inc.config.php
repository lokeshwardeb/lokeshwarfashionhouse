<?php 
  
  // $hostname = "hostsn";
  // $username = "usersn";
  // $password = "passedw";
  // $database = "dbn";

  $hostname = "hostsn";
  $username = "usersn";
  $password = "passedw";
  $database = "dbn";
  
$conn = mysqli_connect($hostname, $username, $password, $database);

if($conn){
    // echo 'connected with the database';
}
else{
    echo 'Sorry ! Cannot connected with the database for this error =>'. mysqli_connect_error();
    // header('location: install.php');

}

$select_conn = mysqli_connect($hostname, $username, $password);

$select_db_exist = mysqli_select_db($select_conn, $database);

if($select_db_exist){
  echo '';
}elseif(!$select_db_exist){
  header('location: install.php');
}



?>