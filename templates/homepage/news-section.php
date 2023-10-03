<section class="top-stories bg-grey-light-three mb-4">
    <div class="container">
        <div class="section-title ">
            <h3 class="axil-title">Featured</h3>
            <!-- <a href="#" class="btn-link">More News</a> -->
        </div>

        <div class="gridder p-0 news-section">
        <?php       
            $post_count = 0;                     
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'featured',
                'posts_per_page' => 3,
                'post__not_in' => get_option( 'sticky_posts' )  
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
                                <a href="<?php the_permalink();?>" class="d-block">
                                    <img class="g--img" src="<?php echo $backgroundImg[0]; ?>" alt="gallery images"
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
                                                    <li><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>" class="post-author"><?php the_author();?></a></li>
                                                    <li><i class="dot">.</i><?= the_date(); ?></li>
                                                    <li><i class="dot">.</i> <i class="fa fa-clock" aria-hidden="true"></i><?php echo barrel_reading_time();?> read</li>
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
							<a href="<?php the_permalink();?>" class="d-block">
								<img class="s--img" src="<?php echo $backgroundImg[0]; ?>" alt="gallery images"
									class="w-100">
								<div class="grad-overlay"></div>
							</a>
							<div class="media post-block position-absolute">
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">
                                        
									</div>
									<div class="axil-media-bottom">
										<h3 class="axil-post-title hover-line hover-line"><a
												href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
										<div class="post-metas">
											<ul class="list-inline">
                                                <li><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) )  ?>" class="post-author"><?php the_author();?></a></li>
                                                <li><i class="dot">.</i> <i class="fa fa-clock" aria-hidden="true"></i><?php echo barrel_reading_time();?> read</li>
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