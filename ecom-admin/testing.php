<?php 
// require "inc/_header.php";
require "inc/functions.php";
if(isset($_POST['submit'])){
    $upload = $_FILES['logo_upload']['name'];
    $upload_tmp = $_FILES['logo_upload']['tmp_name'];

    $info_img = getimagesize($_FILES['logo_upload']['tmp_name']);

    echo '<pre>';
    print_r($info_img);
    echo '</pre>';

    if($info_img['mime'] == 'image/jpeg'){
        $img = imagecreatefromjpeg($upload_tmp);
        // imagecreatefromjpeg()
    }elseif($info_img['mime'] == 'image/png'){
        $img = imagecreatefrompng($_FILES['logo_upload']['tmp_name']);
    
       
    }else{
        echo '<div class = "text-danger">Please select jpeg or png files to upload</div>';
    }
    
    if(isset($img)){
        $output_image = time(). '.jpeg';
       if(imagejpeg($img, $output_image, 40)) {
        echo 'compressed the image';
        succcess_alert('successfully compressed the image');
       }else{
        error_alert('failed to compressed the image');
       }
        // unlink($login_tmp);
    
    }
}


?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing</title>
</head> -->
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="logo_upload" id="">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>