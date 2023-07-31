<?php
    $args = [
        'post_per_page' => 3,
        'post_type' => 'post',
        'tag' => 'top',
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false
    ];
    $post_query = new \WP_Query($args);
?>
<div class="axil-content owl-carousel axil-post-carousel" data-owl-items="1" data-owl-loop="true" data-owl-autoplay="true" data-owl-dots="false" data-owl-nav="false" data-owl-margin="0" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
    <?php
    if ($post_query->have_posts()) {
        while ($post_query->have_posts()) :
            $post_query->the_post();
            $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id(), '');
            ?>
            <div class="item">
                <!-- Banner starts -->
                <div class="banner banner__single-post banner__single-type-two forslider" style="background-image: url(<?php echo $backgroundImg[0]; ?>); ">
                    <div class="grad-overlay"></div>
                    <div class="container">
                        <div class="row">


                            <div class="col-lg-8">
                                <div class="post-title-wrapper">
                                    <div class="btn-group">
                                        <!-- <a href="#" class="cat-btn bg-color-blue-one">TECHNOLOGY</a> -->
                                        <?php
                                        $categories = get_the_category();
                                        $separator = ' ';
                                        $output = '';
                                        if (!empty($categories)) {
                                            foreach ($categories as $category) { ?>
                                                <a href=" <?php echo esc_url(get_category_link($category->term_id)) ?> " class="cat-btn bg-color-red-two"><?php echo esc_html($category->name); ?></a> <?php echo $separator; ?>
                                        <?php }
                                            echo trim($separator);
                                        } ?>
                                    </div>
                                    <h2 class="m-b-xs-0 axil-title hover-line color-white m-t-xs-10"><a href="<?php the_permalink() ?>"> <?php the_title(); ?></a></h2>
                                    <div class="post-metas banner-post-metas m-t-xs-30">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i><?php the_date(); ?></li>
                                            <li><i class="dot">.</i> <i class="fa fa-clock" aria-hidden="true"></i><?php echo barrel_reading_time(); ?> read</li>
                                        </ul>
                                    </div>
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
    <?php endwhile;
    } ?>
</div>