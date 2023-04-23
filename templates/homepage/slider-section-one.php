<div class="axil-content owl-carousel axil-post-carousel" data-owl-items="1"
    data-owl-loop="true" data-owl-autoplay="true" data-owl-dots="false" data-owl-nav="false"
    data-owl-margin="0" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">

    <?php                             
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'tag' => 'top',
        );
        $arr_posts = new WP_Query( $args );                              
        if ( $arr_posts->have_posts() ) :
            
            while ( $arr_posts->have_posts() ) :
                $arr_posts->the_post();
                $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
            ?>

                <div class="item">                    
                    <!-- Banner starts -->
                    <div class="banner banner__single-post banner__single-type-two forslider" style="background-image: url(<?php echo $backgroundImg[0]; ?>); ">
                        <div class="grad-overlay"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="post-date perfect-square bg-primary-color">
                                        <?php echo get_the_date('M');?> <span><?php echo get_the_date('d');?></span>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="post-title-wrapper">
                                        <div class="btn-group">
                                            <!-- <a href="#" class="cat-btn bg-color-blue-one">TECHNOLOGY</a> -->
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
                                        <h2 class="m-b-xs-0 axil-title hover-line color-white m-t-xs-10"><a href="<?php the_permalink() ?>"> <?php the_title();?></a></h2>
                                        </div>
                                    <!-- End of .post-title-wrapper -->
                                </div>
                                <!-- End of .col-lg-8 -->
                                
                            </div>
                        </div>
                        <!-- End of .container -->
                    </div>
                    <!-- End of .banner -->
                </div>
                <!-- End of .item -->

    <?php
        endwhile;
        wp_reset_postdata();
    endif; ?>

</div>