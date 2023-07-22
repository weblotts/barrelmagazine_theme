<?php
/**Template Name: Advanced Reader
* Template Post Type: post, article
* @package barrel
*/
global $post;
get_header(); ?>

<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumb">
            <?php barrel_get_breadcrumb(); ?>
        </nav>
    </div>
    <!-- End of .container -->
</div>
<!-- End of .breadcrumb-container -->


<?php
    // Start the loop.
    while ( have_posts() ) : the_post();
    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
?>

<section class="banner banner__single-post banner__standard advanced-reader">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="post-title-wrapper magazine-title">
                    <h2 class="m-t-xs-20 m-b-xs-0 axil-post-title hover-line"><?php the_title();?></h2>
                    <div class="post-metas banner-post-metas m-t-xs-20">
                        <ul class="list-inline">
                            <li><i class="fa fa-calendar" aria-hidden="true"></i><?php the_date();?></li>
                        </ul>
                    </div>
                    <!-- End of .post-metas -->
                    <div class="single-content mt-5">
                        <?php the_content();?>
                    </div>
                </div>
                <!-- End of .post-title-wrapper -->
            </div>
            <!-- End of .col-lg-6 -->

            <div class="col-lg-5 featured-image">
                <img src="<?php echo $backgroundImg[0]; ?>" alt="" class="img-fluid">
            </div>

            <div class="col-lg-3">
                <aside class="post-sidebar">
                    <?php get_template_part( 'templates/sidebars/issues' ); ?>
                </aside>
            </div>
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->        
</section>
<!-- End of .banner -->   
 <?php
    endwhile;
    wp_reset_postdata();
?>



<!-- Footer -->
<?php get_footer();?>
