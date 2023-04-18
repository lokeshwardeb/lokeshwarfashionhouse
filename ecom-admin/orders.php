<?php 
include "inc/conn.php";
$active_class = 'orders';
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
  
  $search_class = 'orders';
  
  include "inc/_search.php"; 
  include("inc/functions.php");

  include("inc/_theme.php");

  
  $active_class = 'orders';

           
  
            
            // $sql = "SELECT * FROM `orders` ORDER BY `orders`.`id` DESC";
            $sql = "SELECT * FROM `products` AS prod JOIN order_products AS ord_prod ON prod.product_id = ord_prod.product_id JOIN orders AS ord ON ord.order_no = ord_prod.orders_id ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              echo '<table class="table  custom-default-box-bg-color  ">
              <thead>
                <tr>
                  <th scope="col">SL.No</th>
                  <th scope="col">Order No</th>
                  <th scope="col">Product</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>';
              $no = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo  '<tr class="hover-table">
                <th scope="row">'.$no++ . '</th>
                <td><b>'.$row['order_no'].'</b></td>
                <td>'. $row['product_name'].'</td>
                <td>'.$row['price'].'</td>
                <td>'.$row['product_desc'].'</td>
                <td class="';?><?php 
                
                if($row['order_status'] == 'completed'){
                echo "text-success";  
                } 
                if($row['order_status'] == 'In-process'){
                echo "text-warning";  
                } 
                if($row['order_status'] == 'cancelled'){
                echo "text-danger";  
                } 
                
                
                ?> <?php echo '">'. ucfirst( $row['order_status']).'</td>
';


  echo '
        <td><a href="orders_details.php?id='.$row['id'].'"><button type="submit" class="btn btn-dark">Order Details</button></a></td>
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