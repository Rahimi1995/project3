<?php require_once __DIR__.'/header-singlepage.php'; ?>
<!-- <nav class="manumanager"> -->
    <?php

    $view_menu_query = 'select * from view_menu';
    $view_menu_items =run_mysql_query($connection,$view_menu_query);

    ?>

<aside>
            <div id="sidebar"  class="nav-collapse ">
    <ul class="sidebar-menu" >
        <?php foreach($view_menu_items as $view_menu_item):?>
            <?php if(isset($view_menu_item['parent']) && $view_menu_item['parent']!=='0')continue;
            $link=menu_link ($view_menu_item);
            ?>


            <li class="sub-menu">

                <a class="'<?php echo is_active($main_website_URL.$link)?>'" href='<?php echo $main_website_URL?><?php echo $link;?>'><?php echo $view_menu_item['title'];?></a>


                <?php
                $this_view_menu_item=$view_menu_item['id'];
                $view_menu_item_parent='SELECT * from menu_manager where parent='.$this_view_menu_item;
                $result_view_menu_parent=run_mysql_query($connection,$view_menu_item_parent);
                echo '<ul>';

                foreach ($result_view_menu_parent as $results_view_menu_parent){
                    $link=menu_link ($results_view_menu_parent);
                    echo'<li><a class="'.is_active($main_website_URL.$link).'" href="'.$main_website_URL.$link.'">'.$results_view_menu_parent['title'].'</a></li>';
                }
                echo '</ul>';
                ?>

            </li>
        <?php endforeach; ?>
    </ul>
    </div>
        </aside>