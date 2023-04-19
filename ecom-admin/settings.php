<?php
include "inc/conn.php";
$active_class = 'settings';
include "inc/_header.php";
if (!isset($_SESSION['username'])) {
    header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> You should login so that you can access the page .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>');

    // exit;

} elseif (isset($_SESSION['username'])) {


    include "inc/_navbar.php";

    // session_start();

?>

    <div class="container title_bar mt-4">
        <?php

        include "inc/_title_bar.php";

        include("inc/functions.php");


        ?>

        <?php

        $search_class = 'customers';
        include("inc/_theme.php");

        //   include "inc/_search.php"; 
        ?>

        <?php

        // $id = 

        $sql = 'SELECT * FROM `settings`';

        $result = mysqli_query($conn, $sql);



        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $website_name = $row['website_name'];
                    $website_description = $row['website_description'];
                    $website_contract_email = $row['website_contract_email'];
                    $website_slogan = $row['website_slogan'];
                    $product_currency = $row['product_currency'];

                    $aurthors_name = $row['authors_name'];
                    $authors_email = $row['authors_email'];
                    $company_name = $row['company_name'];
                    $company_phone_no = $row['phone_no'];

                    // echo 'the website name is' . $website_name;
                }
            } else {
                $id = '';
                $website_name = '';
                $website_description = '';
                $website_slogan = '';
                $product_currency = '';
                $aurthors_name = '';
                $authors_email = '';
                $company_name = '';
                $company_phone_no = '';
            }
        }




        //   to save the information from the settings
        if (isset($_POST['save_changes'])) {
            $website_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['website_name']), ENT_QUOTES);
            $website_description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['website_description']), ENT_QUOTES);
            $website_contract_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['website_contract_email']), ENT_QUOTES);

            $website_slogan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['website_slogan']), ENT_QUOTES);
            $product_currency = $_POST['product_currency'];
            $aurthors_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['authors_name']), ENT_QUOTES);
            $authors_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['authors_email']), ENT_QUOTES);
            $company_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['company_name']), ENT_QUOTES);
            $company_phone_no = htmlspecialchars(mysqli_real_escape_string($conn,  $_POST['company_phone_no']), ENT_QUOTES);


            // $target_file = $target_dir . basename($_FILES["logo_upload"]["name"]);

            // $logo = $_FILES['logo_upload'];

            // this is the logo img file name
            $logo_name = $_FILES['logo_upload']['name'] . '.jpeg';
            $logo_name_main = $_FILES['logo_upload']['name'];

            $logo_file = $_FILES['logo_upload'];
            // echo $logo_name;

            // this is the logo img name with the upload file which is main name to upload or move the file
            $upload_logo = "uploaded_img/" . $logo_name;

            $logo_tmp = $_FILES['logo_upload']['tmp_name'];


            // echo $logo_tmp;



            $not_photo_uploaded = 0;

            if ($_FILES['logo_upload']['type'] == 'image/jpeg') {
                $not_photo_uploaded = 0;
            }elseif( $_FILES['logo_upload']['type'] == 'image/png'){
                $not_photo_uploaded = 0;

            }
            
            else {
                $not_photo_uploaded = 1;
            }















            $login_name = $_FILES['login_upload']['name'] . '.jpeg';
            $login_name_main = $_FILES['login_upload']['name'];
            $login_file = $_FILES['login_upload'];
            $login_tmp = $_FILES['login_upload']['tmp_name'];
            $upload_login = "uploaded_img/" . $login_name;

            $not_photo_uploaded_login = 0;

            if ($_FILES['login_upload']['type'] == 'image/jpeg') {
                $not_photo_uploaded_login = 0;
            }elseif($_FILES['login_upload']['type'] == 'image/png') {
                $not_photo_uploaded_login = 0;

            }
            
            
            else {
                $not_photo_uploaded_login = 1;
                // error_alert("Uploaded file is not a jpg or jpeg or png. Please upload a jpg or jpeg or png file");

            }



            $sql = 'SELECT * FROM `settings`';
            $result = mysqli_query($conn, $sql);

            // if the database is empty then insert the data into the table
            if (mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO `settings` (`website_name`, `website_description` `website_contract_email`, `website_slogan`, `product_currency`, `logo_img_upload`, `authors_name`, `authors_email`, `company_name`, `phone_no`, `datetime`) VALUES ('$website_name', '$website_description', '$website_contract_email', $website_slogan, '$product_currency', '$logo_name', '$aurthors_name', '$authors_email', '$company_name', '$company_phone_no', current_timestamp());";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo 'inserted and saved the changes';

                    image_compress_upload($logo_tmp, $upload_logo, 50, "", $logo_file);
                    echo  $_SESSION['logo_img'] = $upload_logo;

                    // if (move_uploaded_file($logo_tmp, $upload_logo)) {
                    //     echo 'uploaded img';

                    //     // session_start();
                    //     // session_unset();

                    //     // this session is to store the logo image name and location
                    // } else {
                    //     echo 'cannot uploaded the img';
                    // }

                    image_compress_upload($login_tmp, $upload_login, 50, "", $login_file);
                    // if (move_uploaded_file($login_tmp, $upload_login)) {
                    //     echo 'upload login img';
                    //     echo $_SESSION['login_img'] = $upload_login;
                    // } else {
                    //     echo 'cannot uploaded the login img';
                    // }
                } else {
                    echo 'cannot inserted and save the changes';
                }
            } else {

                if ($logo_name_main == '') {
                    $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description', `website_contract_email` = '$website_contract_email',  `website_slogan`= '$website_slogan', `product_currency` = '$product_currency', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;;";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     <strong>updated and saved the changes but not updated site logo ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //   </div>';

                        update_success_message();
                    } else {
                        // echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        //     <strong>Error ! Cannot updated and saved the changes but not updated site logo ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //   </div>';
                        update_error_message();
                    }
                } elseif ($logo_name_main !== '') {
                    if ($not_photo_uploaded == 0) {
                        // if the database is not empty then update the table with the new data
                        $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_contract_email` =  '$website_contract_email', `website_description` = '$website_description', `website_slogan`= '$website_slogan', `product_currency` = '$product_currency',`logo_img_upload` = '$logo_name', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;";

                        $result = mysqli_query($conn, $sql);
                        $file_tmp = $logo_tmp;
                        //  image_compress_upload($file_tmp, $upload_logo, 50,"", );
                        image_compress_upload($logo_tmp, $upload_logo, 50, "Image uploaded successfully", $logo_file);

                        $_SESSION['logo_img'] = $upload_logo;

                        // if (move_uploaded_file($logo_tmp, $upload_logo)) {
                        //     // echo 'updated and saved the changes';
                        //     // echo 'uploaded img';
                        //     // session_start();0
                        //     // session_unset();


                        //     // this session is to store the logo image name and location

                        //     //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     //   <strong>updated and saved the changes with site logo!</strong> You should refresh the page to  check in on some of those fields below.
                        //     //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //     // </div>';

                        //     saved_success_message();
                        // } else {
                        //     // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     //     <strong>updated and saved the changes!</strong> You should refresh the page to  check in on some of those fields below.
                        //     //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //     //   </div>';

                        //     saved_error_message();
                        // }
                    } else {
                        # code...
                        error_alert("Uploaded file is not a jpg or jpeg or png. Please upload a jpg or jpeg or png file ss");
                    }
                }



                if ($login_name_main == '') {
                    $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description', `website_contract_email` = '$website_contract_email', `website_slogan`= '$website_slogan',`product_currency` = '$product_currency', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;;";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     <strong>updated and saved the changes but not updated site login image ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //   </div>';

                        update_success_message();
                    } else {
                        // echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        //     <strong>Error ! Cannot updated and saved the changes but not updated site login image ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //   </div>';

                        update_error_message();
                    }
                }
                if ($login_name_main !== '') {
                    if ($not_photo_uploaded_login == 0) {
                        $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description',`website_contract_email` = '$website_contract_email', `website_slogan`= '$website_slogan',`product_currency` = '$product_currency', `login_img` = '$login_name', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;";

                        $result = mysqli_query($conn, $sql);
                        $file_tmp = $login_tmp;
                        image_compress_upload($file_tmp, $upload_login, 50, '', $login_file);

                        $_SESSION['logo_img'] = $upload_login;

                        // if (move_uploaded_file($login_tmp, $upload_login)) {
                        //     // echo 'updated and saved the changes';
                        //     // echo 'uploaded img';
                        //     // session_start();0
                        //     // session_unset();


                        //     // this session is to store the logo image name and location

                        //     //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     //   <strong>updated and saved the changes with site login image!</strong> You should refresh the page to  check in on some of those fields below.
                        //     //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //     // </div>';

                        //     saved_success_message();
                        // } else {
                        //     // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     //     <strong>updated and saved the changes!</strong> You should refresh the page to  check in on some of those fields below.
                        //     //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //     //   </div>';

                        //     saved_error_message();
                        // }
                    } elseif ($not_photo_uploaded_login == 1) {
                        error_alert("Uploaded file is not a jpg or jpeg or png. Please upload a jpg or jpeg or png filedfd");
                    }
                }

                // users login image functionality

                $users_login_upload = $_FILES['users_login_upload'];
                $user_login_image = $_FILES['users_login_upload']['name'] . '.jpeg';
                $user_login_image_main = $_FILES['users_login_upload']['name'];
                $user_login_image_tmp = $_FILES['users_login_upload']['tmp_name'];

                $user_login_image_upload = "uploaded_img/users_login_upload/" . $user_login_image;

                $not_photo_uploaded_user_login = 0;

                if ($_FILES['users_login_upload']['type'] == 'image/jpeg') {
                    $not_photo_uploaded_user_login = 0;
                }elseif($_FILES['users_login_upload']['type'] == 'image/png'){
                    $not_photo_uploaded_user_login = 0;

                }
                
                else {
                    $not_photo_uploaded_user_login = 1;
                }

                if ($user_login_image_main !== '' && $login_name_main !== '') {
                    if ($not_photo_uploaded_user_login == 0 && $not_photo_uploaded_login == 0) {
                        $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description',`website_contract_email` = '$website_contract_email', `website_slogan`= '$website_slogan',`product_currency` = '$product_currency', `login_img` = '$login_name', `users_login_img` = '$user_login_image',`authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;";

                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $file_tmp = $user_login_image_tmp;
                            image_compress_upload($file_tmp, $user_login_image_upload, 50, '', $users_login_upload);
                            $file_tmp = $login_tmp;

                            image_compress_upload($file_tmp, $upload_login, 50, '', $login_file);


                            // if(move_uploaded_file($user_login_image_tmp, $user_login_image_upload)){
                            //     update_success_message();
                            // }else{
                            //     update_error_message();
                            // }
                        }
                    }else{
                        # code...
                        error_alert("Uploaded file is not a jpg or jpeg or png. Please upload a jpg or jpeg or png file use main login");
                    }
                    
                } 

                if ($user_login_image_main !== '' && $login_name_main == '') {
                    if ($not_photo_uploaded_user_login == 0) {
                        $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description', `website_contract_email` = '$website_contract_email', `website_slogan`= '$website_slogan',`product_currency` = '$product_currency', `users_login_img` = '$user_login_image',`authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;";

                        $result = mysqli_query($conn, $sql);


                        if ($result) {
                            $file_tmp = $user_login_image_tmp;
                            image_compress_upload($file_tmp, $user_login_image_upload, 50, '', $users_login_upload);
                            // if(move_uploaded_file($user_login_image_tmp, $user_login_image_upload)){
                            //     update_success_message();
                            // }else{
                            //     update_error_message();
                            // }
                        }
                    } elseif ($not_photo_uploaded_user_login == 1) {
                        # code...
                        error_alert("Uploaded file is not a jpg or jpeg or png. Please upload a jpg or jpeg or png filethie us login");
                    }
                }






                //     if (file_exists($logo_name) == !'') {
                //         if (file_exists($upload_logo)) {
                //             echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                //             <strong>File Already exists!</strong> You should check the uploaded file if it already exists. Otherwise you can upoload it again.
                //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //           </div>';
                //         } else {
                //             if (move_uploaded_file($logo_tmp, $upload_logo)) {
                //                 echo 'updated and saved the changes';
                //                 echo 'uploaded img';
                //                 // session_start();
                //                 // session_unset();


                //                 // this session is to store the logo image name and location
                //                 $_SESSION['logo_img'] = $upload_logo;

                //                 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                //           <strong>updated and saved the changes with site logo!</strong> You should refresh the page to  check in on some of those fields below.
                //           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //         </div>';
                //             } else {
                //                 echo 'cannot uploaded the img';
                //             }
                //         }
                //     }else{
                //         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                //           <strong>updated and saved the changes !</strong> You should refresh the page to  check in on some of those fields below.
                //           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //         </div>';
                //     }
                // } else {
                // echo 'cannot updated and saved the changes';

            }
        }






        ?>
        <div class="container full-width">

        </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="basic-url" class="form-label">Website name</label>
                <div class="input-group">
                    <input type="hidden" value="<?php echo $id ?>">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Website Name" id="basic-url" aria-describedby="basic-addon3" name="website_name" value="<?php echo $website_name ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>

            </div>



            <div class="mb-3">
                <label for="basic-url" class="form-label">Website Description</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="website_description"><?php echo $website_description ?></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Website Contract email</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="email" class="form-control" aria-label="With textarea" placeholder="Website contract email" name="website_contract_email" value="<?php echo $website_contract_email ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Website Slogan</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="Website Slogan" name="website_slogan"><?php echo $website_slogan ?></textarea>
                </div>
            </div>


            <div class="mb-3">
                <label for="basic-url" class="form-label">Website logo</label>
                <input type="file" class="form-control" aria-label="file example" name="logo_upload">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Login page image</label>
                <input type="file" class="form-control" aria-label="file example" name="login_upload">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Users Login page image</label>
                <input type="file" class="form-control" aria-label="file example" name="users_login_upload">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>

            <div class="mb-3">
                <label for="basic-url" class="form-label">Author's name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Author's Name" name="authors_name" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $aurthors_name ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Author's Email</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="email" class="form-control" placeholder="Author's Email" name="authors_email" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $authors_email ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Product currency</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>


                    <select class="form-select" name="product_currency" id="inputGroupSelect04" aria-label="Example select with button addon">
                        <!-- <option selected value="In-stock">Choose...</option> -->

                        <option <?php

                                if ($product_currency == 'usd') {
                                    echo 'selected';
                                }


                                ?> value="usd">USD - US DOLLAR</option>
                        <option <?php

                                if ($product_currency == 'bdt') {
                                    echo 'selected';
                                }


                                ?> value="bdt">BDT - BANGLADESHI TAKA</option>
                        <!-- <option value="3">Three</option> -->
                    </select>
                    <!-- <button class="btn btn-outline-secondary" type="button">Button</button> -->



                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Company name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $company_name ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Phone name</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">+880</span>
                    <input type="number" class="form-control" placeholder="Company Name" name="company_phone_no" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $company_phone_no ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>





            <button type="submit" class="btn btn-primary float-end mt-4 mb-5" name="save_changes"> Save changes</button><br><br>
            <label for="" class="mb-5"></label>
        </form>

        <?php











        // echo  $_SESSION['logo_img'];



        ?>



    </div>








<?php
    include "inc/_footer.php";
}

?>