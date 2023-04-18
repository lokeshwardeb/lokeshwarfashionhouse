<?php 
include "inc/conn.php";
$active_class = 'products';
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

<div class="container full-width title_bar mt-4 pb-4" style="padding-bottom: 200px !important;">
<?php

include "inc/_title_bar.php";



?>

<?php 
  
  $search_class = 'products';
  
  include "inc/_search.php"; 
  include("inc/functions.php");

  include("inc/_theme.php");

              
  $sql = "SELECT * FROM `products`";
  $result = mysqli_query($conn, $sql);
  if($result){
while ($prow = mysqli_fetch_assoc($result)){
  $product_id = $prow['product_id'];
}

  }

  echo '  <button type="submit" class="btn btn-primary mb-4"><a href="add_products.php" class="nav-link">Add products</a></button>
  ';
  
  
            
  $sql = "SELECT * FROM `products`  ORDER BY `products`.`product_id` DESC";
  $result = mysqli_query($conn, $sql);
  if($result){
    if (mysqli_num_rows($result) > 0) {
      echo '<table class="table  custom-default-box-bg-color mb-4 ">
      <thead>
        <tr>
          <th scope="col">SL.No</th>
         
          <th scope="col">Product</th>
          <th scope="col">Description</th>
          <th scope="col">Product Price</th>
          <th scope="col">Product Added On</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>';
      $no = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $pro_id = $row['product_id'];
        echo  '<tr class="hover-table">
        <th scope="row">'.$no++ . '</th>
       
        <td>'.$row['product_name'].'</td>
        <td>'.$row['product_desc'].'</td>
        <td>'.$row['product_price'].'</td>
        <td>'.$row['product_added_datetime'].'</td>
        <td>'.$row['product_status'].'</td>


  
        
        <td><a href="products_details.php?id='.$pro_id.'"> <button type="submit" class="btn btn-dark">Product Details</button></a></td>
      </tr>';


      
      }
    }
    else{
      echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
      Sorry ! the searching result with "'.$search.'" are not found ..
      
      </div>';
    }

    echo '</tbody>
    </table>
    
    ';
  }


  
  
  
  ?>




</div>








<?php 
include "inc/_footer.php";

}

?>