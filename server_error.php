<?php
// include "inc/conn.php";
// session_start();

//   $_SESSION['server_error'] == 1;
//   if($_SESSION['server_error'] == 0){
//     // header("location: index.php");

//     echo '
//     <script>
//     window.location.href = "index.php"
//     </script>
    
//     ';

//   }


//   echo $_SESSION['server_error'];

// if(mysqli_connect_error()){
//     header("location: index.php");

// }
// else{
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error || 404</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>

    </style>

</head>
<body class="bg-dark text-light">

<main>
    <?php
// include_once "./inc/_company_info.php";
    ?>

<div class="container text-center mt-5 pt-5 fs-1 " style="justify-content: center; margin:auto;">
Server Error || 404 <br>
<?php 
// echo $website_name;
?>

<div class="fs-5 mt-5">Sorry we have a technical error and we cannot connect with the server at this moment. Please refresh the page after sometime..</div>

</div>


 



</main>



    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
//   }