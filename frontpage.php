<?php
    /**
     * Template Name: Home Template
     * @package barrel
     * 
     */
get_header(); ?>

	
<!-- Main contents
================================================ -->
<div class="main-content">

    <!-- slider Area -->
    <?php get_template_part( 'templates/homepage/slider-section' ); ?>
	

    <!-- Projects Area -->
	<?php get_template_part( 'templates/homepage/projects-section' ); ?>

    <!-- Projects Area -->
	<?php get_template_part( 'templates/homepage/featured-section' ); ?>

    <!-- Sticky Area -->
	<?php get_template_part( 'templates/homepage/sticky-area' ); ?>

    <!-- News Area -->
	<?php get_template_part( 'templates/homepage/news-section' ); ?>


	
</div>
		
		
		
		

		
<!-- Footer -->
<?php get_footer();?>