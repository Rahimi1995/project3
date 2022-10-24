<?php require_once __DIR__ . '/header.php'; ?>
<?php require_once __DIR__ . '/view_nav.php'; ?>
</nav>
<div class="main-content">

    <?php
    $Search_title= '';
    $Search_group= '';
    global $connection;
    if (isset($_POST['search']) && !empty($_POST['search'])) {
        $Search_title =$_POST['Search_title'] ;
        $Search_group =$_POST['Search_group'] ;
    }
    $query =  "SELECT * from project_image where (title_project LIKE '%$Search_title%') and (group_project like '%$Search_group%')";
    $results = run_mysql_query($connection, $query);

    ?>
    <div class="row">
<div class="searcharea">
    <div class="col-12">

    <form  action="" method="post">
        <input type="text" name="Search_title" value="" placeholder="عنوان پروژه ">
        <input type="text" name="Search_group" value="" placeholder="دسته پروژه">
        <input type="submit" name="search" value="جستجو">
    </form>
</div>
</div>
    </div>

    <table>
        <tr>
            <th style="width: 40px">ID</th>
            <th style="width: 130px">عنوان پروژه</th>
            <th style="width: 130px">دسته پروژه</th>
            <th style="width: 200px">تصویر</th>
            <th style="width: 200px">فایل پروژه</th>

        </tr>
        <?php
        foreach ($results as $result): ?>

            <tr>

                <td><?php echo ($result['id']) ? $result['id'] : '' ?></td>
                <td><?php echo ($result['title_project']) ? $result['title_project'] : '' ?></td>
                <td><?php echo ($result['group_project']) ? $result['group_project'] : '' ?></td>
                <td><?php echo ($result['index_image']) ? $result['index_image'] : '' ?></td>
                <td><?php echo ($result['files_project']) ? $result['files_project'] : '' ?>
                </td>
            </tr>

        <?php endforeach; ?>
        <?php if (count($results) < 1): ?>
            <tr>
                <td colspan="5">هیچ اطلاعاتی یافت نشد</td>
            </tr>
        <?php endif; ?>
    </table>
    <!--   --><?php
    /*    $file=$result['files_project'];
       $path=pathinfo(realpath($file),PATHINFO_DIRNAME);
        $zip=new ZipArchive();
        $res=$zip->open($file);
        if ($res === TRUE){
            $zip->extractTo($path);
            $zip->close();
            echo "WOOT! $file ectractedto $path";
        }else{
            echo "Don! I couldn't open $file";
        }



        */


    ?>
</div>



