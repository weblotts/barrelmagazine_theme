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
							<h3 class="axil-post-title hover-line hover-line"><a href="<?= the_permalink ()?>"><?= the_title();?></a></h3>
							<div class="post-metas">
								<ul class="list-inline">
									<li><i class="fa fa-clock" aria-hidden="true"></i><?php echo barrel_reading_time();?> read</li>
								</ul>
							</div>
						</div>
						<!-- End of .content-inner -->
					</div>
				</div>
				<!-- End of .content-block -->


			<?php endwhile; ?>




			</div>

			<!-- End of .col-lg-6 -->
			<div class="col-lg-6">

			<a class="twitter-timeline" data-width="400" data-height="600" href="https://twitter.com/BarrelMagazine?ref_src=twsrc%5Etfw">Tweets by BarrelMagazine</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
			<!-- End of .col-lg-6 -->

		</div>
		<!-- End of .row -->

	</div>
	<!-- End of .container -->

</div>
