<?php
include "inc/conn.php";
$active_class = 'products';
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

    $search_class = 'products';

    include "inc/_search.php";
    include "inc/functions.php";
    include "inc/_theme.php";
    ?>
    <button type="submit" class="btn btn-primary"><a href="products.php" class="nav-link">Go back to products</a></button>

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
        $product_name = htmlspecialchars(mysqli_real_escape_string($conn,  $_POST['product_name']), ENT_QUOTES) ;
        $product_description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['product_description']), ENT_QUOTES) ;
        $product_price = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['product_price']), ENT_QUOTES)  ;

        

        //  echo 'the verify is ' . $verify = password_verify($password, $hash);

        $product_photo = $_FILES['product_photo'];
        // $admin_phone_no = $_POST['admin_phone_no'];
        // $admin_role = $_POST['admin_role'];

        // this is the logo img file name
        $img_name = htmlspecialchars(mysqli_real_escape_string($conn, $_FILES['product_photo']['name']), ENT_QUOTES)  ;

        // this is the logo img name with the upload file which is main name to upload or move the file
        $upload_img = "uploaded_img/products/" . $img_name;

        $img_tmp = $_FILES['product_photo']['tmp_name'];

        $product_status = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['product_status']), ENT_QUOTES);
        


        $sql = "SELECT * FROM `products`";


        // if the database is empty then insert the data into the table

        $result = mysqli_query($conn, $sql);

        // check if the password and cpassword are same
        if ($result) {
            // if there any data contains on the db
            if (mysqli_num_rows($result) > 0) {

                // check if there already the submitted email contains on db
           
            

               
                // if it contains then show the alert


                // if the admin photo is blank then add without the img name and img 
                if ($img_name == '') {



                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_price`, `product_status`, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$product_price', '$product_status', current_timestamp());";
                    // $result = mysqli_query($conn, $sql);
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        saved_success_message();
                    } else {
                        saved_error_message();
                    }
                }

                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                elseif ($img_name !== '') {
                    // if the database is not empty then update the table with the new data
                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_img`, `product_price`, `product_status`, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$img_name', '$product_price', '$product_status', current_timestamp());";
                    $result = mysqli_query($conn, $sql);

                    // $result = mysqli_query($conn, $sql);

                    if($result){

                        if (move_uploaded_file($img_tmp, $upload_img)) {
                            // echo 'updated and saved the changes';
                            // echo 'uploaded img';
                            // session_start();0
                            // session_unset();
    
    
                            // this session is to store the logo image name and location
                            // $_SESSION['logo_img'] = $upload_img;
    
                         saved_success_message();
                        } else {
                           saved_error_message();
                        }
                    }


                } else {
                    wrong_error_message();
                }
            
            } elseif (mysqli_num_rows($result) == 0) {


                //  else if the email is unique and does not contains on the db then add the admin user to the system and the db
                // echo 'inserted and saved the changes';

                // if the admin photo is blank then add without the img name and img 
                if ($img_name == '') {



                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_price`, `product_status`, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$product_price', '$product_status', current_timestamp());";
                    // $result = mysqli_query($conn, $sql);
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                       saved_success_message();
                    } else {
                        saved_error_message();
                    }
                }

                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                elseif ($img_name !== '') {
                    // if the database is not empty then update the table with the new data
                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_img`, `product_price`, `product_status`, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$img_name', '$product_price', '$product_status', current_timestamp());";
                    $result = mysqli_query($conn, $sql);

                    // $result = mysqli_query($conn, $sql);
if($result){

    if (move_uploaded_file($img_tmp, $upload_img)) {
        // echo 'updated and saved the changes';
        // echo 'uploaded img';
        // session_start();0
        // session_unset();
        $_SESSION['admin_photo'] = $upload_img;

        // this session is to store the logo image name and location
        // $_SESSION['logo_img'] = $upload_img;

       saved_success_message();
    } else {
       saved_error_message();
    }
}

                } else {
                   wrong_error_message();
                }
            }
        }
    }



    ?>
    <div class="container full-width">

    </div>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="basic-url" class="form-label">Product Name</label>
            <div class="input-group">
                <input type="hidden" value="">
                <span class="input-group-text" id="basic-addon3">@</span>
                <input type="text" class="form-control" placeholder="Product Name" id="basic-url" aria-describedby="basic-addon3" name="product_name" value="" required>
            </div>
            <div class="form-text">Example help text goes outside the input group.</div>

        </div>



        <div class="mb-3">
            <label for="basic-url" class="form-label">Product Description</label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <textarea class="form-control" aria-label="With textarea" placeholder="Product Description" name="product_description"></textarea>
            </div>
        </div>

        <div class="mb-3">
            <label for="basic-url" class="form-label">Product Price</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">@</span>
                <input type="number" min="0"   class="form-control" placeholder="Product Price" name="product_price" id="basic-url" aria-describedby="basic-addon3"  required>
            </div>
            <div class="form-text">Example help text goes outside the input group.</div>
        </div>
        

        <div class="mb-3">
            <label for="basic-url" class="form-label">Product photo</label>
            <input type="file" class="form-control" aria-label="file example" name="product_photo">
            <div class="invalid-feedback">Example invalid form file feedback</div>
        </div>
        <div class="mb-3">
            <label for="basic-url" class="form-label">Product Status</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">@</span>

                
  <select class="form-select" name="product_status" id="inputGroupSelect04" aria-label="Example select with button addon">
    <!-- <option selected>Choose...</option> -->
    <option value="In-stock">In-stock</option>
    <option value="Out-stock">Out-stock</option>
    <!-- <option value="3">Three</option> -->
  </select>
  <!-- <button class="btn btn-outline-secondary" type="button">Button</button> -->


                
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