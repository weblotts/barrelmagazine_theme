<?php

/**
 * Main Template file
 * @package barrel
 *
 */
get_header(); ?>

<!-- Main contents
    ================================================ 
-->

<div class="main-content">

    <!-- slider Area -->
    <?php get_template_part('templates/homepage/slider'); ?>
    <?php get_template_part('templates/homepage/sticky-area'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="add-block-widget m-b-xs-40 text-center pt-5 pb-5">
                    <a href="https://www.adipec.com/conferences/download-strategic-conference-programmes/?utm_source=media-partner&utm_medium=website&utm_campaign=barrel-magazine&utm_content=adipec2023"><img src="<?php echo BARREL_DIR_URI .'/assets/images/600x140.jpg'; ?>" alt="sidebar add" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('templates/homepage/news-section'); ?>
    <?php get_template_part('templates/homepage/featured-section'); ?>

</div>

<!-- Footer -->
<?php get_footer(); ?>