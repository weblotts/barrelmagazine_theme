<?php
/**
 * Template Name: Magazine Tag
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
                            <h2 class="m-b-xs-0 axil-post-title hover-line"><?php single_tag_title(); ?></h2>
                            <p class="mid"><?php echo tag_description(); ?></p>
                            <div class="post-metas">
                                <ul class="list-inline">
                                    <li>
                                        <?php
                                        $cat_id = get_queried_object_id();
                                        $category = get_tag($cat_id);
                                        $count = $category->count;
                                        ?>
                                        Total Posts (<?php echo $count; ?>)
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of .post-title-wrapper -->
                    </div>
                    <!-- End of .col-lg-8 -->
                </div>
            </div>
            <!-- End of .container -->
        </section>
        <!-- End of .banner -->

        <div class="random-posts section-gap cat-tag-author-sect magazine-category">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <main class="axil-content">
                            <div class="row">
                                <?php
                                if ( have_posts() ) : while ( have_posts() ) : the_post();
                                    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                                    ?>

                                    <div class="col-lg-4 col-md-4 issue mb-5">
                                        <div class="content-block m-b-xs-30">
                                            <a href="<?php the_permalink();?>">
                                                <img class="p--img" src="<?php echo $backgroundImg[0]; ?>" alt="abstruct image"
                                                     class="img-fluid h-100">
                                                <div class="grad-overlay"></div>
                                            </a>
                                            <div class="media-caption">
                                                <div class="caption-content">
                                                    <h3 class="axil-post-title hover-line hover-line"><a
                                                            href="<?php the_permalink();?>"><?php the_title();?></a></h3>

                                                </div>
                                                <!-- End of .content-inner -->
                                            </div>
                                        </div>
                                        <!-- End of .content-block -->
                                    </div>
                                    <!-- End of .col-lg-3 -->
                                    <!-- End of .post-block -->


                                <?php
                                endwhile;
                                    wp_reset_postdata(); ?>

                                <?php endif; ?>
                            </div>
                        </main>
                        <!-- End of .axil-content -->
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
