<?php require_once __DIR__.'/../header-singlepage.php' ;?>
<?php require_once __DIR__.'/../manager/manager-nav.php';?>
</nav>
<?php
$query='select * from project_category';
$results=run_mysql_query($connection,$query);
?>
<?php  if(isset($_GET['edit_project'])){
    ?>
    <div class="row">
    <p style="width: 300px;color: #ee7200;height: auto;text-align: center;padding: 10px;margin:10px auto;border-radius: 10px;display: block;" class="warning">
    <?php echo 'ویرایش دسته با موفقیت انجام شد';?>
    </p>
    </div>
    <?php
}

?>
<?php  if(isset($_GET['add_project'])){
    ?>
    <div class="row">
    <p style="width: 300px;color: #ee7200;height: auto;text-align: center;padding: 10px;margin: 10px auto;border-radius: 10px;display: block;" class="warning">
    <?php echo 'افزودن دسته با موفقیت انجام شد';?>
    </p>
    </div>
    <?php
}
?>


<!--<div class="main_content">-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-12">
                <div class="add">
                    <a href="<?php echo $main_website_URL.'/manager/category/add.php'?>" class="add">افزودن دسته</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
<!--                    <header class="panel-heading no-border">-->
<!--                        جدول دسته ها-->
<!--                    </header>-->
                    <div class="panel-heading">  جدول دسته ها</div>
                    <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 40px">ID</th>
                            <th style="width: 300px">دسته ها</th>
                            <th style="width: 100px">عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($results as $result): ?>

                            <tr>

                                <td><?php echo ($result['id'])? $result['id']:'' ?></td>
                                <td><?php echo ($result['group_project'])? $result['group_project']:'' ?></td>
                                <td>
                                    <a href="<?php echo $main_website_URL.'/manager/category/delete.php?id='.(($result['id'])? $result['id']:'')?>"onclick="return confirm('آیا می خواهید حذف کنید؟')" class="remove"><i class="icon-pencil"></i></a>&nbsp;
                                    <a href="<?php echo $main_website_URL.'/manager/category/edit.php?id='.(($result['id'])? $result['id']:'')?>" class="edit"><i class="icon-trash "></i></a>


                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <?php if(count($results)<1):?>
                        <tr>
                            <td colspan="4">هیچ اطلاعاتی یافت نشد</td>
                        </tr>
                    <?php  endif;?>
                    </div>
                </section>
<!--    <table>-->
<!--        <tr>-->
<!--            <th style="width: 40px">ID</th>-->
<!--            <th style="width: 300px">دسته ها</th>-->
<!--            <th style="width: 100px">عملیات</th>-->
<!---->
<!--        </tr>-->
<!--        --><?php
//        foreach ($results as $result): ?>
<!---->
<!--            <tr>-->
<!---->
<!--                <td>--><?php //echo ($result['id'])? $result['id']:'' ?><!--</td>-->
<!--                <td>--><?php //echo ($result['group_project'])? $result['group_project']:'' ?><!--</td>-->
<!--                <td>-->
<!--                    <a href="--><?php //echo $main_website_URL.'/manager/category/delete.php?id='.(($result['id'])? $result['id']:'')?><!--"onclick="return confirm('آیا می خواهید حذف کنید؟')" class="remove">حذف</a>&nbsp;-->
<!--                    <a href="--><?php //echo $main_website_URL.'/manager/category/edit.php?id='.(($result['id'])? $result['id']:'')?><!--" class="edit">ویرایش</a>-->
<!---->
<!---->
<!--                </td>-->
<!--            </tr>-->
<!---->
<!--        --><?php //endforeach; ?>
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--            <div class="add">-->
<!--        <a href="--><?php //echo $main_website_URL.'/manager/category/add.php'?><!--" class="add">افزودن دسته</a>-->
<!--        </div>-->
<!--            </div>-->
<!--        </div>-->
<!--            --><?php //if(count($results)<1):?>
<!--            <tr>-->
<!--                <td colspan="4">هیچ اطلاعاتی یافت نشد</td>-->
<!--            </tr>-->
<!--        --><?php // endif;?>
<!---->
<!--    </table>-->


</div>




