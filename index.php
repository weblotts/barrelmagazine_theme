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
    <?php get_template_part('templates/homepage/news-section'); ?>
    <?php get_template_part('templates/homepage/featured-section'); ?>

</div>

<!-- Footer -->
<?php get_footer(); ?>