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
                        <h2 class="m-b-xs-0 axil-post-title hover-line">Search results: "<?php the_search_query(); ?>"
                    </div>
                    <!-- End of .post-title-wrapper -->
                </div>
                <!-- End of .col-lg-8 -->
            </div>
        </div>
        <!-- End of .container -->
    </section>
    <!-- End of .banner -->



    <div class="random-posts section-gap cat-tag-author-sect">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <main class="axil-content">

                        <?php if(have_posts()):
                            while(have_posts()): the_post();
                            $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                            ?>

                                <div class="media post-block post-block__mid m-b-xs-30">
                                    <a href="" class="align-self-center"><img class=" m-r-xs-30" src="<?php echo $backgroundImg[0]; ?>" alt=""></a>
                                    <div class="media-body">
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
                                        <h3 class="axil-post-title hover-line hover-line"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                        <p class="mid"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                        <div class="post-metas">
                                            <ul class="list-inline">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php the_date(  );?></li>
                                                <li><i class="dot">.</i> <i class="fa fa-clock" aria-hidden="true"></i><?php echo barrel_reading_time();?> read</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of .post-block -->

                            <?php endwhile; ?>
                        <?php endif; ?>






                    </main>
                </div>


                <div class="col-lg-4">
                     <aside class="post-sidebar">                        
                        <!-- Latest Posts -->
                        <?php get_template_part( 'templates/sidebars/latest' ); ?>
                    </aside>
                </div>
                <!-- End of .col-lg-4 -->


            </div>
        </div>
    </div>



</div>
		

		
		

		
<!-- Footer -->
<?php get_footer();?>