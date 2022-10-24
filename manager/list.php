<?php require_once __DIR__.'/../header-singlepage.php' ;?>
<?php require_once __DIR__.'/../manager/manager-nav.php';?>
</nav>


<!--<div class="main_content">-->

    <?php
    $query='select * from project_image';
    $results=run_mysql_query($connection,$query);
    ?>

    <?php  if(isset($_GET['edit_project'])){
        ?><p style="width: 300px;color: #ee7200;height: auto;text-align: center;padding: 10px;margin:10px auto;border-radius: 10px;display: block;" class="warning">
        <?php echo 'ویرایش کاربر با موفقیت انجام شد';?>
        </p>
        <?php
    }

    ?>


    <?php  if(isset($_GET['delete_user']) && $_GET['delete_user']==0){
        ?><p class="warning">
        <?php echo 'اطلاعات ارسالی ناقص می باشد';?>
        </p>
        <?php
    }

    ?>
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        جدول ثبت پروژه ها
                    </header>
                    <table class="table table-striped table-advance table-hover">
                        <thead>

                        <tr>
                            <th >ID</th>
                            <th >عنوان پروژه</th>
                            <th >دسته پروژه</th>
                            <th>تصویر</th>
                            <th >فایل پروژه</th>
                            <th >لینک</th>
                            <th >عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($results as $result): ?>
                        <tr>
                            <td><?php echo ($result['id'])? $result['id']:'' ?></td>
                            <td><?php echo ($result['title_project'])? $result['title_project']:'' ?></td>
                            <td><?php echo ($result['group_project'])? $result['group_project']:'' ?></td>
                            <td><?php echo ($result['index_image'])? $result['index_image']:'' ?></td>
                            <td><?php echo ($result['files_project'])? $result['files_project']:'' ?></td>
                            <?php $file_link="$main_website_URL".'/uncompress'.DIRECTORY_SEPARATOR.$result['files_project']
                            ;?>
                            <td><a href="uncompress/<?php echo pathinfo($result['files_project'], PATHINFO_FILENAME) ?>">>لینک پروژه</a></td>
                            <td>
                                <a href="<?php echo $main_website_URL.'/manager/delete.php?id='.(($result['id'])? $result['id']:'')?>"onclick="return confirm('آیا می خواهید حذف کنید؟')" class="remove"><i class="icon-pencil"></i></a>&nbsp;
                                <a href="<?php echo $main_website_URL.'/manager/edit.php?id='.(($result['id'])? $result['id']:'')?>" class="edit"><i class="icon-trash "></i></a>
                            </td>
<!--                            <td>-->
<!--                                <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>-->
<!--                                <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>-->
<!--                            </td>-->
                        </tr>
                        <?php endforeach; ?>
                        <?php if(count($results)<1):?>
                            <tr>
                                <td colspan="8">هیچ اطلاعاتی یافت نشد</td>
                            </tr>
                        <?php  endif;?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--    <table>-->
<!---->
<!--        --><?php
//        foreach ($results as $result): ?>
<!--            <tr>-->
<!--                <td>--><?php //echo ($result['id'])? $result['id']:'' ?><!--</td>-->
<!--                <td>--><?php //echo ($result['title_project'])? $result['title_project']:'' ?><!--</td>-->
<!--                <td>--><?php //echo ($result['group_project'])? $result['group_project']:'' ?><!--</td>-->
<!--                <td>--><?php //echo ($result['index_image'])? $result['index_image']:'' ?><!--</td>-->
<!--                <td>--><?php //echo ($result['files_project'])? $result['files_project']:'' ?><!--</td>-->
<!--                --><?php //$file_link="$main_website_URL".'/uncompress'.DIRECTORY_SEPARATOR.$result['files_project']
//                ;?>
<!--                <td><a href="uncompress/--><?php //echo pathinfo($result['files_project'], PATHINFO_FILENAME) ?><!--">>لینک پروژه</a></td>-->
<!--                <td>-->
<!--                    <a href="--><?php //echo $main_website_URL.'/manager/delete.php?id='.(($result['id'])? $result['id']:'')?><!--"onclick="return confirm('آیا می خواهید حذف کنید؟')" class="remove">حذف</a>&nbsp;-->
<!--                    <a href="--><?php //echo $main_website_URL.'/manager/edit.php?id='.(($result['id'])? $result['id']:'')?><!--" class="edit">ویرایش</a>-->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--        --><?php //endforeach; ?>
<!--        --><?php //if(count($results)<1):?>
<!--            <tr>-->
<!--                <td colspan="8">هیچ اطلاعاتی یافت نشد</td>-->
<!--            </tr>-->
<!--        --><?php // endif;?>
<!--    </table>-->
</div>

    </body>
    </html>




