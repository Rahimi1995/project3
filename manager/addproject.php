
<?php require_once __DIR__.'/manager-nav.php'?>
<?php redirect_to_login_page($main_website_URL) ?>


</nav>

<section id="container" class="">

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
<!--                        <header class="panel-heading">-->
<!--                            Basic Forms-->
<!---->
<!--                        </header>-->
                        <div class="panel-heading">Panel Heading</div>
                        <div class="panel-body">
                            <span id="success_message"></span>
                            <form role="form" id="sample_form" method="post" action="addproject.php" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="mytitle">نام پروژه</label>
                                            <input type="text" placeholder=""  id="mytitle" name="title_project" value=""  class="form-control">
                                            <span id="mytitle-error"></span>


                                        </div>
                                        <?php
                                        $query="select group_project from project_category";
                                        $results=run_mysql_query($connection,$query);
                                        ?>
                                        <div class="form-group">
                                            <label for="myimage">تصویر پروژه</label>
                                            <input type="file"  type="file" id="myimage" name="image_project" value="" class="inputfile" multiple>
                                            <span id="myimage-error"></span>
                                             </div>
                                        <span id="last_name_error" class="text-danger"></span>
                                        <div class="form-group">
                                            <label for="myfile">فایل پروژه</label>
                                            <input type="file" id="myfile" name="file_project" value="" class="inputfile" multiple>
                                            <span id="myfile-error"></span>

                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label for="mygroup">دسته پروژه</label>
                                            <div class="custom-select">
                                            <!--
                                                                               <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
                                            <select class="col-lg-12" id="mygroup" name="group_project"
                                                <?php foreach ($results as $result):?>
                                                    <option value="<?php echo $result['group_project'] ?>"><?php echo $result['group_project'] ?></option>
                                                <?php endforeach;?>
                                            </select>
                                                <span id="mygroup-error"></span>
                                        </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="mygroup">دسته پروژه</label>
                                            <div class="custom-select">
                                                <!--
                                                                                   <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
                                                <select class="col-lg-12" id="mygroup" name="group_project"
                                                <?php foreach ($results as $result):?>
                                                    <option value="<?php echo $result['group_project'] ?>"><?php echo $result['group_project'] ?></option>
                                                <?php endforeach;?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="progress">
                                                <div class="progress-bar" id="progressimage" role="progressbar"  aria-valuemin="0" aria-valuemax="100">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="progress">
                                            <div class="progress-bar" id="progressfile"  role="progressbar"  aria-valuemin="0" aria-valuemax="100"></div>

                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <input  type="submit" di=""  name="submit" value="ذخیره">

                            </form>
<script>

</script>
                        </div>
                    </section>
                </div>
                <div
            </div>
        </section>
    </section>

</section>

