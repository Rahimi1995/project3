<?php require_once __DIR__.'/../header-singlepage.php' ?>
<?php require_once __DIR__.'/manager-nav.php'?>

</nav>
<?php
if(!isset($_GET,$_GET['id'])){
    header('location'.$main_website_URL.'manager/'.'/list.php?delete_user=0');
    exit();
}
$id=(int)$_GET['id'];
$query="delete from project_image where id={$id}";
$result=mysqli_query($connection,$query);
if (mysqli_affected_rows($connection)>0){
    header('location:'.$main_website_URL.'manager/'.'/list.php?delete_user=1');
    exit();
}else{
    header('location:'.$main_website_URL.'manager/'.'/list.php?delete_user=0');
}

?>
