<div class="recent-news-wrapper  section-gap p-t-xs-15 p-t-sm-60 home--sticky">
	<div class="container">
		<div class="row sticky-section landing-page-sticky">
			<div class="col-lg-6">			
			<?php
				/* Get all Sticky Posts */
				$sticky = get_option( 'sticky_posts' );
				/* Sort Sticky Posts, newest at the top */
				rsort( $sticky );
				/* Get top 5 Sticky Posts */
				$sticky = array_slice( $sticky, 0, 1 );
				/* Query Sticky Posts */
				$query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) ); 
				while ($query -> have_posts()) : $query -> the_post();
				// Display the Post Title with Hyperlink
				$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
				?>

				

				<div class="content-block m-b-xs-30  sticky-post">
					<a href="<?= the_permalink ()?>">
						<img src="<?php echo $backgroundImg[0]; ?>" alt="abstruct image" class="img-fluid img--sticky">
						<div class="grad-overlay"></div>
					</a>
					
					<div class="media-caption">
						
						<div class="caption-content">
							<div class="post-cat-group m-b-xs-10">
								<?php 
									$categories = get_the_category($post->ID );
									if(! empty($categories)){ ?> 
										<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"class="post-cat cat-btn bg-color-red-two"><?php echo esc_html( $categories[0]->name );?></a>
								<?php }?>
							</div>
							<h3 class="axil-post-title hover-line hover-line"><a
									href="<?= the_permalink ()?>"><?= the_title();?></a></h3>
						</div>
						<!-- End of .content-inner -->
					</div>
				</div>
				<!-- End of .content-block -->


			<?php endwhile; ?>				
							

						

			</div>
			
			<!-- End of .col-lg-6 -->
			<div class="col-lg-6 p-0">
				
				<div class="axil-recent-news">
					
					<div class="section-title d-flex m-b-xs-30">
						<h2 class="axil-title">Latest</h2>
					</div>
					
					<!-- End of .section-title -->
					<div class="axil-content">

						<?php
							$recent_posts = wp_get_recent_posts(
								[
									'numberposts' => 4, // Number of recent posts thumbnails to display
									'post_status' => 'publish', // Show only the published posts
									'post__not_in' => get_option( 'sticky_posts' )
								]
							);
							foreach( $recent_posts as $post_item ) : ?>


							<!-- Get author ID -->
							<?php 
								$author_id = get_post_field ('post_author', $post_item['ID']);
								$display_name = get_the_author_meta( 'display_name' , $author_id ); 
								$author_url = get_author_posts_url($author_id); 
								// echo get_author_posts_url($author_id)
							?>

							<div class="media post-block m-b-xs-30 mb-0">
								<a href="<?php echo get_permalink($post_item['ID']) ?>" class="align-self-center">
									<?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post_item['ID']), 'full'); ?>
									<img class=" m-r-xs-30" src="<?php echo $backgroundImg[0]; ?>" alt=""></a>
								<div class="media-body">
									<div class="post-cat-group m-b-xs-10">

									
										
									</div>
									<h3 class="axil-post-title hover-line hover-line">
										<a href="<?php echo get_permalink($post_item['ID']) ?>">
										<?php echo $post_item['post_title'] ?>
										</a>
									</h3>
									<div class="post-metas">
										<ul class="list-inline">
											<li><a href="<?php echo esc_url( $author_url ) ?>"><?php echo $display_name;?></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End of .post-block -->
							
						<?php endforeach; ?>

					</div>
					<!-- End of .content -->
				</div>
				<!-- End of .recent-news -->
			</div>
			<!-- End of .col-lg-6 -->

		</div>
		<!-- End of .row -->

	</div>
	<!-- End of .container -->

</div>