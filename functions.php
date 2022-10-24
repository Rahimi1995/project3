<?php
$main_website_URL='http://localhost/image3601/';

function run_mysql_query ($connection,$query){
    $query_result=mysqli_query($connection,$query);
    return mysqli_fetch_all($query_result,MYSQLI_ASSOC);
}
function menu_link ($menu_item){
    $link='';
    if(isset($menu_item['link']) && !empty($menu_item['link'])){
        $link=$menu_item['link'];
    }else{
        if(isset($menu_item['id_content']) && !empty($menu_item['id_content'])){
          $link='?id_content'.$menu_item['id_content'];
        }
    }
    return $link;

}
function  is_active($link){
    $request_url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    if($request_url==$link){
        return 'active';
    }
    else{
        return '';
    }

}
function edit_project()
{
    $error = array();
    if (isset($_POST['edit_submit']) && !empty($_POST['edit_submit'])) {
        $title_project = $_POST['title_project'];
        $group_project = $_POST['group_project'];
        $image_project = $_POST['image_project'];
        $file_project = $_POST['file_project'];
    }
    if (empty($title_project)) {
        $error[] = 'عنوان پروژه الزامی می باشد';
    }

    if (empty($image_project)) {
        $error[] = 'قرار دادن تصویر شاخص الزامی می باشد';
    }
    if (empty($file_project)) {
        $error[] = 'قرار دادن فایل پروژه الزامی می باشد';
    }
}

function searchbox(){
    ?>
    <form action="" method="post">
    <input type="text" name="title_project" value="" placeholder="عنوان پروژه ">
    <input type="text" name="group_project" value="" placeholder="دسته پروژه">
    <input type="submit" name="search" value="جستجو">
</form>
<?php
    global $connection;
if(isset($_POST['submit_search'])){
    $Searchtitle=$_POST['searchtitle'];
    $Searchgroup=$_POST['category_project'];
    $query="SELECT * from project_image where title_project LIKE '%$Searchtitle%' and group_project like '%$Searchgroup%'";
    $result=mysqli_query($connection,$query);
    while ($row=mysqli_fetch_array($result)){
        echo $row['title_project'];"<br>";
        echo $row['group_project'];
    }
}
}
function is_user_logged_in(){
    if (isset($_SESSION) && isset($_SESSION['user_login'])){
        return true;
    }
    return false;
}
function redirect_to_login_page($main_website_url){
    if (!is_user_logged_in()){
        header('Location: '.$main_website_url.'loginform.php');
        exit();
    }

}

function check_user_login($connection,$main_website_URL){

    $error = array();
    if (is_user_logged_in() && is_active($main_website_URL.'loginform.php')=='active'){
        header('Location: '.$main_website_URL.'manager/addproject.php');
        exit();
    }
    if (isset($_POST['submitlogin']) && !empty($_POST['submitlogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($_POST['username'])) {
            $error[] = 'نام کاربری الزامی می باشد';
        }
        if (empty($_POST['password'])) {
            $error[] = 'پسورد الزامی می باشد';
        }
        if (empty($error)) {
            $query = "select id,username";
            $query .= " from user";
            $query .= " where username='{$username}' and password='{$password}'";
            $result = run_mysql_query($connection, $query);

            if (!empty($result)) {
                $_SESSION['user_login'] = [
                    'id' => $result[0]['id'],
                    'username' => $result[0]['username'],
//                    'name' => $result[0]['name']
                ];
                header('Location: ' . $main_website_URL .'manager/'.'addproject.php');
                exit();
            } else {
                $error[] = 'کاربری با این اطلاعات یافت نشد';
            }
        }
    }
    return $error;

}
