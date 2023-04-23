<!-- End of .top-stories -->
<section class="section-gap section-gap-top__with-text trending-stories home--trending flagship-section">
    <div class="container">
        <div class="section-title m-b-xs-40">
            <h2 class="axil-title">Featured Stories</h2>
            <!-- <a href="#" class="btn-link">ALL Featured STORIES</a> -->
        </div>
        <div class="row ">

            <?php          
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 4,
                    'category_name' => 'featured',
                    'post__not_in' => get_option( 'sticky_posts' )
                );
                $arr_posts = new WP_Query( $args );                              
                if ( $arr_posts->have_posts() ) :
                    
                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();
                        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                    ?>

                <div class="col-lg-6 p-0">
                    <div class="media post-block m-b-xs-30">
                        <a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
                                src="<?php echo $backgroundImg[0]; ?>" alt=""></a>
                        <div class="media-body ">
                            <h3 class="axil-post-title hover-line hover-line"><a
                                    href="<?= the_permalink( );?>"><?= the_title()?></a></h3>
                            <div class="post-metas">
                                <ul class="list-inline">
                                    <li><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>"><?php the_author( 'ID' );?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End of .post-block -->
                </div>
                <!-- End of .col-lg-6 -->
                

            <?php
                endwhile;
                wp_reset_postdata();
            endif; ?>

        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->
</section>
<!-- End of .trending-stories -->