<?php
$error=array();
if (isset($_POST['submit'])) {

    $title_project=($_POST['title_project']);
    $group_project=($_POST['group_project']);
    $id=(isset($_GET['id']))?$_GET['id']:false;
    $target_dir = $_SERVER['DOCUMENT_ROOT'].'/image3601'.'/uploads/';
    $ftarget_dir = $_SERVER['DOCUMENT_ROOT'].'/image3601'.'/fuploads/';
    $target_file = $target_dir . basename($_FILES["image_project"]["name"]);
    $ftarget_file = $ftarget_dir . basename($_FILES["file_project"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($ftarget_file, PATHINFO_EXTENSION));
    if(empty($title_project)) {
        $error[] = 'عنوان پروژه الزامی می باشد';
    }
//    گرفتن فایل عکس
    if(isset($_FILES["image_project"]) && !empty($_FILES["image_project"]["tmp_name"]) ) {
        $check = getimagesize($_FILES["image_project"]["tmp_name"]);
        if ($check == false) {
            $error[] = "فایل انتخابی تصویر نمی باشد";
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            $error[] = "این تصویر یک بار بارگذاری شده است";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $error[] = "متاسفانه، تصویر آپلود نشده است";
        }else {
            if (move_uploaded_file($_FILES["image_project"]["tmp_name"], $target_file)) {
//                $message[] = "تصویر " . basename($_FILES["image_project"]["name"]) . " بارگذاری شد";
            } else {
                $error[] = "اشکالی در بارگذاری فایل به وجود آمده است";
            }
        }
        }else{
        $error[]="انتخاب تصویر شاخص الزامی می باشد";
    }
//        گرفتن فایل پروژه و اکسترکت کردن فایل
        if(isset($_FILES['file_project']) && !empty($_FILES["file_project"]["tmp_name"])){
            if (file_exists($ftarget_file)) {
                $error[] = "فایل  قبلا بارگذاری شده است";
                $uploadOk = 0;
            }
            if ($FileType != "zip") {
                $error[] = "تنها فایل zip   می توانید بارگذاری کنید";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $error[] = "متاسفانه فایل آپلود نشده است";
            } else {

                if (move_uploaded_file($_FILES["file_project"]["tmp_name"], $ftarget_file)) {

                    $message[] = "فایل  " . basename($_FILES["file_project"]["name"]) . " بارگذاری شده است";
                    $zip = new ZipArchive;
                    $res = $zip->open("$ftarget_file");
                    if ($res === TRUE) {
                        $zip->extractTo("uncompress");
                        $zip->close();
                    } else {
                        echo "fail !";
                    }

                } else {
                    $error[] = "متاسفانه،اشکالی در بارگذاری فایل رخ داده است";
                }
            }
        } else{
            $error[]="انتخاب فایل پروژه الزامی می باشد";
        }
        if(empty($error)) {
            $iname = $_FILES["image_project"]["name"];
            $pname = $_FILES["file_project"]["name"];
            $query = "insert into project_image";
            $query .= "(`title_project`,`group_project`,`index_image`,`files_project`)VALUES";
            $query .= "('{$title_project}','{$group_project}','{$iname}','{$pname}')";
            $result = mysqli_query($connection, $query);
            if (mysqli_affected_rows($connection) == 0) {
                $error[] = 'اطلاعات ارسال شده تکراري مي باشد';
            } else {
//               header('location: '.$main_website_URL.'list.php?add_project=1&id='.$id);

                $dlink = scandir("uncompress");
                for($a=2 ;$a<count($dlink);$a++){
                    if($dlink[$a].'.zip'==$pname){
                        ?>
                            <p>پروژه شما با موفقیت ذخیره شد</p>
                        <?php echo "<br>";?>
                            <div class="row">
                         <a href="uncompress/<?php echo $dlink[$a] ?>">لینک پروژه</a>
                            </div>
                        <?php
                    }
                }
            }
        }

}

?>
    <?php if(!empty($error)): ?>
        <div class="error">
            <?php echo implode('<br>',$error)?>
        </div>
    <?php endif;?>
    <?php if(!empty($message)): ?>
        <div class="error">
            <?php echo implode('<br>',$message)?>
        </div>
    <?php endif;?>

<!--======================================-->
<script>
    $(document).ready(function() {

        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            var count_error = 0;
            if($('#mytitle-error').val() == '')
            {
                $('#mytitle-error').text('نام کاربری را وارد کنید');
                count_error++;
                console.log('hi');
                alert($('#mytitle-error').val())

            }
            else
            {
                $('#mytitle-error').text('');

            }

            if($('#myimage-error').val() == '')
            {
                $('#myimage-error').text('انتخاب تصویر پروژه الزامی می باشد');
                count_error++;
            }
            else
            {
                $('#myimage-error').text('');
            }

            if($('#myfile-error').val() == '')
            {
                $('#myfile-error').text('انتخاب فایل پروژه الزامی می باشد');
                count_error++;
            }
            else
            {
                $('#myfile-error').text('');
            }


            if($('#mygroup-error').val() == '')
            {
                $('#mygroup-error').text('گروه پروژه را انتخاب کنید');
                count_error++;
            }
            else
            {
                $('#mygroup-error').text('');
            }

            if(count_error == 0){
                var formData = new FormData();
                console.log(formData);
                $.ajax({
                    xhr : function() {
                        var xhr = new window.XMLHttpRequest();
                        console.log(xhr);
                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {

                                console.log('Bytes Loaded: ' + e.loaded);
                                console.log('Total Size: ' + e.total);
                                console.log('Percentage Uploaded: ' + (e.loaded / e.total))
                                var percent = Math.round((e.loaded / e.total) * 100);
                                console.log(percent);
                                console.log(lengthComputable);
                                $('#progressimage').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                                $('#progressfile').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');

                            }

                        });

                        return xhr;
                    },
                    type : 'POST',
                    url:'/manager/addproject.php',
                    data : formData,
                    processData : false,
                    contentType : false,
                    success : function() {

                    }
                });
            }


        });

    });
</script>
</div>

</body>
</html>
