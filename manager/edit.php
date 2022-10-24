<?php require_once __DIR__.'/../header-singlepage.php' ?>
<?php require_once __DIR__.'/manager-nav.php'?>

</nav>
<section id="container" class="">

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                                                <header class="panel-heading">
                                                    <?php if(!empty($error)): ?>
                                                        <div class="error">
                                                            <?php echo implode('<br>',$error)?>
                                                        </div>
                                                    <?php endif;?>

                                                </header>
                        <div class="panel-heading">Panel Heading</div>
                        <div class="panel-body">
            <?php

            if(!isset($_GET['id'])){
                echo 'صفحه به صورت نادرست فراخوانی شده است';
                return;
            }
            $project_id=(int)$_GET['id'];
            $query="select * from project_image where id=$project_id";
            $result=run_mysql_query($connection,$query);

            if(empty($result)){
                echo 'کاربری با این مشخصات یافت نشد';
                return;
            }
            $title_project=(isset($result[0]['title_project']))?$result[0]['title_project']:'';
            $group_project=(isset($result[0]['group_project']))?$result[0]['group_project']:'';
            $image_project=(isset($result[0]['image_project']))?$result[0]['image_project']:'';
            $file_project=(isset($result[0]['file_project']))?$result[0]['file_project']:'';

            ?>
            <?php
            $error = array();
            if (isset($_POST['edit_submit']) && !empty($_POST['edit_submit'])) {

                $title_project =(isset($_POST['title_project']))? $_POST['title_project']:false;
                $group_project = (isset($_POST['title_project']))?$_POST['group_project']:false;
                $image_project =(isset($_POST['title_project']))? $_POST['image_project']:false;
                $file_project = (isset($_POST['title_project']))?$_POST['file_project']:false;
                $id=(isset($_GET['id']))?$_GET['id']:false;


                if (empty($title_project)) {
                    $error[] = 'عنوان پروژه الزامی می باشد';

                }

                /*if (empty($image_project)) {
                    $error[] = 'قرار دادن تصویر شاخص الزامی می باشد';
                }
                if (empty($file_project)) {
                    $error[] = 'قرار دادن فایل پروژه الزامی می باشد';
                }
                if (empty($id)) {
                    $error[] = 'وروی نامعتبر است';
                }*/
                if(empty($error)){
                    $query = "update project_image set title_project='{$title_project}',group_project='{$group_project}',index_image='{$image_project}',files_project='{$file_project}'";
                    $query.="where id={$id}";
                    $result=mysqli_query($connection,$query);
                    if(mysqli_affected_rows($connection)==0){
                        $error[]='اطلاعات ارسال شده صحیح نمی باشد';
                    }else{

                        header('location: '.$main_website_URL.'manager/'.'list.php?edit_project=1&id='.$id);
                    }

                }
            }

            ?>
            <form role="form" method="post" enctype="multipart/form-data" >

                <?php
                $query="select group_project from project_category";
                $results=run_mysql_query($connection,$query);
                ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="mytitle">نام پروژه</label>
                            <input type="text" placeholder=""  id="mytitle" name="title_project" value="<?php echo $title_project?>"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="myimage">تصویر پروژه</label>
                            <input type="file"  type="file" id="myimage" name="image_project" value="" class="inputfile" multiple>
                        </div>
                        <div class="form-group">
                            <label for="myfile">فایل پروژه</label>
                            <input type="file" id="myfile" name="file_project" value="" class="inputfile" multiple>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">

                            <label for="mygroup">دسته پروژه</label>
                            <div class="custom-select">
                                <!--
                                                                   <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
                                <select class="col-lg-12" id="mygroup" name="selectarea">
                                    <?php foreach ($results as $result):?>
                                        <option value="<?php echo $result['group_project'] ?>"><?php echo $result['group_project'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group1">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="form-group1">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <input  type="submit"  name="edit_submit" value="ویرایش">

<!--                <p>-->
<!--                    <label  for="mygroup">انتخاب دسته:</label>-->
<!--                    <select style="width: 230px" id="mygroup" name="group_project">-->
<!--                        --><?php //foreach ($results as $result):?>
<!--                            <option value="">--><?php //echo $result['group_project'] ?><!--</option>-->
<!--                        --><?php //endforeach;?>
<!--                    </select>-->
<!--                </p>-->
<!--                <p>-->
<!--                    <label style=" color: #000000; height: 40px;width: 300px;background-color: #fbd6b3;position: absolute;display: flex;margin: auto;bottom:auto;border-radius: 10px;top:auto;padding: 4px 10px 0px 10px;display: flex;" for="myimage">تصویر شاخص را انتخاب نمائید</label>-->
<!--                    <input type="file" id="myimage" name="image_project" value="" class="inputfile" multiple>-->
<!--                </p>-->
<!--                --><?php //echo "<br>";
//                echo "<br>";
//                echo "<br>";
//                ?>
<!--                <p>-->
<!--                    <label style=" color: #000000; height: 40px;width: 300px;background-color: #fbd6b3;position: absolute;margin: auto;bottom: auto;top:auto;border-radius: 10px;padding: 4px 10px 0px 10px;display: flex;" for="myfile">فایل پروژه را انتخاب نمائید</label>-->
<!--                    <input  type="file" id="myfile" name="file_project" value="" class="inputfile" multiple>-->
<!---->
<!--                </p>-->
<!--                --><?php //echo "<br>";
//                echo "<br>"; ?>
<!--                <p>-->
<!--                    <input  type="submit"  name="edit_submit" value="ویرایش">-->
<!--                </p>-->
            </form>


        </div>
                    </div>
            </div>
        </section>
    </div>
    </div>
                    </section>
    </section>
</section>

</body>
</html>




