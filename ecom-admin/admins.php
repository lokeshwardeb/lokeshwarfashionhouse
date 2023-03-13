<?php
include "inc/conn.php";
$active_class = 'admins';
include "inc/_header.php";
include "inc/_navbar.php";

// session_start();

if(isset($_SESSION['loggedin']) == false){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error !</strong> You should login so that you can access the page .
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
  header("location: index.php");
  exit;

}
if(isset($_SESSION['loggedin']) == true){
 

?>

<div class="container title_bar mt-4">
  <?php

  include "inc/_title_bar.php";



  ?>

  <?php

  $search_class = 'admins';

  include "inc/_search.php";
  include("inc/functions.php");

  include("inc/_theme.php");


  ?>

  <button type="submit" class="btn btn-primary"><a href="add_admin.php" class="nav-link">Add admin</a></button>

  <?php


  // $sql = "SELECT * FROM `customers`";

  $sql = "SELECT * FROM `admin_users`";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // $server = ;

    echo '<table class="table  custom-default-box-bg-color  ">
            <thead>
              <tr>
                <th scope="col">SL.No</th>
                <th scope="col">Admin ID</th>
                <th scope="col">Admin userName</th>
                <th scope="col">Admin Email</th>
                <th scope="col">Joined In</th>
              </tr>
            </thead>
            <tbody>';
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      echo  '<tr class="hover-table">
        <form action = "./admins.php" method = "post">
              <th scope="row">' . $no++ . '</th>
              <td>' . $id = $row['id']  . '</td>
              <td>' . $row['username'] . '</td>
              <td>' . $row['email'] . '</td>
              <td>' . $row['datetime'] . '</td>
          
             
              <td><a href="http://localhost/phpdevelopment/ecom-admin/edit-admin.php"><button class="btn btn-dark">Edit</button></a></td>
              <td><button type="submit" class="btn btn-danger" name = "submit">Delete</button></td>
              </form>
            </tr>';


      //    $sql = "SELECT * FROM admin_users where id = $id";

      //    $result = mysqli_query($conn, $sql);

      //     if($result){

      // else{
      //     echo 'cannot deleted';
      // }
    }
  } else {
    echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
            Sorry !  No data found ..
            
            </div>';
  }




  if ($result) {
    if (isset($_POST['submit'])) {
      $sql = "DELETE FROM `admin_users` WHERE `admin_users`.`id` = '$id'";

      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Deleted !</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
      }
    }
  }






  ?>
  <div class="container full-width">

  </div>

  <?php











  // echo  $_SESSION['logo_img'];



  ?>



</div>








<?php
include "inc/_footer.php";

}

?>