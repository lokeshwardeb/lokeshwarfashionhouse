<?php 
  

$hostname = "localhost";
$username = "root";
$password = "";
$database = "lokeshwarfashionhouse";

$conn = mysqli_connect($hostname, $username, $password, $database);

if($conn){
    // echo 'connected with the database';
}
else{
    echo 'Sorry ! Cannot connected with the database for this error =>'. mysqli_connect_error();
}

  


?>