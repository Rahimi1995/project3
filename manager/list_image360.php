<?php require_once __DIR__.'/header.php'?>
<?php //require_once __DIR__ . '/view_nav.php'; ?>
</nav>
<?php

?>
<!--<div class="container-fluid">-->
    <div class="gallery_image">
        <div class="row">


        <?php
        $image360=scandir("uploads");
        $linkimage=scandir("uncompress");
        $zipfile=scandir("fuploads");
        ?>
    <?php
    $quary="SELECT index_image , title_project, files_project  from project_image";
    $results=run_mysql_query($connection,$quary);?>
   <?php foreach ($results as $result ): ?>

        <?php
           for($i=2 ;$i<count($image360) && $i<count($linkimage);$i++){
               if($image360[$i]==$result['index_image'] ){
             ?>
            <div class="col-sm-12 col-md-6 col-lg-4">

                   <a
                           href="<?php echo $main_website_URL;?>/uncompress/<?php echo pathinfo($result['files_project'], PATHINFO_FILENAME) ?>">

                       <div class="card" >

                           <img  src="<?php echo $main_website_URL;?>/uploads/<?php echo  $image360[$i];?>" alt="Card image cap">
                       <div class="card-body">
                           <div class="des"><?php echo $result['title_project']?></div><?php  ?>
                       </div>

                   </div>
                   </a>
            </div>

                                 <?php
               }
           }
           ?>


        <?php endforeach;?>


            </div>
    </div>

    <div class="footerarea">
        <img src="<?php echo $main_website_URL;?>/assets/image/Imagefooter.png" alt="">
    </div>
<!--</div>-->




