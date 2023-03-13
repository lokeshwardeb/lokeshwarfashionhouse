<?php 
include "inc/conn.php";
$active_class = 'customers';
include "inc/_header.php";
if(!isset($_SESSION['username'])){
  header("location: index.php");
  die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>') ;

  // exit;

}
elseif(isset($_SESSION['username'])){
  
  
  
include "inc/_navbar.php";

?>

<div class="container full-width title_bar mt-4">
<?php

include "inc/_title_bar.php";



?>

<?php 
  
  $search_class = 'customers';
  
  include "inc/_search.php"; 
  include("inc/functions.php");

  include("inc/_theme.php");
  
  ?>

  <?php 
  
  $sql = "SELECT * FROM `customers`";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo '<table class="table  custom-default-box-bg-color  ">
    <thead>
      <tr>
        <th scope="col">SL.No</th>
        <th scope="col">Customer ID</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Customer Email</th>
        <th scope="col">Customer Phone</th>
        <th scope="col">Customer Address</th>
        <th scope="col">Joined In</th>
      </tr>
    </thead>
    <tbody>';
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      echo  '<tr class="hover-table">
      <th scope="row">'.$no++ . '</th>
      <td>'.$row['customer_id'].'</td>
      <td>'.$row['customer_name'].'</td>
      <td>'.$row['customer_email'].'</td>
      <td>'.$row['customer_phone_no'].'</td>
      <td>'.$row['customer_address'].'</td>
      <td>'.$row['join_datetime'].'</td>

      
      <td><button type="submit" class="btn btn-dark">Order Details</button></td>
    </tr>';
    }
  }
  else{
    echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
    Sorry ! the searching result with "'.$search.'" are not found ..
    
    </div>';
  }
  
  
  
  
  
  ?>



</div>








<?php 
include "inc/_footer.php";

}

?>