<section class="section-gap section-gap-top__with-text top-stories bg-grey-light-three mb-4">
    <div class="container">
        <div class="section-title m-b-xs-40">
            <h2 class="axil-title">News</h2>
            <a href="#" class="btn-link">More News</a>
        </div>

        <div class="gridder p-0 ">
        <?php       
            $post_count = 0;                     
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'news',
                'posts_per_page' => 3   
            );
            $arr_posts = new WP_Query( $args );                              
            if ( $arr_posts->have_posts() ) :
                
                while ( $arr_posts->have_posts() ) :
                    $arr_posts->the_post();
                    $post_count ++;
                    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
                ?>

                    <?php if($post_count <= 1) : ?>

                        <div class="big">                           
                        
                            <div class="axil-img-container m-b-xs-30">
                                <a href="post-format-standard.html" class="d-block">
                                    <img src="<?php echo $backgroundImg[0]; ?>" alt="gallery images"
                                        class="w-100">
                                    <div class="grad-overlay"></div>
                                </a>
                                <div class="media post-block position-absolute">
                                    <div class="media-body media-body__big">
                                        <div class="post-cat-group m-b-xs-10">
                                        
                                            

                                        </div>
                                        <div class="axil-media-bottom">
                                            <h3 class="axil-post-title hover-line hover-line"><a
                                                    href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                            <div class="post-metas">
                                                <ul class="list-inline">
                                                    <li>By <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>" class="post-author"><?php the_author();?></a></li>
                                                    <li><i class="dot">.</i><?= the_date(); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of .post-block -->
                            </div>
                            <!-- End of .axil-img-container -->

                        </div>

                    <?php else: ?>

                    <div class="small_<?= $post_count; ?>">

                        <div class="axil-img-container m-b-xs-30">
							<a href="post-format-standard.html" class="d-block">
								<img src="<?php echo $backgroundImg[0]; ?>" alt="gallery images"
									class="w-100">
								<div class="grad-overlay"></div>
							</a>
							<div class="media post-block position-absolute">
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
                                        
									</div>
									<div class="axil-media-bottom">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="">U<?php the_title(); ?></a></h3>
										<div class="post-metas">
											<ul class="list-inline">
                                                <li>By <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>" class="post-author"><?php the_author();?></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
						</div>

                    </div>    

           <?php
                endif; endwhile;
                wp_reset_postdata();
            endif; ?>

        </div>
    </div>
</section>