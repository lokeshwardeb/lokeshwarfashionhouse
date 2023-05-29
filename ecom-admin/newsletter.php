<?php 
include "inc/conn.php";
$active_class = 'newsletter';
include "inc/_header.php";
if(!isset($_SESSION['username'])){
  echo '
  <script>
  window.location.href = "login.php";
  </script>
  ';
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
  
//   $search_class = 'orders';
  
  include "inc/_search.php"; 
  include("inc/functions.php");

  include("inc/_theme.php");

  
//   $active_class = 'orders';

           
  
            
            // $sql = "SELECT * FROM `orders` ORDER BY `orders`.`id` DESC";
            $sql = "SELECT * FROM `newsletter`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Newsletter Email</th>
                  <th scope="col">Newsletter Subscribed Datetime</th>
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>';
              $no = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo  '<tr class="hover-table">
                <th scope="row">'.$no++ . '</th>
                <td><b>'.$row['newsletter_email'].'</b></td>
                <td>'. $row['datetime'].'</td>
                
';


  echo '
        <td><a href="newsletter_details.php?id='.$row['id'].'"><button type="submit" class="btn btn-dark">Newsletter Details</button></a></td>
              </tr>';
              }
            }
            else{
              echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4 ps-4" style="height:200px !important;">
              Sorry ! no newsletter subscribed users were not found ..
              
              </div>';
            }
  
  
  
  
  
  ?>
</div>








<?php 
include "inc/_footer.php";

          }

?>