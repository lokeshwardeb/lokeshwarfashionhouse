<?php 
// session_start();
include "../inc/conn.php";
$active_class = "profile";

include "inc/_cus_header.php";
include "inc/_cus_navbar.php";
?>
<?php
if(!isset($_SESSION['cus_username'])){
    // header("location: index.php");
    // echo $_SESSION['cus_username'];
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> You should login sofdfdfd that you can access the page .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>') ;
  
    // exit;
  
  }
  else{
    

    // mysqli_real_escape_string($con)


    // session_start();

?>


    <div class="container title_bar mt-4" style="width: 100vw;">
        <?php

        include "inc/_cus_title_bar.php";



        ?>

        <?php

        $search_class = 'customers';
    include("../inc/functions.php");

//   include("inc/_theme.php");


        //   include "inc/_search.php"; 
        ?>

        <?php

// include("inc/functions.php");
        $check_username = $_SESSION['cus_username'];

        $info_sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$check_username'";
        $info_result = mysqli_query($conn, $info_sql);

        if ($info_result) {
            while ($row = mysqli_fetch_assoc($info_result)) {
                $check_id = $row['cus_id'];
                $cus_username = $row['cus_username'];
                $cus_email = $row['cus_email'];
                $cus_profile_description = $row['cus_desc'];
                $cus_phone_no = $row['cus_phone_no'];
                $cus_photo = $row['cus_photo'];
               
            }
        } else {
            $check_id = '';
            $cus_username = '';
            $cus_email = '';
            $cus_profile_description = '';
            $cus_phone_no = '';
            $cus_photo = '';
            
        }


        ?>
        <?php

        if (isset($_POST['save_changes'])) {
            
            $profiles_username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['cus_username']), ENT_QUOTES);
            $email_address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['cus_email']), ENT_QUOTES);
            $cus_phone = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['phone_no']), ENT_QUOTES);
            $cus_address = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['cus_address']), ENT_QUOTES);
           
            $cus_profile_description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['cus_profile_description']), ENT_QUOTES);

            $cus_photo = $_FILES['cus_user_photo'];

            $cus_user_photo_name = $_FILES['cus_user_photo']['name'] . '.jpeg';
            $cus_user_photo_tmp = $_FILES['cus_user_photo']['tmp_name'];

            $cus_user_photo_upload = "../ecom-admin/uploaded_img/cus_photo_upload/" . $cus_user_photo_name;

            $sql = "SELECT * FROM `cus_users` WHERE `cus_username` = '$check_username'";

            $result = mysqli_query($conn, $sql);


            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['cus_id'];
                }
                if ($cus_user_photo_name !== '') {
                    $up_pho = "UPDATE `cus_users` SET `cus_username` = '$profiles_username', `cus_desc` = '$cus_profile_description', `cus_email` = '$email_address', `cus_phone_no` = '$cus_phone', `cus_photo` = '$cus_user_photo_name', `cus_address` = '$cus_address' WHERE `cus_users`.`cus_id` = '$check_id';";
                    $result_up_photo = mysqli_query($conn, $up_pho);

                    if ($result_up_photo) {
                        $file_tmp = $cus_user_photo_tmp;

                        image_compress_upload($file_tmp, $cus_user_photo_upload, 50, "Successfully info added with the Image", $cus_photo);
                        $_SESSION['cus_photo'] = $cus_user_photo_name;

                      
                    } else {
                        update_error_message();
                    }
                }

              else{
                    $sql_up = "UPDATE `cus_users` SET `cus_username` = '$profiles_username', `cus_desc` = '$cus_profile_description', `cus_email` = '$email_address', `cus_phone_no` = '$cus_phone', `cus_address` = '$cus_address' WHERE `cus_users`.`cus_id` = '$check_id';";
                    
                    $result_up = mysqli_query($conn, $sql_up);

                    if($result_up){
                        $_SESSION['cus_username'] = $profiles_username;
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
                <label for="basic-url" class="form-label">Username</label>
                <div class="input-group">
                    <input type="hidden" value="<?php echo $check_id ?>">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Website Name" id="basic-url" aria-describedby="basic-addon3" name="cus_username" value="<?php echo $cus_username ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>

            </div>



            <div class="mb-3">
                <label for="basic-url" class="form-label"> Description</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="Write something about yourself on Description" name="cus_profile_description"><?php echo $cus_profile_description ?></textarea>
                </div>
            </div>


            <div class="mb-3">
                <label for="basic-url" class="form-label">Users Photo</label>
                <input type="file" class="form-control" aria-label="file example" name="cus_user_photo">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>


            <div class="mb-3">
                <label for="basic-url" class="form-label">Phone no</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Phone no" name="phone_no" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cus_phone_no ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="email" class="form-control" placeholder="Email" name="cus_email" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cus_email ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Address</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon3">@</span>
                    <input type="text" class="form-control" placeholder="Email" name="cus_address" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $cus_address ?>">
                </div>
                <div class="form-text">Example help text goes outside the input group.</div>
            </div>
          






            <button type="submit" class="btn btn-primary float-end mt-4 mb-5" name="save_changes"> Save changes</button><br><br>
            <label for="" class="mb-5"></label>
        </form>

    </div>


</div>



<?php
    include "inc/_cus_footer.php";
}

?>