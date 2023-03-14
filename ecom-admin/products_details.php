<?php
include "inc/conn.php";
$active_class = 'products';
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

?>

    <div class="container full-width title_bar mt-4">
        <?php

        include "inc/_title_bar.php";



        ?>

        <?php

        $search_class = 'products';

        include "inc/_search.php";
        include("inc/functions.php");

        include("inc/_theme.php");


        $get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['id']), ENT_QUOTES);
        // echo $get_id;


        $sql = "SELECT * FROM `products` WHERE `product_id` = '$get_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_desc = $row['product_desc'];
                    $product_img = $row['product_img'];
                    $product_price = $row['product_price'];
                    $product_status = $row['product_status'];
                    $product_featured_status = $row['make_as_featured'];
                    $product_added_datetime = $row['product_added_datetime'];
                }

                if ($product_img == '') {
                    $product_img = 'nature-sea.jpg';
                }


                if (isset($_POST['save_changes'])) {
                    // $id = $row['id'];
                    $product_name = htmlspecialchars(mysqli_real_escape_string($conn,  $_POST['product_name']), ENT_QUOTES);
                    $product_description = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['product_description']), ENT_QUOTES);
                    $product_price = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['product_price']), ENT_QUOTES);



                    //  echo 'the verify is ' . $verify = password_verify($password, $hash);

                    $product_photo = $_FILES['product_photo'];
                    // $admin_phone_no = $_POST['admin_phone_no'];
                    // $admin_role = $_POST['admin_role'];

                    // this is the logo img file name
                    $img_name = $_FILES['product_photo']['name'];

                    // this is the logo img name with the upload file which is main name to upload or move the file
                    $upload_img = "uploaded_img/products/" . $img_name;

                    $img_tmp = $_FILES['product_photo']['tmp_name'];

                    $product_status = mysqli_real_escape_string($conn, $_POST['product_status']);
                    // $make_as_featured = $_POST['make_as_featured'];


                    $sql = "SELECT * FROM `products`";


                    // if the database is empty then insert the data into the table

                    $result = mysqli_query($conn, $sql);

                    // check if the password and cpassword are same
                    if ($result) {
                        // if there any data contains on the db
                        if (mysqli_num_rows($result) > 0) {

                            // check if there already the submitted email contains on db


                            if (filter_has_var(INPUT_POST, 'make_as_featured')) {
                                if ($img_name == '') {



                                    $sql_wp_up = "UPDATE `products` SET `product_name` = '$product_name', `product_desc` = '$product_description', `product_price` = '$product_price', `product_status` = '$product_status', `make_as_featured` = 'featured_product' WHERE `products`.`product_id` = '$product_id'";
                                    // $result = mysqli_query($conn, $sql);
                                    $result_wp_up = mysqli_query($conn, $sql_wp_up);
                                    if ($result_wp_up) {
                                        update_success_message();
                                    } else {
                                        update_error_message();
                                    }
                                }

                                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                                elseif ($img_name !== '') {
                                    // if the database is not empty then update the table with the new data
                                    $sql_p_up = "UPDATE `products` SET `product_name` = '$product_name', `product_desc` = '$product_description',`product_img` = '$img_name', `product_price` = '$product_price', `product_status` = '$product_status', `make_as_featured` = 'featured_product' WHERE `products`.`product_id` = '$product_id'";
                                    $result_u_wp = mysqli_query($conn, $sql_p_up);

                                    // $result = mysqli_query($conn, $sql);
                                    if ($result_u_wp) {
                                        if (move_uploaded_file($img_tmp, $upload_img)) {
                                            update_success_message();
                                        } else {
                                            // update_error_message();
                                        }
                                    }
                                } else {
                                    saved_error_message();
                                }
                            } else {

                                if ($img_name == '') {



                                    $sql_wp_up = "UPDATE `products` SET `product_name` = '$product_name', `product_desc` = '$product_description', `product_price` = '$product_price', `product_status` = '$product_status',`make_as_featured` = 'not_featured_product' WHERE `products`.`product_id` = '$product_id'";
                                    // $result = mysqli_query($conn, $sql);
                                    $result_wp_up = mysqli_query($conn, $sql_wp_up);
                                    if ($result_wp_up) {
                                        update_success_message();
                                    } else {
                                        update_error_message();
                                    }
                                }

                                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                                elseif ($img_name !== '') {
                                    // if the database is not empty then update the table with the new data
                                    $sql_p_up = "UPDATE `products` SET `product_name` = '$product_name', `product_desc` = '$product_description',`product_img` = '$img_name', `product_price` = '$product_price', `product_status` = '$product_status',`make_as_featured` = 'not_featured_product' WHERE `products`.`product_id` = '$product_id'";
                                    $result_u_wp = mysqli_query($conn, $sql_p_up);

                                    // $result = mysqli_query($conn, $sql);
                                    if ($result_u_wp) {
                                        if (move_uploaded_file($img_tmp, $upload_img)) {
                                            update_success_message();
                                        } else {
                                            // update_error_message();
                                        }
                                    }
                                } else {
                                    saved_error_message();
                                }
                            }
                        }
                        if (mysqli_num_rows($result) == 0) {
                            if (filter_has_var(INPUT_POST, 'make_as_featured')) {



                                //  else if the email is unique and does not contains on the db then add the admin user to the system and the db
                                // echo 'inserted and saved the changes';

                                // if the admin photo is blank then add without the img name and img 
                                if ($product_photo == '') {



                                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_price`, `product_status`,`make_as_featured`, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$product_price', '$product_status', 'featured_product',current_timestamp());";
                                    // $result = mysqli_query($conn, $sql);
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        saved_success_message();
                                    } else {
                                        saved_error_message();
                                    }
                                }

                                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                                elseif ($product_photo !== '') {
                                    // if the database is not empty then update the table with the new data
                                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_img`, `product_price`, `product_status`,`make_as_featured`, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$img_name', '$product_price', '$product_status','featured_product', current_timestamp());";
                                    $result = mysqli_query($conn, $sql);

                                    // $result = mysqli_query($conn, $sql);

                                    if ($result) {
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
                        } else {
                            if (mysqli_num_rows($result) == 0) {


                                //  else if the email is unique and does not contains on the db then add the admin user to the system and the db
                                // echo 'inserted and saved the changes';

                                // if the admin photo is blank then add without the img name and img 
                                if ($product_photo == '') {



                                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_price`, `product_status`, `make_as_featured, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$product_price', '$product_status', 'not_featured_products',current_timestamp());";
                                    // $result = mysqli_query($conn, $sql);
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        saved_success_message();
                                    } else {
                                        saved_error_message();
                                    }
                                }

                                // else if the admin photo is not blank that means it contains the img then add to the db with img name and the img details

                                elseif ($product_photo !== '') {
                                    // if the database is not empty then update the table with the new data
                                    $sql = "INSERT INTO `products` (`product_name`, `product_desc`, `product_img`, `product_price`, `product_status`, `product_added_datetime`) VALUES ('$product_name', '$product_description', '$img_name', '$product_price', '$product_status', current_timestamp());";
                                    $result = mysqli_query($conn, $sql);

                                    // $result = mysqli_query($conn, $sql);

                                    if ($result) {
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
                        // if it contains then show the alert


                        // if the admin photo is blank then add without the img name and img 

                    }
                }

                if (isset($_POST['product_delete'])) {
                    $product_delete_sql = "DELETE FROM `products` WHERE `products`.`product_id` = '$product_id'";
                    $product_delete_result = mysqli_query($conn, $product_delete_sql);

                    if ($product_delete_result) {
                        // header("location:products.php");
                        delete_success_message();
                        echo '
                <script>
                    window.location.href = "products.php";
                </script>';
                    } else {
                        delete_error_message();
                    }
                }




                echo '
        
<div class="row">
<div class="col-6">
<a href = "products.php" class="mb-4"><button class = "btn btn-primary mb-4">Go to products</button></a><br>
    Product Id: ' . $product_id . ' <br>
    Product Name : ' . $product_name . ' <br>
    Product Description: ' . $product_desc . ' <br>
    Product Price: ' . $product_price . ' <br>
    
   <div class = ""> Product Status: '; ?><span class="<?php
                                                        if ($product_status == "In-stock") {
                                                            echo 'text-success';
                                                        }
                                                        if ($product_status == "Out-stock") {
                                                            echo 'text-danger';
                                                        }


                                                        ?>"><?php echo '' . $product_status . ' </span> </div> <br>
    
   <div class = "fs-5" id="featuredProductStatusId"> Product Featured Status: '; ?><span class="<?php
                                                        if ($product_featured_status == "featured_product") {
                                                            echo 'bg-dark text-warning';
                                                        }
                                                        if ($product_featured_status == "not_featured_product") {
                                                            echo 'bg-dark text-danger';
                                                        }


                                                        ?>"><?php
                                                        if ($product_featured_status == "featured_product") {
                                                            echo 'Featured Product';
                                                        }
                                                        if ($product_featured_status == "not_featured_product") {
                                                            echo 'Not Featured Product';
                                                        }
                                                        echo '' .
                                                        
                                                         ' </span> </div> <br>
    Product Added Datetime: ' . $product_added_datetime . ' <br>

</div>
<div class="col-6">
    <img src="uploaded_img/products/' . $product_img . '" width="80%!important" height="250px!important" alt="" srcset="">
</div>

</div>
        
        ';



                                                            ?>

                    <div class="row">
                        <div class="col-2">
                            <button class="btn btn-dark mb-4" onclick="productEdit()">Edit</button><br>

                        </div>


                        <div class="col-10">
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                <button class="btn btn-danger mb-4" name="product_delete">Delete</button><br>

                            </form>
                            <?php



                            ?>
                        </div>
                    </div>

                    <div id="productEdit" class="no-disp">


                        <div class="container full-width">

                        </div>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Product Name</label>
                                <div class="input-group">
                                    <input type="hidden" value="">
                                    <span class="input-group-text" id="basic-addon3">@</span>
                                    <input type="text" class="form-control" placeholder="Product Name" id="basic-url" aria-describedby="basic-addon3" name="product_name" value="<?php echo $product_name; ?>" required>
                                </div>
                                <div class="form-text">Example help text goes outside the input group.</div>

                            </div>



                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Product Description</label>
                                <div class="input-group">
                                    <span class="input-group-text">@</span>
                                    <textarea class="form-control" aria-label="With textarea" placeholder="Product Description" name="product_description"><?php echo $product_desc; ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3">

                                <div class="checkbox mb-3">
                                    <label>
                                        <input type="checkbox" onchange="setFeaturedProduct()"<?php
                                        if($product_featured_status == 'featured_product'){
                                           echo 'checked';
                                            
                                        }
                                        if($product_featured_status == 'not_featured_product'){
                                            echo '';
                                        }
                                        
                                        ?> value="<?php echo $product_featured_status ?>" id="featuredInput" name="make_as_featured"> <span style="background: none !important;" id="featuredSpan">Add as featured product </span>
                                    </label>
                                </div>
                                <div class="form-text">Note: If you want to add as featured product then check the box. If the box is not checked then the product is not added as featured product and will be not added as featured product.  </div>

                            </div>

                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Product Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">@</span>
                                    <input type="number" min="0" max="" value="<?php echo $product_price ?>" class="form-control" placeholder="Product Price" name="product_price" id="basic-url" aria-describedby="basic-addon3" required>
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
                                        <!-- <option selected value="In-stock">Choose...</option> -->

                                        <option <?php

                                                if ($product_status == 'In-stock') {
                                                    echo 'selected';
                                                }


                                                ?> value="In-stock">In-stock</option>
                                        <option <?php

                                                if ($product_status == 'Out-stock') {
                                                    echo 'selected';
                                                }


                                                ?> value="Out-stock">Out-stock</option>
                                        <!-- <option value="3">Three</option> -->
                                    </select>
                                    <!-- <button class="btn btn-outline-secondary" type="button">Button</button> -->



                                </div>
                                <div class="form-text">Example help text goes outside the input group.</div>
                            </div>










                            <button type="submit" class="btn btn-primary float-end mt-4 mb-5" name="save_changes"> Save changes</button><br><br>
                            <label for="" class="mb-5"></label>
                        </form>
                    </div>



            <?php

            } else {
                echo '<div class = "custom-default-box-bg-color pt-4 mt-4 fs-4" style="height:200px !important;">
      Sorry ! the searching result with "' . $search . '" are not found ..
      
      </div>';
            }
        }





            ?>



    </div>








<?php
    include "inc/_footer.php";
}

?>