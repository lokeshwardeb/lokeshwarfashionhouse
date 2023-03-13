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
                    $website_slogan = $row['website_slogan'];
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
            $website_slogan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['website_slogan']), ENT_QUOTES);
            $aurthors_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['authors_name']), ENT_QUOTES);
            $authors_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['authors_email']), ENT_QUOTES);
            $company_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['company_name']), ENT_QUOTES);
            $company_phone_no = htmlspecialchars(mysqli_real_escape_string($conn,  $_POST['company_phone_no']), ENT_QUOTES);


            // $target_file = $target_dir . basename($_FILES["logo_upload"]["name"]);

            // $logo = $_FILES['logo_upload'];

            // this is the logo img file name
            $logo_name = $_FILES['logo_upload']['name'];
            // echo $logo_name;

            // this is the logo img name with the upload file which is main name to upload or move the file
            $upload_logo = "uploaded_img/" . $logo_name;

            $logo_tmp = $_FILES['logo_upload']['tmp_name'];


            // echo $logo_tmp;

















            $login_name = $_FILES['login_upload']['name'];
            $login_tmp = $_FILES['login_upload']['tmp_name'];
            $upload_login = "uploaded_img/" . $login_name;






            $sql = 'SELECT * FROM `settings`';
            $result = mysqli_query($conn, $sql);

            // if the database is empty then insert the data into the table
            if (mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO `settings` (`website_name`, `website_description`, website_slogan,`logo_img_upload`, `authors_name`, `authors_email`, `company_name`, `phone_no`, `datetime`) VALUES ('$website_name', '$website_description', $website_slogan, '$logo_name', '$aurthors_name', '$authors_email', '$company_name', '$company_phone_no', current_timestamp());";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo 'inserted and saved the changes';

                    if (move_uploaded_file($logo_tmp, $upload_logo)) {
                        echo 'uploaded img';

                        // session_start();
                        // session_unset();

                        // this session is to store the logo image name and location
                        echo  $_SESSION['logo_img'] = $upload_logo;
                    } else {
                        echo 'cannot uploaded the img';
                    }

                    if (move_uploaded_file($login_tmp, $upload_login)) {
                        echo 'upload login img';
                        echo $_SESSION['login_img'] = $upload_login;
                    } else {
                        echo 'cannot uploaded the login img';
                    }
                } else {
                    echo 'cannot inserted and save the changes';
                }
            } else {

                if ($logo_name == '') {
                    $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description', `website_slogan`= '$website_slogan', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;;";
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
                } elseif ($logo_name !== '') {
                    // if the database is not empty then update the table with the new data
                    $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description', `website_slogan`= '$website_slogan', `logo_img_upload` = '$logo_name', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;";

                    $result = mysqli_query($conn, $sql);


                    if (move_uploaded_file($logo_tmp, $upload_logo)) {
                        // echo 'updated and saved the changes';
                        // echo 'uploaded img';
                        // session_start();0
                        // session_unset();


                        // this session is to store the logo image name and location
                        $_SESSION['logo_img'] = $upload_logo;

                        //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //   <strong>updated and saved the changes with site logo!</strong> You should refresh the page to  check in on some of those fields below.
                        //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        // </div>';

                        saved_success_message();
                    } else {
                        // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     <strong>updated and saved the changes!</strong> You should refresh the page to  check in on some of those fields below.
                        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //   </div>';

                        saved_error_message();
                    }
                }



                if ($login_name == '') {
                    $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description', `website_slogan`= '$website_slogan', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;;";
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
                } elseif ($login_name !== '') {
                    $sql = "UPDATE `settings` SET `website_name` = '$website_name', `website_description` = '$website_description', `website_slogan`= '$website_slogan', `login_img` = '$login_name', `authors_name` = '$aurthors_name', `authors_email` = '$authors_email', `company_name` = '$company_name', `phone_no` = '$company_phone_no' WHERE `settings`.`id` = $id;";

                    $result = mysqli_query($conn, $sql);


                    if (move_uploaded_file($login_tmp, $upload_login)) {
                        // echo 'updated and saved the changes';
                        // echo 'uploaded img';
                        // session_start();0
                        // session_unset();


                        // this session is to store the logo image name and location
                        $_SESSION['logo_img'] = $upload_login;

                        //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //   <strong>updated and saved the changes with site login image!</strong> You should refresh the page to  check in on some of those fields below.
                        //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        // </div>';

                        saved_success_message();
                    } else {
                        // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     <strong>updated and saved the changes!</strong> You should refresh the page to  check in on some of those fields below.
                        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        //   </div>';

                        saved_error_message();
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