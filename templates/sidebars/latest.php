<div class="post-widget sidebar-post-widget m-b-xs-40">
    <ul class="nav nav-pills row no-gutters">
        <li class="nav-item col">
            <a class="nav-link active" data-bs-toggle="pill" href="#recent-post">Latest</a>
        </li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="recent-post">
            <div class="axil-content">
            <?php
                // get id for Magazine to be ignored
                $catid = get_cat_ID('magazine');
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3, // Number of recent posts thumbnails to display
                    'post_status' => 'publish', // Show only the published posts
                    'cat' => '-'.$catid //ignore the magazine id
                ));
                foreach( $recent_posts as $post_item ) : ?>

                <div class="media post-block post-block__small latest-tab">
                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post_item['ID']), 'full'); ?>
                    <a href="post-format-standard.html" class="align-self-center"><img
                            class=" m-r-xs-30" src="<?php echo $backgroundImg[0]; ?>"
                            alt="media image"></a>
                    <div class="media-body">
                        <h4 class="axil-post-title hover-line hover-line"><a
                                href="<?php echo get_permalink($post_item['ID']); ?>"><?php echo $post_item['post_title'] ?></a></h4>

                    </div>
                </div>
                <!-- End of .post-block -->

            <?php endforeach; ?>
            </div>
            <!-- End of .content -->
        </div>
        <!-- End of .tab-pane -->

    </div>
    <!-- End of .tab-content -->
</div>
<!-- End of .sidebar-post-widget -->
