<?php 
// cus functions

// function 




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


function product_currency_bdt_cus(){
  include("_cus_conn.php");
  
    $sql_currency = "SELECT * FROM `settings`";
    $result_currency = mysqli_query($conn, $sql_currency);
    if($result_currency){
      // echo '৳';?
      if(mysqli_num_rows($result_currency)>0){
        while($row = mysqli_fetch_assoc($result_currency)){
          $product_currency = $row['product_currency'];
          if($product_currency == 'bdt'){
            return '৳';
          }
          if($product_currency == 'usd'){
            return  '$';
  
          }
        }
  
      }
    }else{
      return '$';
    }
  }
  

// function image_compress_upload($file_tmp, $image_upload_directory, $compress_quality, $img_msg = "Successfully Image updated", $file){
//     if($compress_quality == ''){
//         $compress_quality = 50;
//     }
//     if($img_msg == ''){
//       $img_msg = "Successfully Image updated";
//     }
//     // $info = getimagesize($file_tmp);
//     // $file = $_FILES['image'];
       
//         //  print_r($file);
//           if ($file['type'] == 'image/jpeg') {
//               $img = imagecreatefromjpeg($file_tmp);
//           } 
//           if ($file['type'] == 'image/png') {
//               $img = imagecreatefrompng($file_tmp); 
//           }
// //   print_r($img) ;
  
//     // echo '<pre>';
   
//     // if ($info['mime'] == 'image/jpeg') {
//     //     $img = imagecreatefromjpeg($file_tmp);
//     // } elseif ($info['mime'] == 'image/png') {
//     //     $img = imagecreatefrompng($file_tmp);
//     // }
  
    
        
//     //    $compress_quality;
//         if (isset($img)) {
//             $outputimage = $image_upload_directory ;//  . '.jpeg'
//             if ($file['type'] == 'image/jpeg') {
//                 $images = imagejpeg($img, $outputimage, 50);

//             } 
//             if ($file['type'] == 'image/png') {
          
//                 $images = imagepng($img, $outputimage, 6); //imagepng()

//             }
//             if ($images) {
//                 succcess_alert($img_msg);
                
//             }else{
//                 echo 'pr';
//             }
//         }else{
//             echo 'erroe';
//         }
//   }
function image_compress_upload($file_tmp, $image_upload_directory, $compress_quality, $img_msg = "Successfully Image updated", $file){
    if($compress_quality == ''){
        $compress_quality = 50;
    }
    if($img_msg == ''){
      $img_msg = "Successfully Image updated";
    }
    // $info = getimagesize($file_tmp);
    // $file = $_FILES['image'];
       
         
          if ($file['type'] == 'image/jpeg') {
              $img = imagecreatefromjpeg($file_tmp);
          }elseif($file['type'] == 'image/png'){
            $img = imagecreatefrompng($file_tmp);
            
          }
           else{
            error_alert("Please select jpg or jpeg or pngs images only !");
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

?>