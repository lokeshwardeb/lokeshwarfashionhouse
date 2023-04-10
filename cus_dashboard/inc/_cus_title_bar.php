<?php

if(isset($_SESSION['cus_loggedin']) == false){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error !</strong> You should login so that you can access the page .
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
  header("location: ../index.php");
  exit;

}
elseif(isset($_SESSION['cus_loggedin']) == true){
  
  echo '
<div class="container main-content  mt-4 mb-5 pb-5" id="mainContent">
<div class="page_title_bar title-bar  border-bottom border-dark pb-1 mb-4 row">

  <span id="closedBtn" class="" onclick="closeFun()">Close</span>
  <h2 class="col-9"> '. ucfirst($active_class) . '</h2>
 
                              
                            
    <div class = "col-3  ">
    <div class="nav-link text-dark float-start ms-4 ps-4"><img src="' .CUS_PHOTO_PATH_INTO . $_SESSION["cus_photo"].'" alt="" srcset="" class="rounded-circle me-2" height="40px" width="40px"><strong>'.$_SESSION["cus_username"].'</strong></div>  
   
    </div>
  
    
  </div>

  
  
  
  ';

}

