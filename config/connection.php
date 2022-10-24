<?php
$connection=@mysqli_connect('localhost','root','','image 360');
if(mysqli_connect_errno()){
    echo 'ارتباط با دیتا بیس دچار خطا شده است'. mysqli_connect_error();
    exit();
}

?>
