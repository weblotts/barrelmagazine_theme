		<!-- footer starts -->
		<footer class="page-footer bg-grey-dark-key">
			<div class="container">
				<div class="footer-top">
					<div class="row">						
						<div class="col-lg-12">
							<div class="footer-widget">
								<h2 class="footer-widget-title">
									Tags
								</h2>
								<ul class="list-inline">
									<?php
										$tags = get_tags('');
										if ( $tags ) :
											foreach ( $tags as $tag ) : ?>
												<li class="text-white "><a class="hover-line" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a><?php echo '.  '.' ' ?></li>
											<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- End of .row -->
				</div>
				<!-- End of .footer-top -->
				<div class="footer-mid">
					<div class="row align-items-center">
						<div class="col-md">
							<div class="footer-logo-container">
								<a href="/">
									<img src="<?php echo BARREL_DIR_URI .'/assets/images/Barrel-White-Logo.png'; ?>" alt="footer logo" class="footer-logo" height="250" width="200">
								</a>
							</div>
							<!-- End of .brand-logo-container -->
						</div>
						<!-- End of .col-md-6 -->
						<div class="col-md-auto">
							<div class="footer-social-share-wrapper">
								<div class="footer-social-share">
									<div class="axil-social-title">Find us here</div>
									<ul class="social-share social-share__with-bg">
										<li><a href="https://twitter.com/BarrelMagazine"><i class="fab fa-twitter"></i></a></li>
										<li><a href="https://www.instagram.com/barrelmagazineug/"><i class="fab fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
							<!-- End of .footer-social-share-wrapper -->
						</div>
						<!-- End of .col-md-6 -->
					</div>
					<!-- End of .row -->
				</div>
				<!-- End of .footer-mid -->
				<div class="footer-bottom">					
					<!-- End of .footer-bottom-links -->
					<p class="axil-copyright-txt">
						&copy; Barrel Magaznie <?php echo date('Y');  ?>
					</p>
				</div>
				<!-- End of .footer-bottom -->
			</div>
			<!-- End of .container -->
		</footer>
		<!-- End of footer -->
	</div>
	<!-- End of .main-content -->
	<!-- Javascripts
    	======================================= -->
    
    <?php wp_footer();?> 
</body>

</html>