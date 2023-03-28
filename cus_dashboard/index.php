<?php 
if(isset($_SESSION['cus_username'])){
    header("location: home.php");
}else{
    header("location: ../login.php");
}



?>