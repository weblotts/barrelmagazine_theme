<section class="section-gap section-gap-top__with-text top-stories bg-grey-light-three mb-4">
    <div class="container">
        <div class="section-title m-b-xs-40">
            <h2 class="axil-title">News</h2>
            <a href="#" class="btn-link">More News</a>
        </div>

        <div class="row">
        

        <?php 
            $post_count = 0;
                $args = array(
                'post_type' => 'post',
                'category_name' => 'news',
                'posts_per_page' => 3
                );
                $news_posts = new WP_Query( $args );             
                if(have_posts()):
                $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
            ?>
            
            <?php  foreach ($news_posts as  $post) :?>
                
                    <?php $post_count++;  echo $post_count; ?>
                
            <?php endforeach; ?>
        <?php endif; ?>


        </div>
    </div>
</section>