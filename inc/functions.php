<?php 
// if(!isset($_SESSION['username'])){
//     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//                     <strong>Error !</strong> You should login so that you can access the page .
//                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//                   </div>';
//     header("location: ../index.php");
//     exit;
  
//   }
  // elseif(isset($_SESSION['loggedin']) == true){
   
// function b(){
//     echo 'hi this is the check of function including..';
// }

function saved_success_message(){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Information has been saved successfully. Please refresh the page to see the changes.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function saved_error_message(){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Information has been not updated successfully. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function update_success_message(){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Information has been updated successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function update_error_message(){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Information has been not updated. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function delete_success_message(){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Information has been deleted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function delete_error_message(){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Information has been not deleted. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function wrong_error_message(){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> We are facing some technical error. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function login_success(){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Logged in!</strong> You should refresh the page to  check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function light_theme_success(){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> The light mode has been activated. Please refresh the page to see the changes.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function light_theme_error(){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Could not change the theme into dark mode.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function dark_theme_success(){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> The dark mode has been activated. Please refresh the page to see the changes.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function dark_theme_error(){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Could not change the theme into light mode.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function login_password_not_matched(){
 return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error !</strong> You should give correct password to login .
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

function login_user_doesnot_exist(){
 return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error !</strong> User doesnot exist .
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

function login_user_password_blank(){
 return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error !</strong> Password cannot be blank !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

function login_defficulties_error(){
 return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error !</strong>We have some dificulties so that you can log in at this time. Please try again later .
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

function preloader_include(){
  echo '<script>
                  var loader = document.getElementById("preloader");
                  window.addEventListener("load", function(){
                      loader.style.display = "none";
                  })

                  
                  </script>
                  ';
}

date_default_timezone_set("Asia/Dhaka");





  // }
