<?php
/**
 * Template Name: Category Custom Page
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
                            <h2 class="m-b-xs-0 axil-post-title hover-line"><?php single_cat_title(); ?></h2>
                            <p class="mid"><?php echo category_description(); ?></p>
                            <div class="post-metas">
                                <ul class="list-inline">
                                    <li>
                                        <?php
                                        $category_name = single_cat_title();
                                        $cat_id = get_queried_object_id();
                                        $category = get_category($cat_id);
                                        $count = $category->category_count;
                                        ?>
                                        Issues Out (<?php echo $count; ?>)
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

                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'category_name' => 'magazine',
                                );
                                $arr_posts = new WP_Query( $args );
                                if ( $arr_posts->have_posts() ) :

                                    while ( $arr_posts->have_posts() ) :
                                        $arr_posts->the_post();
                                        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                                        ?>

                                        <div class="col-lg-4 col-md-4 issue mb-5">
                                            <div class="content-block m-b-xs-30">
                                                <a href="<?php the_permalink();?>">
                                                    <img class="p--img" src="<?php echo $backgroundImg[0]; ?>" alt="<?php the_title();?>"
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

                                    <?php
                                    endwhile;
                                    wp_reset_postdata(); ?>

                                <?php else: ?>
                                    <div>
                                        <p>Coming soon!</p>
                                    </div>

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
