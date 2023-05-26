<?php

if(isset($_SESSION['cus_loggedin']) == false){
  echo '
<div class="container main-content  mt-4 mb-5 pb-5" id="mainContent">
<div class="page_title_bar title-bar  border-bottom border-dark pb-1 mb-4 row">

  <span id="closedBtn" class="" onclick="closeFun()">Close</span>
  <h2 class="col-9"> '. ucfirst($active_class) . '</h2>
    <div class = "col-3  ">
    
    </div>
  
    
  </div>

  
  
  
  ';

}
elseif(isset($_SESSION['cus_loggedin']) == true){
  
  echo '
<div class="container main-content  mt-4 mb-5 pb-5" id="mainContent">
<div class="page_title_bar title-bar  border-bottom border-dark pb-1 mb-4 row">

  <span id="closedBtn" class="" onclick="closeFun()">Close</span>
  <h2 class="col-9"> '. ucfirst($active_class) . '</h2>
    <div class = "col-3  ">
    <img src="'.SITE_URL.'ecom-admin/uploaded_img/cus_photo_upload/' . $_SESSION["cus_photo"] .'" alt="" width="32" height="32" class="rounded-circle me-2 float-end">
    <strong class= "me-2 float-end pe-2 mt-2">'.  $_SESSION["cus_username"] . '</strong>
    </div>
  
    
  </div>

  
  
  
  ';

}

