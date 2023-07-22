<?php
/*
Template Name: Magazine Reader
Template Post Type: post, article
*/
global $post;
get_header();
// Start the loop.
while ( have_posts() ) : the_post();
    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
    ?>
   <!-- post-single-wrapper starts -->
    <div class="post-single-wrapper p-t-xs-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <main class="site-main">
                        <article class="post-details">
                            <div class="single-blog-wrapper">
                                
                                <!-- End of .social-share -->
                                <div class="single-content">
                                    <?php the_content();?>

                                </div>
                            </div>
                            <!-- End of .single-blog-wrapper -->
                        </article>
                        <!-- End of .post-details -->


                        <!-- End of .post-shares -->

                        <hr class="m-t-xs-50 m-b-xs-60">

                    </main>
                    <!-- End of main -->
                </div>
                <!--End of .col-auto  -->
            </div>
            <!-- End of .row -->
        </div>
        <!-- End of .container -->
    </div>
    <!-- End of .post-single-wrapper -->

<?php
endwhile;
wp_reset_postdata();
?>

<!-- Footer -->
<?php get_footer();?>
