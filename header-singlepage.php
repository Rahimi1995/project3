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


    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/css/bootstrap-rtl.min.css" >
    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $main_website_URL;?>/assets/font-awesome/css/font-awesome.css">
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $main_website_url; ?>/assets/js/javascript.js" async></script>


</head>
<body>