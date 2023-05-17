<?php
// this variable is to make activate the active class
$active_class = 'page settings';
// $active_theme = 'dark_theme';
include "inc/conn.php";

include "inc/_header.php";

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error !</strong> You should login so that you can access the page .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

    // exit;

} elseif (isset($_SESSION['username'])) {

    // $active_theme = 'dark_theme';

    include "inc/functions.php";

    include "inc/_navbar.php";

    include "inc/_company_info.php";



?>







    <div class="container title-bar mt-4" id="orderSec">

        <?php include "inc/_title_bar.php"; ?>
        <?php


        $search_class = 'home';

        include "inc/_search.php";

        include("inc/_theme.php");


        ?>

        <?php

        $sql = "SELECT * FROM `page_settings`";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $hero_aria_bold_word = $row['hero_aria_bold_word'];
                    $hero_aria_offer_title = $row['hero_aria_offer_title'];
                    $hero_aria_offer_title_photo = $row['hero_aria_offer_title_photo'];
                    $hero_aria_offer_canvas_img1 = $row['hero_aria_offer_canvas_img1'];
                    $hero_aria_offer_canvas_img2 = $row['hero_aria_offer_canvas_img2'];
                    $hero_aria_offer_canvas_img3 = $row['hero_aria_offer_canvas_img3'];
                    $datetime = $row['datetime'];
                }

                
            }
        }


        if (isset($_POST['save_changes'])) {
            $Hero_aria_bold_word = mysqli_real_escape_string($conn, $_POST['Hero_aria_bold_word']);
            $Hero_aria_offer_title = mysqli_real_escape_string($conn, $_POST['Hero_aria_offer_title']);
            //   $Hero_aria_bold_word = mysqli_real_escape_string($conn, $_POST['Hero_aria_bold_word']);
            //   $Hero_aria_bold_word = mysqli_real_escape_string($conn, $_POST['Hero_aria_bold_word']);

            $hero_aria_offer_title_photo = $_FILES['hero_aria_offer_title_photo'];
            $hero_aria_offer_title_photo_name = $_FILES['hero_aria_offer_title_photo']['name'];
            $hero_aria_offer_title_photo_tmp = $_FILES['hero_aria_offer_title_photo']['tmp_name'];

            $hero_aria_offer_canvas_image1 = $_FILES['hero_aria_offer_canvas_image1'];
            $hero_aria_offer_canvas_image1_name = $_FILES['hero_aria_offer_canvas_image1']['name'];
            $hero_aria_offer_canvas_image1_tmp = $_FILES['hero_aria_offer_canvas_image1']['tmp_name'];

            $hero_aria_offer_canvas_image2 = $_FILES['hero_aria_offer_canvas_image2'];
            $hero_aria_offer_canvas_image2_name = $_FILES['hero_aria_offer_canvas_image2']['name'];
            $hero_aria_offer_canvas_image2_tmp = $_FILES['hero_aria_offer_canvas_image2']['tmp_name'];

            $hero_aria_offer_canvas_image3 = $_FILES['hero_aria_offer_canvas_image3'];
            $hero_aria_offer_canvas_image3_name = $_FILES['hero_aria_offer_canvas_image3']['name'];
            $hero_aria_offer_canvas_image3_tmp = $_FILES['hero_aria_offer_canvas_image3']['tmp_name'];

            $upload_directory = 'uploaded_img/hero_photo_upload/';
            
            $not_photo_uploaded_hero_title = 0;
            $not_photo_uploaded_hero_canvas1 = 0;
            $not_photo_uploaded_hero_canvas2 = 0;
            $not_photo_uploaded_hero_canvas3 = 0;




            if ($_FILES['hero_aria_offer_title_photo']['type'] == 'image/jpeg' || $_FILES['hero_aria_offer_title_photo']['type'] == 'image/png') {
                $not_photo_uploaded_hero_title = 0;
            }else{
                $not_photo_uploaded_hero_title = 1;

            }

            if ($_FILES['hero_aria_offer_canvas_image1']['type'] == 'image/jpeg' || $_FILES['hero_aria_offer_canvas_image1']['type'] == 'image/png') {
                $not_photo_uploaded_hero_canvas1 = 0;
            }else{
                $not_photo_uploaded_hero_canvas1 = 1;

            }

            if ($_FILES['hero_aria_offer_canvas_image2']['type'] == 'image/jpeg' || $_FILES['hero_aria_offer_canvas_image2']['type'] == 'image/png') {
                $not_photo_uploaded_hero_canvas2 = 0;
            }else{
                $not_photo_uploaded_hero_canvas2 = 1;

            }

            if ($_FILES['hero_aria_offer_canvas_image3']['type'] == 'image/jpeg' || $_FILES['hero_aria_offer_canvas_image3']['type'] == 'image/png') {
                $not_photo_uploaded_hero_canvas3 = 0;
            }else{
                $not_photo_uploaded_hero_canvas3 = 1;

            }

            $sql = "SELECT * FROM `page_settings`";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    if($hero_aria_offer_title_photo_name !== '' && $hero_aria_offer_canvas_image1_name !== '' && $hero_aria_offer_canvas_image2_name !== '' && $hero_aria_offer_canvas_image3_name !== ''){
                        $sql = "UPDATE `page_settings` SET `hero_aria_bold_word` = '$Hero_aria_bold_word', `hero_aria_offer_title` = '$Hero_aria_offer_title', `hero_aria_offer_title_photo` = '$hero_aria_offer_title_photo_name.jpeg', `hero_aria_offer_canvas_img1` = '$hero_aria_offer_canvas_image1_name.jpeg', `hero_aria_offer_canvas_img2` = '$hero_aria_offer_canvas_image2_name.jpeg', `hero_aria_offer_canvas_img3` = '$hero_aria_offer_canvas_image3_name.jpeg' WHERE `page_settings`.`id` = '$id';";

                        $result = mysqli_query($conn, $sql);
    
                        if ($result) {
                            if($not_photo_uploaded_hero_title == 0 && $not_photo_uploaded_hero_canvas1 == 0 && $not_photo_uploaded_hero_canvas2 == 0 && $not_photo_uploaded_hero_canvas3 == 0){
                                succcess_alert("Updated all the informations with all images successfully");

                                image_compress_upload($hero_aria_offer_title_photo_tmp, $upload_directory . $hero_aria_offer_title_photo_name.".jpeg", 50,"",$hero_aria_offer_title_photo);
                                image_compress_upload($hero_aria_offer_canvas_image1_tmp, $upload_directory . $hero_aria_offer_canvas_image1_name.".jpeg", 50,"",$hero_aria_offer_canvas_image1);
                                image_compress_upload($hero_aria_offer_canvas_image2_tmp, $upload_directory . $hero_aria_offer_canvas_image2_name.".jpeg", 50,"",$hero_aria_offer_canvas_image2);
                                image_compress_upload($hero_aria_offer_canvas_image3_tmp, $upload_directory . $hero_aria_offer_canvas_image3_name.".jpeg", 50,"",$hero_aria_offer_canvas_image3);
                            }else{
                                error_alert("Uploaded file is not image. Please upload jpg or jpeg or png file");

                            }
                            
                        }
                    }
                    
                    if($hero_aria_offer_title_photo_name !== '' ){
                        if($not_photo_uploaded_hero_title == 0){
                            $sql = "UPDATE `page_settings` SET `hero_aria_bold_word` = '$Hero_aria_bold_word', `hero_aria_offer_title` = '$Hero_aria_offer_title', `hero_aria_offer_title_photo` = '$hero_aria_offer_title_photo_name.jpeg' WHERE `page_settings`.`id` = '$id';";

                            $result = mysqli_query($conn, $sql);
        
                            if ($result) {
                               succcess_alert("Updated hero-aria offer image successfully");
                               image_compress_upload($hero_aria_offer_title_photo_tmp, $upload_directory . $hero_aria_offer_title_photo_name.".jpeg", 50,"",$hero_aria_offer_title_photo);
    
                            }
                        }else{
            error_alert("Uploaded title image file is not image. Please upload jpg or jpeg or png file");
                           
                        }
                        
                    }
                    if($hero_aria_offer_canvas_image1_name !== '' ){
                        if($not_photo_uploaded_hero_canvas1 == 0){
                            $sql = "UPDATE `page_settings` SET `hero_aria_bold_word` = '$Hero_aria_bold_word', `hero_aria_offer_title` = '$Hero_aria_offer_title', `hero_aria_offer_canvas_img1` = '$hero_aria_offer_canvas_image1_name.jpeg' WHERE `page_settings`.`id` = '$id';";

                            $result = mysqli_query($conn, $sql);
        
                            if ($result) {
                                succcess_alert("Updated hero-aria canvas image1 successfully");
                                image_compress_upload($hero_aria_offer_canvas_image1_tmp, $upload_directory . $hero_aria_offer_canvas_image1_name.".jpeg", 50,"",$hero_aria_offer_canvas_image1);
    
                            }
                        }else{
                            error_alert("Uploaded hero canvas1 file is not image. Please upload jpg or jpeg or png file");

                        }
                        
                    }
                    if($hero_aria_offer_canvas_image2_name !== '' ){
                        if($not_photo_uploaded_hero_canvas2 == 0){
                            $sql = "UPDATE `page_settings` SET `hero_aria_bold_word` = '$Hero_aria_bold_word', `hero_aria_offer_title` = '$Hero_aria_offer_title', `hero_aria_offer_canvas_img2` = '$hero_aria_offer_canvas_image2_name.jpeg' WHERE `page_settings`.`id` = '$id';";

                            $result = mysqli_query($conn, $sql);
        
                            if ($result) {
                                succcess_alert("Updated hero-aria canvas image2 successfully");
                                image_compress_upload($hero_aria_offer_canvas_image2_tmp, $upload_directory . $hero_aria_offer_canvas_image2_name.".jpeg", 50,"",$hero_aria_offer_canvas_image2);
    
                            }
                        }else{
                            error_alert("Uploaded hero canvas2 file is not image. Please upload jpg or jpeg or png file");

                        }
                        
                    }
                    if($hero_aria_offer_canvas_image3_name !== '' ){
                        if($not_photo_uploaded_hero_canvas3 == 0){
                            $sql = "UPDATE `page_settings` SET `hero_aria_bold_word` = '$Hero_aria_bold_word', `hero_aria_offer_title` = '$Hero_aria_offer_title', `hero_aria_offer_canvas_img3` = '$hero_aria_offer_canvas_image3_name.jpeg' WHERE `page_settings`.`id` = '$id';";

                            $result = mysqli_query($conn, $sql);
        
                            if ($result) {
                                succcess_alert("Updated hero-aria canvas image3 successfully");
                                image_compress_upload($hero_aria_offer_canvas_image3_tmp, $upload_directory . $hero_aria_offer_canvas_image3_name.".jpeg", 50,"",$hero_aria_offer_canvas_image3);
    
                                
                            }
                        }else{
                            error_alert("Uploaded hero canvas3 file is not image. Please upload jpg or jpeg or png file");

                        }
                        
                    }

                    if($hero_aria_offer_title_photo_name == '' && $hero_aria_offer_canvas_image1_name == '' && $hero_aria_offer_canvas_image2_name == '' && $hero_aria_offer_canvas_image3_name == ''){
                        $sql = "UPDATE `page_settings` SET `hero_aria_bold_word` = '$Hero_aria_bold_word', `hero_aria_offer_title` = '$Hero_aria_offer_title' WHERE `page_settings`.`id` = '$id';";

                        $result = mysqli_query($conn, $sql);
    
                        if ($result) {
                            succcess_alert("Updated the informations successfully");

                        }
                    }
                  
                } elseif (mysqli_num_rows($result) == 0) {
                    $sql = "INSERT INTO `page_settings` (`hero_aria_bold_word`, `hero_aria_offer_title`, `hero_aria_offer_title_photo`, `hero_aria_offer_canvas_img1`, `hero_aria_offer_canvas_img2`, `hero_aria_offer_canvas_img3`, `datetime`) VALUES ('$Hero_aria_bold_word', '$Hero_aria_offer_title', '$hero_aria_offer_title_photo_name', 'hero_aria_offer_canvas_image1_name', 'hero_aria_offer_canvas_image2_name`', 'hero_aria_offer_canvas_image3_name', current_timestamp());";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        succcess_alert("Added all the informations with all images successfully");
                    }
                }
            }
        }

        ?>

        <div class="container">
            <a href="home.php"> <button type="submit" class="btn btn-primary mb-3">Back to Home</button></a>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="" enctype="multipart/form-data">
                <!-- <div class="mb-3">
                <input type="text">
                <label for="basic-url" class="form-label">Hero-aria bold word</label>
                <div class="input-group">
                    <input type="text" value="<?php echo $check_id ?>">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Hero-aria bold word" id="basic-url" aria-describedby="basic-addon3" name="Hero_aria_bold_word" value="<?php echo $Hero_aria_bold_word ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>

            </div> -->

                <div class="mb-3">
                    <label for="basic-url" class="form-label">Hero-aria bold word</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="Hero_aria_bold_word"><?php echo $hero_aria_bold_word ?></textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="basic-url" class="form-label">Hero-aria offer title</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="Hero_aria_offer_title"><?php echo $hero_aria_offer_title ?></textarea>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="basic-url" class="form-label">Hero-aria offer title photo</label>
                    <input type="file" class="form-control" aria-label="file example" name="hero_aria_offer_title_photo">
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>

                <div class="mb-3">
                    <label for="basic-url" class="form-label">Hero-aria offer canvas image1</label>
                    <input type="file" class="form-control" aria-label="file example" name="hero_aria_offer_canvas_image1">
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>
                <div class="mb-3">
                    <label for="basic-url" class="form-label">Hero-aria offer canvas image2</label>
                    <input type="file" class="form-control" aria-label="file example" name="hero_aria_offer_canvas_image2">
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>
                <div class="mb-3">
                    <label for="basic-url" class="form-label">Hero-aria offer canvas image3</label>
                    <input type="file" class="form-control" aria-label="file example" name="hero_aria_offer_canvas_image3">
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>


                <!-- <div class="mb-3">
                <label for="basic-url" class="form-label">Phone no</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Author's Name" name="phone_no" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $phone_no ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="email" class="form-control" placeholder="Author's Email" name="email" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $email ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">User Role</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Company Name" name="user_role" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $role ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div> -->






                <button type="submit" class="btn btn-primary float-end mt-4 mb-5" name="save_changes"> Save changes</button><br><br>
                <label for="" class="mb-5"></label>
            </form>
        </div>



    </div>
    </div>

    </main>

<?php

    include "inc/_footer.php";
}

?>