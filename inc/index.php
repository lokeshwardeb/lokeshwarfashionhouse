<?php 
if(isset($_SESSION['loggedin']) == false){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error !</strong> You should login so that you can access the page .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
    header("location: ../index.php");
    exit;
  
  }
  elseif(isset($_SESSION['loggedin']) == true){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> You caonnot access this page .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
header("location: ../index.php");
exit;
  }

?>