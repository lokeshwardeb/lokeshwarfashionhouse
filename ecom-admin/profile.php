<?php


include "inc/conn.php";
$active_class = 'profile';
include "inc/_header.php";

if(!isset($_SESSION['username'])){
    header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> You should login so that you can access the page .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>') ;
  
    // exit;
  
  }
  elseif(isset($_SESSION['username'])){
    

    // mysqli_real_escape_string($con)

    include "inc/_navbar.php";

    // session_start();

?>

    <div class="container title_bar mt-4" style="width: 100vw;">
        <?php

        include "inc/_title_bar.php";



        ?>

        <?php

        $search_class = 'customers';
    include("inc/functions.php");

  include("inc/_theme.php");


        //   include "inc/_search.php"; 
        ?>

        <?php

// include("inc/functions.php");
        $check_username = $_SESSION['username'];

        $info_sql = "SELECT * FROM `admin_users` WHERE `username` = '$check_username';";
        $info_result = mysqli_query($conn, $info_sql);

        if ($info_result) {
            while ($row = mysqli_fetch_assoc($info_result)) {
                $check_id = $row['id'];
                $profile_username = $row['username'];
                $email = $row['email'];
                $profile_description = $row['admin_description'];
                $phone_no = $row['admin_phone_no'];
                $admin_photo = $row['admin_photo'];
                $role = $row['admin_role'];
            }
        } else {
            $check_id = '';
            $profile_username = '';
            $email = '';
            $profile_description = '';
            $phone_no = '';
            $admin_photo = '';
            $role = '';
        }


        ?>
        <?php

        if (isset($_POST['save_changes'])) {
            $profiles_username = mysqli_real_escape_string($conn, $_POST['username']);
            $email_address =mysqli_real_escape_string($conn, $_POST['email']) ;
            $phone = mysqli_real_escape_string($conn, $_POST['phone_no']) ;
            $admin_role = mysqli_real_escape_string($conn, $_POST['user_role']);
            $profile_description =  mysqli_real_escape_string($conn, $_POST['profile_description']) ;

            $admins_photo = $_FILES['admin_photo'];

            $admin_photo_name = $_FILES['admin_photo']['name'] . '.jpeg';
            $admin_photo_name_main = $_FILES['admin_photo']['name'];
            $admin_photo_tmp = $_FILES['admin_photo']['tmp_name'];

            $admin_photo_upload = 'uploaded_img/' . $admin_photo_name;

            $sql = "SELECT * FROM `admin_users` WHERE `username` = '$check_username';";

            $result = mysqli_query($conn, $sql);


            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                }
                if ($admin_photo_name_main !== '') {
                    $up_pho = "UPDATE `admin_users` SET `username` = '$profiles_username', `email` = '$email_address', `admin_description` = '$profile_description', `admin_photo` = '$admin_photo_name', `admin_role` = '$admin_role' WHERE `admin_users`.`id` = '$check_id';";
                    $result_up_photo = mysqli_query($conn, $up_pho);

                    
                    if ($result_up_photo) {
                        $file_tmp = $admin_photo_tmp;
                        image_compress_upload($file_tmp,$admin_photo_upload, 50, "Admin Photo Uploaded Successfully",$admins_photo);
                        // image_compress_upload($file_tmp, $admin_photo_upload, 50, '', $admin_photo);
                        $_SESSION['admin_photo'] = $admin_photo_upload;
                    //    if(move_uploaded_file($admin_photo_tmp, $admin_photo_upload)){
                    //     $_SESSION['admin_photo'] = $admin_photo_upload;
                    //     update_success_message();
                    //    }
                    } else {
                        update_error_message();
                    }
                }

                if($admin_photo_name_main == ''){
                    $sql_up = "UPDATE `admin_users` SET `username` = '$profiles_username', `email` = '$email_address', `admin_description` = '$profile_description', `admin_role` = '$admin_role' WHERE `admin_users`.`id` = '$check_id';";
                    
                    $result_up = mysqli_query($conn, $sql_up);

                    if($result_up){
                        $_SESSION['username'] = $profiles_username;
                        saved_success_message();
                    }else{
                        saved_error_message();
                    }

                }



            }
        }else{
        //    wrong_error_message();
        }










        // echo  $_SESSION['logo_img'];



        ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="" enctype="multipart/form-data">
            <div class="mb-3">
                <!-- <input type="text"> -->
                <label for="basic-url" class="form-label">Admin Username</label>
                <div class="input-group">
                    <input type="hidden" value="<?php echo $check_id ?>">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Website Name" id="basic-url" aria-describedby="basic-addon3" name="username" value="<?php echo $profile_username ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>

            </div>



            <div class="mb-3">
                <label for="basic-url" class="form-label">Admin Description</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="profile_description"><?php echo $profile_description ?></textarea>
                </div>
            </div>


            <div class="mb-3">
                <label for="basic-url" class="form-label">Admin Photo</label>
                <input type="file" class="form-control" aria-label="file example" name="admin_photo">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>


            <div class="mb-3">
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
            </div>






            <button type="submit" class="btn btn-primary float-end mt-4 mb-5" name="save_changes"> Save changes</button><br><br>
            <label for="" class="mb-5"></label>
        </form>

    </div>






<?php
    include "inc/_footer.php";
}

?>