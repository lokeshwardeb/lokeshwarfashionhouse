<?php 

session_start();

include "_company_info.php";



?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="<?php echo $aurthors_name ?>">
  <meta name="generator" content="Hugo 0.88.1">
  <!-- <meta property="og:site_name" content="WordPress.org" /> -->
  <title><?php echo $website_name ?> -- <?php echo ucwords($active_class);?> || <?php echo ucwords($website_slogan);?></title>

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/"> -->

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/utilities.css">
  <link rel="stylesheet" href="css/style.css">
 

  <link rel="shortcut icon" href="<?php echo 'ecom-admin/uploaded_img/'.$website_logo ?>" type="image/x-icon">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/sidebars.css" rel="stylesheet">
</head>