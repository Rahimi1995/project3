<?php //require_once __DIR__.'/header.php'?>
<?php //require_once __DIR__.'/list_image360.php'?>
<!--    <script src="--><?php //echo $main_website_URL;?><!--/assets/js/jquery-3.5.1.min.js"></script>-->
<!--    <script src="--><?php //echo $main_website_URL;?><!--/assets/js/bootstrap.min.js"></script>-->
<!--    <script src="--><?php //echo $main_website_URL;?><!--/assets/js/jquery.sidr.min.js"></script>-->
<!--    <script src="--><?php //echo $main_website_URL;?><!--/assets/js/fontawesome.min.js"></script>-->
<!--    <script>-->
<!--        $(document).ready(function() {-->
<!--            $('#mobilemenu').sidr();-->
<!--        });-->
<!--    </script>-->
<!--</body>-->
<!--</html>-->
<?php //require_once __DIR__.'/config/connection-close.php'?>

<?php require_once __DIR__.'/header.php'?>
<div class="headproject" href="">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="logoarea">
                    <img src="assets/image/nadirlogo.png"/>
                </div>
            </div>
            <div class="col-6">
                <div class="iconarea">
                    <a href="<?php echo $main_website_URL;?>/loginform.php"> <i class="fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--============================= carousel-->
<div class="container-fluid">
    <div id="myCarousel"  class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators" style="right:5%;">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="assets/image/image4.jpg" alt="Los Angeles" style="width:100%;">
                <div class="carousel-caption" >
                    <h3 class="animate__animated animate__bounceInRight" style="font-size:50px;font-weight: bold;" >Los Angeles</h3>
                    <p class="animate__animated animate__bounceInRight" style="font-size:33px;">LA is always so much fun!</p>
                </div>
            </div>

            <div class="item">
                <img src="assets/image/image2(2).jpg" alt="Chicago" style="width:100%;">
                <div class="carousel-caption" >
                    <h3 class="animate__animated animate__bounceInRight" style="font-size:50px;font-weight: bold;">Chicago</h3>
                    <p class="animate__animated animate__bounceInRight" style="font-size:33px;">Thank you, Chicago!</p>
                </div>
            </div>

            <div class="item">
                <img src="assets/image/image1(3).jpg" alt="New York" style="width:100%;">
                <div class="carousel-caption" >
                    <h3 class="animate__animated animate__bounceInRight" style="font-size:50px;font-weight: bold;">New York</h3>
                    <p class="animate__animated animate__bounceInRight" style="font-size:33px;">We love the Big Apple!</p>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span ><i class="fa-solid fa-chevron-left"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span ><i class="fa-solid fa-chevron-right"></i></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!--============================= end carousel-->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="searchbar">

                <form class="searchbox" method="post">
                    <input type="text" id="searchtitle" name="search_title" placeholder=""/>

                    <select name="category_project" id="category_project">
                        <?php
                        $query="select group_project from project_category";
                        $results=run_mysql_query($connection,$query);
                        ?>
                        <?php print_r($results)?>
                        <?php foreach ($results as $result):?>
                            <option value="<?php echo $result['group_project'] ?>"><?php echo $result['group_project'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <button name="submit_search" id="submit_search" onclick=""  value="submit_search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>

                </form>


            </div>
        </div>
    </div>
</div>



<!-- ==================================== -->

<div class="container">
    <div class="textarea">
        <h3>پروژه ها</h3>
        <p>پروژه های 360 درجه در اینجا قرار دارند</p>

    </div>
</div>



<!--==================== card area-->
<div class="cardarea"  >
    <div class="container">
        <div class="row">


            <?php
            $error=array();
            $image360=scandir("uploads");
            $linkimage=scandir("uncompress");
            $zipfile=scandir("fuploads");
            ?>
            <?php

            $Search_title= '';
            $Search_group= '';
            global $connection;
            if (isset($_POST['submit_search']) && !empty($_POST['submit_search'])) {

                $Search_title =$_POST['search_title'] ;
                $Search_group =$_POST['category_project'] ;

                $query ="SELECT * from project_image where (title_project LIKE '%$Search_title%') and (group_project like '%$Search_group%')";
                $results = run_mysql_query($connection, $query);
                if (count($results) < 1){
                    $error[]="پروژه ای با این مشخصات یافت نشد";
                }
            }else{
            $quary='SELECT index_image,title_project, files_project  from project_image';
            $results=run_mysql_query($connection,$quary);
            }?>
            <?php foreach ($results as $result ): ?>

                <?php
                for($i=2 ;$i<count($image360) && $i<count($linkimage);$i++){
                    if($image360[$i]==$result['index_image'] ){
                        ?>


            <div class="col-lg-4 col-md-6 col-12">
                <div class="card" >
                    <a href="<?php echo $main_website_URL;?>/manager/uncompress/<?php echo pathinfo($result['files_project'], PATHINFO_FILENAME) ?>">
                        <img class="card-img-top" src="<?php echo $main_website_URL;?>/uploads/<?php echo  $image360[$i];?>" alt="Card image cap">
                        <p class="card-text"><?php echo $result['title_project']?></p>
                        <div class="sharecard">
                            <button onclick="displayDate()"><i class="fa fa-share-alt"></i>
                                <ul class="shareitem" id="shareitem">
                                    <li><a href="#" class="whatsapp"><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <li><a href="#" class="telegram"><i class="fa-brands fa-telegram"></i></a></li>
                                    <li><a href="#" class="google"><i class="fa-brands fa-google"></i></a></li>
                                    <li><button id="closebtn" class="closebtn" onclick="displayNone()"><i  class="fa-solid fa-xmark"></i></button></li>
                                </ul>
                            </button>

                        </div>

                    </a>
                </div>
            </div>

        </div>

                        <?php
                    }
                }
                ?>


            <?php endforeach;?>






        </div>
    <?php if(!empty($error)): ?>
        <div class="error" style="font-family: IRANSans;">
            <?php echo implode("<br>",$error)?>
        </div>
    <?php endif;?>
    </div>
</div>

<!--=========================== end card-->


<div class="container">
    <div class="countimg">
        <a href="#"><i class="fa-solid fa-caret-right"></i></a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-caret-left"></i></a>

    </div>
</div>


<div class="footerprojec">

    <p>فوتر در این ناحیه قرار دارد</p>

</div>

</div>



</body>
</html>
<?php require_once __DIR__.'/config/connection-close.php'?>
