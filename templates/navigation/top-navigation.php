<div class="header-top bg-grey-dark-one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md">
                <ul class="header-top-nav list-inline justify-content-center justify-content-md-start">
                    <li class="current-date"><?php echo date('D M, Y ');  ?></li>
                    <?php
                        if(!empty($special_menus) && is_array($special_menus)){?>
                            <?php foreach ($special_menus as $menu_item ){
                                $child_menu_items = $menu_class->get_child_menu_items($special_menus, $menu_item->ID); ?>

                                <li class="current-date"><a href="<?php echo esc_url( $menu_item->url); ?>"><?php echo esc_html($menu_item->title);?></a></li>

                            <?php } ?>
                        <?php }?>
                    
                </ul>

                <!-- End of .header-top-nav -->
            </div>
            <div class="col-md-auto">
                <ul class="ml-auto social-share header-top__social-share">
                    <li><a href="https://twitter.com/BarrelMagazine"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/barrelmagazineug/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->
</div>