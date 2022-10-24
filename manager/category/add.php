
<?php require_once __DIR__.'/../manager-nav.php'?>

</nav>


            <?php
            $error=array();
            if(isset($_POST['submit_category']) && !empty($_POST['submit_category'])){
                $group_project =(isset($_POST['group_project']))? $_POST['group_project']:false;
                $id=(isset($_GET['id']))?$_GET['id']:false;

                if(empty($group_project)){
                    $error[]='افزودن دسته الزامی می باشد';
                }

                if (empty($error)){

                    $query="insert into project_category";
                    $query.="(`group_project`)VALUES";
                    $query.="('{$group_project}')";
                    $result=mysqli_query($connection,$query);

                    if(mysqli_affected_rows($connection)==0){
                        $error[]='اطلاعات ارسال شده تکراری می باشد';
                    }else{

                        header('location: '.$main_website_URL.'manager/'.'list_category.php?add_project');
                    }



                    /*
                              if(!empty($result)){
                                  echo "این پروژه قبلا ثبت شده است";
                              }else{

                              }
                              echo "<pre dir='ltr'>";
                              var_dump($result);
                              echo"</pre>";*/


                }

            }
            ?>

<body class="login-body">

    <div class="container">
        <section id="container" class="">

            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-signin" method="post">
                                <?php if(!empty($error)): ?>
                                    <div class="error">
                                        <?php echo implode('<br>',$error)?>
                                    </div>
                                <?php endif;?>
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



</div>
</body>
<!--            <form method="post">-->
<!--                --><?php //if(!empty($error)): ?>
<!--                    <div class="error">-->
<!--                        --><?php //echo implode('<br>',$error)?>
<!--                    </div>-->
<!--                --><?php //endif;?>
<!---->
<!--                <p>-->
<!--                    <label for="mytitle">دسته ها:</label>-->
<!--                    <input type="text" id="mytitle" name="group_project"  value="">-->
<!--                </p>-->
<!---->
<!--                <p>-->
<!--                    <input style="width: 200px;margin:10px 70px;top:160px" type="submit" name="submit_category" value="ذخیره">-->
<!--                </p>-->
<!---->
<!--            </form>-->



</body>
</html>







