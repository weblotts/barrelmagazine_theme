<section class="related-post p-b-xs-30 home--projects">
    <div class="container">
        <div class="section-title m-b-xs-40">
            <h2 class="axil-title">Flagship Projects</h2>
            <!-- <a href="#" class="btn-link ml-auto">More Projects</a> -->
        </div>
        <!-- End of .section-title -->
        <div class="grid-wrapper flagship-section">
            <div class="row ">

                <?php                             
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'category_name' => 'flagship-projects',
                        'post__not_in' => get_option( 'sticky_posts' )
                    );
                    $arr_posts = new WP_Query( $args );                              
                    if ( $arr_posts->have_posts() ) :                              
                        while ( $arr_posts->have_posts() ) :
                            $arr_posts->the_post();
                            $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                        ?>
                
                            <div class="block col-lg-4 mb-0 col-md-4 p-1">
                                <div class="content-block m-b-lg-1 m-b-xs-30">
                                    <a href="<?php the_permalink();?>">
                                        <img class="p--img" src="<?php echo $backgroundImg[0]; ?>" alt="abstruct image"
                                            class="img-fluid h-100">
                                        <div class="grad-overlay"></div>
                                    </a>
                                    <div class="media-caption">
                                        <div class="caption-content">
                                            <h3 class="axil-post-title hover-line "><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
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
                
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>


            </div>
            <!-- End of .row -->
        </div>
        <!-- End of .grid-wrapper -->
    </div>
    <!-- End of .container -->
</section>
<!-- End of .related-post -->