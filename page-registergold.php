<?php
/**
 * Template Name: Basic Registration Gold
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

        <div class="axil-about-us section-gap-top p-b-xs-20">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8">
                        <h3>Subscribe</h3>
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