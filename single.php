<?php
/**
* Template Post Type: post, article
*@package barrel
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
    <!-- Banner starts -->
    <section class="banner banner__single-post banner__standard">
        <div class="container">
            <div class="row align-items-center single-post">
                <div class="col-lg-6">
                    <div class="post-title-wrapper">
                        <div class="btn-group">
                            <?php
                                $categories = get_the_category();
                                $separator = ' ';
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach( $categories as $category ) { ?>
                                        <a href=" <?php echo esc_url( get_category_link( $category->term_id ) ) ?> " class="cat-btn bg-color-blue-one"><?php echo esc_html( $category->name ); ?></a> <?php echo $separator; ?>
                                    <?php }
                                    echo trim( $separator );
                            } ?>

                        </div>

                        <h2 class="m-t-xs-20 m-b-xs-0 axil-post-title hover-line"><?php the_title();?>

                        <?php //print_r(); die; ?>
                        </h2>
                        <div class="post-metas banner-post-metas m-t-xs-30">
                            <ul class="list-inline">
                                <li><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>" class="post-author post-author-with-img"><i class="fa fa-user" aria-hidden="true"></i><?php the_author();?></a></li>
                                <li><i class="dot">.</i> <i class="fa fa-calendar" aria-hidden="true"></i><?php the_date(  );?></li>
                                <li><i class="dot">.</i> <i class="fa fa-clock" aria-hidden="true"></i><?php echo barrel_reading_time();?> read</li>
                            </ul>
                        </div>
                        <!-- End of .post-metas -->
                    </div>
                    <!-- End of .post-title-wrapper -->
                </div>
                <!-- End of .col-lg-6 -->

                <div class="col-lg-6">
                    <img src="<?php echo $backgroundImg[0]; ?>" alt="" class="img-fluid"
                        width="600" height="600">
                </div>
            </div>
            <!-- End of .row -->
    </div>
        <!-- End of .container -->
    </section>
    <!-- End of .banner -->


<!-- post-single-wrapper starts -->
<div class="post-single-wrapper p-t-xs-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <main class="site-main">
                    <article class="post-details">
                        <div class="single-blog-wrapper">
                            <div class="post-details__social-share mt-2">
                                <!-- <ul class="social-share social-share__with-bg social-share__vertical">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul> -->
                                <!-- End of .social-share__no-bg -->
                            </div>
                            <!-- End of .social-share -->
                            <div class="single-content">
                                <?php the_content();?>
                            </div>
                        </div>
                        <!-- End of .single-blog-wrapper -->
                    </article>
                    <!-- End of .post-details -->

                    <div class="post-shares m-t-xs-60">
                        <!-- <div class="title">SHARE:</div>
                        <ul class="social-share social-share__rectangular">
                            <li><a href="#" class="btn bg-color-facebook"><i class="fab fa-facebook-f"></i>1K+</a></li>
                            <li><a href="#" class="btn bg-color-twitter"><i class="fab fa-twitter"></i>1000+</a></li>
                            <li><a href="#" class="btn bg-color-linkedin"><i class="fab fa-linkedin-in"></i>1M+</a> </li>
                        </ul> -->
                    </div>
                    <!-- End of .post-shares -->

                    <hr class="m-t-xs-50 m-b-xs-60">

                    <div class="about-author m-b-xs-60">
                        <div class="media">
                            <div class="media-body">
                                <div class="media-body-title">
                                    <h3><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>"><?php the_author();?></a></h3>
                                </div>
                                <!-- End of .media-body-title -->

                                <div class="media-body-content">
                                    <p><?php the_author_meta('description');?></p>
                                    <!-- <ul class="social-share social-share__with-bg">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul> -->
                                    <!-- End of .social-share__no-bg -->
                                </div>
                                <!-- End of .media-body-content -->
                            </div>
                        </div>
                    </div>
                    <!-- End of .about-author -->



                    <div class="post-navigation-wrapper row  m-b-xs-60">

                    </div>
                    <!-- End of .post-navigation -->



                </main>
                <!-- End of main -->
            </div>
            <!--End of .col-auto  -->

            <div class="col-lg-4">
                <aside class="post-sidebar">
                    <!-- adblock -->
                    <?php get_template_part( 'templates/sidebars/sidebar-upper-add' ); ?>
                    <!-- Latest Posts -->
                    <?php get_template_part( 'templates/sidebars/latest' ); ?>

                    <div class="tag-widget m-b-xs-30">
                        <div class="widget-title">
                            <h3>Tags</h3>
                        </div>

                        <div class="axil-content">
                            <ul class="tag-list-wrapper">
                                <?php
                                    $tags = get_the_tags($post->ID);
                                    if ( $tags ) :
                                        foreach ( $tags as $tag ) : ?>
                                            <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                                        <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- End of .tag-widget -->

                </aside>
                <!-- End of .post-sidebar -->
            </div>
            <!-- End of .col-lg-4 -->
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->


            <section class="related-post p-b-xs-30">
                <div class="container">
                    <!-- End of .section-title -->
                    <div class="grid-wrapper">
                        <div class="row">
                        <?php
                            // retrieve all the tag's ids associated with the current post
                            $tags = wp_get_post_terms($post->ID, 'post_tag', ['fields' => 'ids']);
                            if($tags):
                                $args = [
                                    'post_type' => ['post'],
                                    // do not display the current post
                                    'post_not_in' => get_the_ID(),
                                    // Number of posts to display
                                    'posts_per_page' => 4,
                                    // no sticky posts will be here
                                    'ignore_sticky_posts' => 1,
                                    'order' => 'DESC',
                                    // focus on these lines
                                    'tax_query' => [
                                        [
                                            'taxonomy' => 'post_tag',
                                            'terms' => $tags
                                        ]
                                    ]
                                ];

                                $my_query = new WP_Query($args);
                                if($my_query->have_posts()): ?>
                                    <div class="section-title m-b-xs-40">
                                        <h2 class="axil-title">Related</h2>
                                    </div>
                                <?php
                                    while($my_query->have_posts()): $my_query->the_post();
                                    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                                ?>

                                <div class="block col-lg-3 mb-0 col-md-4 p-1">
                                    <div class="content-block m-b-lg-1 m-b-xs-30">
                                        <a href="<?php the_permalink();?>">
                                            <img class="p--img" src="<?php echo $backgroundImg[0]; ?>" alt="abstruct image"
                                                class="img-fluid h-100">
                                            <div class="grad-overlay"></div>
                                        </a>
                                        <div class="media-caption">
                                            <div class="caption-content">
                                                <h5 class="axil-post-title hover-line "><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                                                <div class="caption-meta">
                                                    <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>"><?php the_author();?></a>
                                                </div>
                                            </div>
                                            <!-- End of .content-inner -->
                                        </div>
                                    </div>
                                    <!-- End of .content-block -->
                                </div>
                                <!-- End of .col-lg-3 -->
                            <?php endwhile;
                                endif;
                            endif; ?>

                        </div>
                        <!-- End of .row -->
                    </div>
                    <!-- End of .grid-wrapper -->
                </div>
                <!-- End of .container -->
            </section>
            <!-- End of .related-post -->

        </div>
        <!-- End of .post-single-wrapper -->

    <?php
        endwhile;
        wp_reset_postdata();
    ?>

<!-- Footer -->
<?php get_footer();?>
