<?php require_once __DIR__.'/config/session_start.php'?>
<?php require_once __DIR__.'/config/connection.php'?>
<?php require_once __DIR__.'/functions.php' ?>
<?php $Login_error=check_user_login($connection,$main_website_URL);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>دپارتمان املاک و مستغلات بندرعباس|تور مجازی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="<?php echo $main_website_url; ?>/assets/js/javascript.js" ></script>
    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/css/bootstrap-rtl.min.css" >
    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/css/Responsive.css">
    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/css/jquery.sidr.bare.css">
    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/carousel/css/bootstrap.min.css">

    <script src="assets/carousel/js/ajax.min.js"></script>
    <script src="assets/carousel/js/bootstrap.min.js"></script>
    <script src="assets/js/javascript.js"></script>
</head>
<body>

