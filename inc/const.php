<?php
include("conn.php");
include("inc/_company_info.php");

// the site main url
define("SITE_URL", "http://localhost/phpdevelopment/lokeshwarfashionhouse/");

// the uploaded all photos default url
define("PHOTO_UPLOADED_PATH", SITE_URL . 'ecom-admin/uploaded_img/');

// product photos url
define("PRODUCT_INFO_PATH", PHOTO_UPLOADED_PATH . "products/");


define("COPY_RIGHT", '<p class="mt-5 mb-3 text-muted ">© All rights are reserved by - ' . $website_name .'. || 2022 - '. date("Y") .'</p>');

define("PHP_MAILER_PATH", SITE_URL . 'ecom-admin/');