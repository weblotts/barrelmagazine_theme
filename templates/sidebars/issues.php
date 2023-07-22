<div class="axil-content">
    <?php                             
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'category_name' => 'magazine',
            'post__not_in' => get_option( 'sticky_posts' )
        );
        $arr_posts = new WP_Query( $args );                              
        if ( $arr_posts->have_posts() ) :                              
            while ( $arr_posts->have_posts() ) :
                $arr_posts->the_post();
                $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
            ?>

        <!-- End of .post-block -->
        <div class="media post-block m-b-xs-10">
            <div class="media-body">
                <h3 class="axil-post-title hover-line hover-line">
                    <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                </h3>            
            </div>
        </div>
        <!-- End of .post-block -->

    <?php
        endwhile;
        wp_reset_postdata();
    endif; ?>    
</div>
<!-- End of .content -->