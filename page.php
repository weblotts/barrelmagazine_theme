<?php
    /**
     * Main Template file
     * @package barrel
     * 
     */
get_header(); ?>

	
<!-- Main contents
================================================ -->
<div class="main-content">
    <div class="axil-about-us section-gap-top p-b-xs-20">
        <div class="container">
            <div class="row">
                <div class="col-l-8">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>    
                        <?php the_content();?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
		
		
		
		

		
<!-- Footer -->
<?php get_footer();?>