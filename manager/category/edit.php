<?php require_once __DIR__.'/../../header-singlepage.php' ?>
<?php require_once __DIR__.'/../manager-nav.php'?>

</nav>

<body class="login-body">

<div class="container">
    <section id="container" class="">

        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
            <?php

            if(!isset($_GET['id'])){
                echo 'صفحه به صورت نادرست فراخوانی شده است';
                return;
            }
            $project_category_id=(int)$_GET['id'];
            $query="select * from project_category where id=$project_category_id";
            $result=run_mysql_query($connection,$query);
            if(empty($result)){
                echo 'کاربری با این مشخصات یافت نشد';
                return;
            }
            $group_project=(isset($result[0]['group_project']))?$result[0]['group_project']:'';

            ?>
            <?php
            $error = array();
            $id='';
            if (isset($_POST['submit_category']) && !empty($_POST['submit_category'])) {
                $group_project =(isset($_POST['group_project']))? $_POST['group_project']:false;
                $id=(isset($_GET['id']))?$_GET['id']:false;

                if (empty($group_project)) {
                    $error[] = 'وارد کردن دسته الزامی می باشد';
                }

                if(empty($error)){
                    $query = "update project_category set group_project='{$group_project}' where id={$id}";
                    $result=mysqli_query($connection,$query);
                    if(mysqli_affected_rows($connection)==0){
                        $error[]='اطلاعات ارسال شده صحیح نمی باشد';
                    }else{
                        header('location: '.$main_website_URL.'manager/'.'list_category.php?edit_project=1&id='.$id);
                    }

                }
            }
            ?>
                        <?php if(!empty($error)): ?>

                            <div  class="error">
                                <?php echo implode('<br>',$error)?>
                            </div>

                        <?php endif;?>
            <form method="post" class="form-signin">

                <h2 class="form-signin-heading">دسته جدید را وارد کنید</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" id="mytitle" name="group_project"  value="">



                    <input  type="submit" name="submit_category" value="ذخیره">



                </div>
            </form>
                    </div>
                </div>
            </section>
        </section>
    </section>
</div>
</body>
</html>





