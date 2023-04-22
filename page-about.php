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
	
    <!-- Breadcrumbs  -->
    <div class="breadcrumb-wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <?php barrel_get_breadcrumb(); ?>
            </nav>
        </div>
        <!-- End of .container -->
    </div>
    <!-- End of .breadcrumb-container -->


    <!-- Banner starts -->
    <section class="banner banner__default bg-grey-light-three">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="post-title-wrapper">
                        <h2 class="m-b-xs-0 axil-post-title hover-line "><?php the_title(); ?></h2>
                    </div>
                    <!-- End of .post-title-wrapper -->
                </div>
                <!-- End of .col-lg-8 -->
            </div>
        </div>
        <!-- End of .container -->
    </section>
    <!-- End of .banner -->

    


    <div class="axil-about-us section-gap-top p-b-xs-20">
        <div class="container">
                <figure class="m-b-xs-40">
					<!-- <img src="assets/images/about-us.jpg" alt="about us" class="img-fluid mx-auto"> -->
                    <?php the_post_thumbnail('full',  ['class' => 'img-fluid mx-auto ']); ?>
				</figure>
            <div class="row">
                <div class="col-lg-8">
                    <?php while(have_posts()): the_post(); ?>
                        <?php the_content();?>
                    <?php endwhile; ?>
                </div>
                <!-- End of .col-lg-8 -->

                <div class="col-lg-4">
                    <aside class="post-sidebar">
                        
                        <!-- Latest Posts -->
                        <?php get_template_part( 'templates/sidebars/latest' ); ?>

                    </aside>
                    <!-- End of .post-sidebar -->
                </div>
                <!-- End of .col-lg-4 -->
            </div>
            <!-- End of .row -->
        </div>
        <!-- End of .container -->
    </div>
    <!-- End of .random-posts -->


	
</div>
		
		
		

		
<!-- Footer -->
<?php get_footer();?>