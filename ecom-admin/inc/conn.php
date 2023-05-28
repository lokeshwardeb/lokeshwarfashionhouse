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


// for initializing the utf8 and the bangla font language support on mysql database
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");




if($conn){
    // echo 'connected with the database';
}

else{
    echo 'Sorry ! Cannot connected with the database for this error =>'. mysqli_connect_error();
    // header('location: install.php');

}

// $select_conn = mysqli_connect($hostname, $username, $password);


// if($select_conn){
//   $select_db_exist = mysqli_select_db($select_conn, $database);
//   mysqli_select_db($select_conn, $select_db_exist);
  
//   if($select_db_exist){
//     echo '';
//   }else{
//     echo "
//     <script>window.location.href = 'install.php'</script>
    
//     ";
//     echo 'not exist';
//   }
// }else{
//   echo "
//     <script>window.location.href = 'install.php'</script>
    
//     ";
// }


?>