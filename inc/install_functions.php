<?php 
function unknow_db_error(){
    return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> Unknown database !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
function db_created_success(){
    return '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> Database created successfully !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
function db_created_error(){
    return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> Database cannot created successfully ! Something error..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
function db_info_update_success(){
    return '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> Database information updated successfully !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
function db_info_update_error(){
    return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> Database info cannot being updated successfully ! Something error..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

function sql_install(){
    
}








?>