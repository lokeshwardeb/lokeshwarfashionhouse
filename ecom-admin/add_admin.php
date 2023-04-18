<?php
include "inc/conn.php";
$active_class = 'add admin';
include "inc/_header.php";
include "inc/_navbar.php";

// session_start();

if(!isset($_SESSION['username'])){
    header("location: index.php");
    die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> You should login so that you can access the page .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>') ;
  
    // exit;
  
  }
  elseif(isset($_SESSION['username'])){
    
    

?>

<div class="container title_bar mt-4">
    <?php

    include "inc/_title_bar.php";



    ?>

    <?php

    $search_class = 'admins';

    include "inc/_search.php";
    include "inc/functions.php";
    include "inc/_theme.php";
    ?>
    <button type="submit" class="btn btn-primary"><a href="admins.php" class="nav-link">Go back to admins</a></button>

    <?php

    // $id = 

    $sql = 'SELECT * FROM `admin_users`';

    $result = mysqli_query($conn, $sql);



    // if ($result) {
    //     if (mysqli_num_rows($result) > 0) {
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $id = $row['id'];
    //             $username = $row['username'];
    //             $admin_description = $row['admin_description'];
    //             $email = $row['email'];
    //             $password = $row['password'];
    //             $admin_photo = $row['admin_photo'];
    //             $admin_phone_no = $row['admin_phone_no'];
    //             $admin_role = $row['admin_role'];
    //             $datetime = $row['datetime'];

    //             // echo 'the website name is' . $website_name;
    //         }
    //     } else {
    //         $id = '';
    //         $username = '';
    //         $admin_description = '';
    //         $email = '';
    //         $password = '';
    //         $admin_photo = '';
    //         $admin_phone_no = '';
    //         $admin_role = '';
    //         $datetime = '';
    //     }
    // }




    //   to save the information from the settings
    if (isset($_POST['save_changes'])) {
        // $id = $row['id'];
        $username = htmlspecialchars(mysqli_real_escape_string($conn,  $_POST['username']), ENT_QUOTES) ;
        $admin_description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['admin_description']), ENT_QUOTES) ;
        $email =htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']), ENT_QUOTES)  ;
        $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']), ENT_QUOTES)  ;
        $cpassword = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['cpassword']), ENT_QUOTES)  ;

        $hash = password_hash($password, PASSWORD_DEFAULT);

        //  echo 'the verify is ' . $verify = password_verify($password, $hash);

        $admin_photo = $_FILES['admin_photo'];
        $admin_phone_no = $_POST['admin_phone_no'];
        $admin_role = $_POST['admin_role'];

        // this is the logo img file name
        $img_name = $_FILES['admin_photo']['name'] . '.jpeg';

        // this is the logo img name with the upload file which is main name to upload or move the file
        $upload_img = "uploaded_img/" . $img_name;

        $img_tmp = $_FILES['admin_photo']['tmp_name'];



        $sql = "SELECT * FROM `admin_users`";


        // if the database is empty then insert the data into the table

        $result = mysqli_query($conn, $sql);

        // check if the password and cpassword are same
        if ($password == $cpassword) {
            // if there any data contains on the db
            if (mysqli_num_rows($result) > 0) {

                // check if there already the submitted email contains on db
           
            

               
                // if it contains then show the alert


                // if the admin photo is blank then add without the img name and img 
                if ($admin_photo == '') {



                    $sql = "INSERT INTO `admin_users` (`id`, `username`, `admin_description`, `email`, `password`, `admin_phone_no`, `admin_role`, `datetime`) VALUES (NULL, '$username', '$admin_description', '$email', '$hash', '$admin_phone_no', '$admin_role', current_timestamp());";
                    // $result = mysqli_query($conn, $sql);
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>updated and saved the changes but not updated site logo ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error ! Cannot updated and saved the changes but not updated site logo ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                    }
                }

                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                elseif ($admin_photo !== '') {
                    // if the database is not empty then update the table with the new data
                    $sql = "INSERT INTO `admin_users` (`id`, `username`, `admin_description`, `email`, `password`, `admin_photo`, `admin_phone_no`, `admin_role`, `datetime`) VALUES (NULL, '$username', '$admin_description', '$email', '$hash', '$img_name', '$admin_phone_no', '$admin_role', current_timestamp());";
                    $result = mysqli_query($conn, $sql);

                    // $result = mysqli_query($conn, $sql);
                    $file_tmp = $img_tmp;

                    image_compress_upload($file_tmp, $upload_img, 50, '', $admin_photo);

                    
                } else {
                    echo 'cannot saved the changes';
                }
            
            } elseif (mysqli_num_rows($result) == 0) {


                //  else if the email is unique and does not contains on the db then add the admin user to the system and the db
                // echo 'inserted and saved the changes';

                // if the admin photo is blank then add without the img name and img 
                if ($admin_photo == '') {



                    $sql = "INSERT INTO `admin_users` (`id`, `username`, `admin_description`, `email`, `password`, `admin_phone_no`, `admin_role`, `datetime`) VALUES (NULL, '$username', '$admin_description', '$email', '$hash', '$admin_phone_no', '$admin_role', current_timestamp());";
                    // $result = mysqli_query($conn, $sql);
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>updated and saved the changes but not updated site logo ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error ! Cannot updated and saved the changes but not updated site logo ! The previous site logo contains.</strong> You should refresh the page to  check in on some of those fields below.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>';
                    }
                }

                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                elseif ($admin_photo !== '') {
                    // if the database is not empty then update the table with the new data
                    $sql = "INSERT INTO `admin_users` (`id`, `username`, `admin_description`, `email`, `password`, `admin_photo`, `admin_phone_no`, `admin_role`, `datetime`) VALUES (NULL, '$username', '$admin_description', '$email', '$hash', '
                                $img_name', '$admin_phone_no', '$admin_role', current_timestamp());";
                    $result = mysqli_query($conn, $sql);

                    // $result = mysqli_query($conn, $sql);

                    $file_tmp = $img_tmp;

                    image_compress_upload($file_tmp, $upload_img, 50, '', $admin_photo);

                    $_SESSION['admin_photo'] = $upload_img;

                    
                } else {
                    echo 'cannot saved the changes';
                }
            }
        } else {
            echo 'password does not match !';
        }
    }



    ?>
    <div class="container full-width">

    </div>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="basic-url" class="form-label">Admin username</label>
            <div class="input-group">
                <input type="hidden" value="">
                <span class="input-group-text" id="basic-addon3">@</span>
                <input type="text" class="form-control" placeholder="Admin username" id="basic-url" aria-describedby="basic-addon3" name="username" value="" required>
            </div>
            <div class="form-text">Example help text goes outside the input group.</div>

        </div>



        <div class="mb-3">
            <label for="basic-url" class="form-label">Admin Description</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="admin_description"></textarea>
            </div>
        </div>

        <div class="mb-3">
            <label for="basic-url" class="form-label">Admin Email</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">@</span>
                <input type="email" class="form-control" placeholder="Author's Email" name="email" id="basic-url" aria-describedby="basic-addon3" value="" required>
            </div>
            <div class="form-text">Example help text goes outside the input group.</div>
        </div>
        <div class="mb-3">
            <label for="basic-url" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">@</span>
                <input type="password" class="form-control" placeholder="Password" name="password" id="basic-url" aria-describedby="basic-addon3" value="" required>
            </div>
            <div class="form-text">Example help text goes outside the input group.</div>
        </div>
        <div class="mb-3">
            <label for="basic-url" class="form-label">Confirm Password</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">@</span>
                <input type="text" class="form-control" placeholder="Confirm Password" name="cpassword" id="basic-url" aria-describedby="basic-addon3" value="" required>
            </div>
            <div class="form-text">Example help text goes outside the input group.</div>
        </div>

        <div class="mb-3">
            <label for="basic-url" class="form-label">Admins photo</label>
            <input type="file" class="form-control" aria-label="file example" name="admin_photo">
            <div class="invalid-feedback">Example invalid form file feedback</div>
        </div>

        <div class="mb-3">
            <label for="basic-url" class="form-label">Phone no</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">+880</span>
                <input type="number" class="form-control" placeholder="Company Name" name="admin_phone_no" id="basic-url" aria-describedby="basic-addon3" value="">
            </div>
            <div class="form-text">Example help text goes outside the input group.</div>
        </div>

        <div class="mb-3">
            <label for="basic-url" class="form-label">Admin role</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">@</span>
                <input type="text" class="form-control" placeholder="Author's Name" name="admin_role" id="basic-url" aria-describedby="basic-addon3" value="" required>
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