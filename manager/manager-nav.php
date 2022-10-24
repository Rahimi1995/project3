<?php require_once __DIR__.'/../header-singlepage.php'; ?>
<aside>
    <div id="sidebar"  class="nav-collapse ">



    <?php

    $menu_manager_query = 'select * from menu_manager';
    $menu_manager_items =run_mysql_query($connection,$menu_manager_query);

    ?>
    <ul class="sidebar-menu">
        <?php foreach($menu_manager_items as $menu_manager_item):?>
            <?php if(isset($menu_manager_item['parent']) && $menu_manager_item['parent']!=='0')continue;
            $link=menu_link ($menu_manager_item);
            ?>

            <li class="sub-menu" >

                <a  class="'<?php echo is_active($main_website_URL.$link)?>'" href='<?php echo $main_website_URL?><?php echo $link;?>'><?php echo $menu_manager_item['icon'];?><?php echo $menu_manager_item['title'];?></a>


                <?php
                $this_menu_manager_item=$menu_manager_item['id'];
                $menu_manager_item_parent='SELECT * from menu_manager where parent='.$this_menu_manager_item;
                $result_menu_parent=run_mysql_query($connection,$menu_manager_item_parent);
                echo '<ul>';

                foreach ($result_menu_parent as $results_menu_parent){
                    $link=menu_link ($results_menu_parent);
                    echo'<li><a class="'.is_active($main_website_URL.$link).'" href="'.$main_website_URL.$link.'">'.$results_menu_parent['title'].'</a></li>';
                }
                echo '</ul>';
                ?>

            </li>
        <?php endforeach; ?>

    </ul>

    </div>
        </aside>

