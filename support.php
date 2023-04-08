<?php
include 'inc/_error_reporting.php';
$active_class = 'get support';
// $website_slogan = 'feel the shopping';
include "inc/_company_info.php";

include("inc/_header.php");
include("inc/conn.php");
include("inc/const.php");
include("inc/functions.php");

?>
<style>

</style>
<?php
include("inc/_navbar.php");
// <?php
if (isset($_SESSION['cus_username'])) {
    // echo '<div class="text-light mt-2">'.$_SESSION["cus_username"].'</div>' ;
}

// include("inc/_heading_header.php")



?>
<main>
    <div class="container page mt-4 mb-4 pb-5 pt-4 rounded">
        <div class="container">
        <div class="container text-center ">
            <h1><?php echo $website_name ?></h1>
        </div>
        <h3>Support</h3>
        <div>If you have any question or if you want to get help from our support then please contract us with this email - <a href="mailto:<?php echo $website_contract_email ?>"><?php echo $website_contract_email ?></a></div>

        <div class=" text-center">
<?php echo COPY_RIGHT ?>
  </div>
        </div>
 

    </div>
</main>
<!-- the main content ends here -->

<?php
include("inc/_footer.php");

?>