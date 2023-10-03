<!-- End of .top-stories -->
<section class="section-gap trending-stories home--trending ">
    <div class="container">
        <div class="section-title">
            <h2 class="axil-title">Projects</h2>
            <!-- <a href="#" class="btn-link">ALL Featured STORIES</a> -->
        </div>
        <div class="row ">

            <?php          
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 4,
                    'category_name' => 'flagship-projects',
                    'post__not_in' => get_option( 'sticky_posts' )
                );
                $arr_posts = new WP_Query( $args );                              
                if ( $arr_posts->have_posts() ) :
                    
                    while ( $arr_posts->have_posts() ) :
                        $arr_posts->the_post();
                        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                    ?>

                <div class="col-lg-6">
                    <div class="media post-block m-b-xs-30">
                        <a href="<?= the_permalink( );?>" class="align-self-center"><img class=" m-r-xs-30"
                                src="<?php echo $backgroundImg[0]; ?>" alt=""></a>
                        <div class="media-body ">
                            <h3 class="axil-post-title hover-line hover-line"><a
                                    href="<?= the_permalink( );?>"><?= the_title()?></a></h3>
                            <div class="post-metas">
                                <ul class="list-inline">
                                    <li><i class="fa fa-clock" aria-hidden="true"></i><?php echo barrel_reading_time();?> read</li>
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