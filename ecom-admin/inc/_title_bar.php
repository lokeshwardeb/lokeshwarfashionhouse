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
  
  echo '
<div class="container main-content  mt-4 mb-5 pb-5" id="mainContent">
<div class="page_title_bar title-bar  border-bottom border-dark pb-1 mb-4 row">
<i class="fa-solid fa-om"></i>
  <span id="closedBtn" class="" onclick="closeFun()">Close</span>
  <h2 class="col-lg-9 col-md-12"> '. ucfirst($active_class) . '</h2>
    <div class = "col-lg-3  col-md-12">
    <img src="' . $_SESSION["admin_photo"] .'" alt="" width="32" height="32" class="rounded-circle me-2 float-end">
    <strong class= "me-2 float-end pe-2">'.  $_SESSION["username"] . '</strong>
    </div>
  
    
  </div>

  
  
  
  ';

}

