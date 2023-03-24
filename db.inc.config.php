<?php 
  
  // $hostname = "localhost";
  // $username = "root";
  // $password = "";
  // $database = "lokeshwarfashionhouse";

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
    // header('location: install.php');

}

$select_conn = mysqli_connect($hostname, $username, $password);


if($select_conn){
  $select_db_exist = mysqli_select_db($select_conn, $database);
  mysqli_select_db($select_conn, $select_db_exist);
  
  if($select_db_exist){
    echo '';
  }else{
    echo "
    <script>window.location.href = 'install.php'</script>
    
    ";
    echo 'not exist';
  }
}else{
  echo "
    <script>window.location.href = 'install.php'</script>
    
    ";
}


?>