<?php 
  
  // $hostname = "localhost";
  // $username = "root";
  // $password = "";
  // $database = "lokeshwarfashionhouse";

  $db_hostname = "localhost";
  $db_username = "root";
  $db_password = "";
  $database = "lokeshwarfashionhouse";
  
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $database);

if($conn){
    // echo 'connected with the database';
}
else{
    echo 'Sorry ! Cannot connected with the database for this error =>'. mysqli_connect_error();
    header('location: ../install.php');

}

// $select_conn = mysqli_connect($hostname, $username, $password);


// if($select_conn){
//   $select_db_exist = mysqli_select_db($select_conn, $database);
//   mysqli_select_db($select_conn, $select_db_exist);
  
//   if($select_db_exist){

//     echo '';
//   }else{
//     header("location: http://localhost/phpdevelopment/lokeshwarfashionhouse/install.php");
//   }
// }else{
//   echo "
//     <script>window.location.href = 'http://localhost/phpdevelopment/lokeshwarfashionhouse/install.php'</script>
    
//     ";
// }


?>