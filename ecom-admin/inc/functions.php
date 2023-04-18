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

function saved_success_message()
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Information has been saved successfully. Please refresh the page to see the changes.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function saved_error_message()
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Information has been not updated successfully. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function update_success_message()
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Information has been updated successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function update_error_message()
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Information has been not updated. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function succcess_alert($msg)
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> ' . $msg . '.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function error_alert($msg)
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> ' . $msg . '.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


function delete_success_message()
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Information has been deleted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function delete_error_message()
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> Information has been not deleted. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function wrong_error_message()
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> We are facing some technical error. Something went wrong.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function login_success()
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Logged in!</strong> You should refresh the page to  check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function light_theme_success()
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> The light mode has been activated. Please refresh the page to see the changes.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function light_theme_error()
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Could not change the theme into dark mode.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function dark_theme_success()
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> The dark mode has been activated. Please refresh the page to see the changes.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
function dark_theme_error()
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Could not change the theme into light mode.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function login_password_not_matched()
{
  return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error !</strong> You should give correct password to login .
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

function login_user_doesnot_exist()
{
  return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error !</strong> User doesnot exist .
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

function login_user_password_blank()
{
  return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error !</strong> Password cannot be blank !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

function login_defficulties_error()
{
  return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error !</strong>We have some dificulties so that you can log in at this time. Please try again later .
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

function preloader_include()
{
  echo '<script>
                  var loader = document.getElementById("preloader");
                  window.addEventListener("load", function(){
                      loader.style.display = "none";
                  })

                  
                  </script>
                  ';
}

date_default_timezone_set("Asia/Dhaka");

function product_currency_bdt()
{
  include("conn.php");

  $sql_currency = "SELECT * FROM `settings`";
  $result_currency = mysqli_query($conn, $sql_currency);
  if ($result_currency) {
    // echo '৳';?
    if (mysqli_num_rows($result_currency) > 0) {
      while ($row = mysqli_fetch_assoc($result_currency)) {
        $product_currency = $row['product_currency'];
        if ($product_currency == 'bdt') {
          return '৳';
        }
        if ($product_currency == 'usd') {
          return  '$';
        }
      }
    }
  } else {
    echo '$';
  }
}

function image_compress_upload($file_tmp, $image_upload_directory, $compress_quality, $img_msg = "Successfully Image updated", $file){
  if($compress_quality == ''){
      $compress_quality = 50;
  }
  if($img_msg == ''){
    $img_msg = "Successfully Image updated";
  }
  // $info = getimagesize($file_tmp);
  // $file = $_FILES['image'];
     
  // print_r($file);
       
        if ($file['type'] == 'image/jpeg') {
            $img = imagecreatefromjpeg($file_tmp);
        }
        elseif($file['type'] == 'image/png'){
          $img = imagecreatefrompng($file_tmp);
        }
        else{
          error_alert("Please select jpg or jpeg or png images only ! ");
        }

      //   elseif ($file['type'] == 'image/png') {
      //     $img = imagecreatefrompng($file_tmp);
      // }


  // echo '<pre>';
 
  // if ($info['mime'] == 'image/jpeg') {
  //     $img = imagecreatefromjpeg($file_tmp);
  // } elseif ($info['mime'] == 'image/png') {
  //     $img = imagecreatefrompng($file_tmp);
  // }

  
      
    //  $compress_quality;
      if (isset($img)) {
          $outputimage = $image_upload_directory ;//  . '.jpeg'
          if(file_exists($image_upload_directory)){
            error_alert("Image already exists on the directory");
          }else{
            $images = imagejpeg($img, $outputimage, 50);
            if ($images) {
                succcess_alert($img_msg);
                
            }
          }
         
      }
}



  // }
