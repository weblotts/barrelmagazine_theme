<?php
/**
 * Template Name: Login Page Template
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
                    <div class="col-lg-12 text-center">
                        <h3>Subscribe</h3>
                        <?php echo do_shortcode('[mepr-login-form]'); ?>
                        <p>Sign up here</p>
                    </div>
                    <!-- End of .col-lg-8 -->

                </div>
                <!-- End of .row -->
            </div>
            <!-- End of .container -->
        </div>
        <!-- End of .random-posts -->



    </div>





    <!-- Footer -->
<?php get_footer();?>
