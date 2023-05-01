<?php
    $menu_class = \BARREL\Inc\Menus::get_instance();
    $header_menu_id = $menu_class->get_menu_id('barrel-header-menu');        
    $header_menus = wp_get_nav_menu_items($header_menu_id);


	$category_menu_id = $menu_class->get_menu_id('barrel-category-menu'); 
	$category_menus = wp_get_nav_menu_items($category_menu_id);

	//	Top Left Menu Items
	$special_menu_id = $menu_class->get_menu_id('barrel-special-menu');
	$special_menus = wp_get_nav_menu_items($special_menu_id);

?>



<div class="side-nav">
	<div class="side-nav-inner nicescroll-container">
		<form action="/" class="side-nav-search-form" method="get">
			<div class="form-group search-field">
				<!-- <input type="text" class="search-field" name="s" id="s" placeholder="Search..."> -->
				<input type="text" class="navbar-search-field" name="s" id="s" onkeyup="fetch()" placeholder="Search Here...">
				<button class="side-nav-search-btn"><i class="fas fa-search"></i></button>
			</div>
			<!-- End of .side-nav-search-form -->
		</form>
		<!-- End of .side-nav-search-form -->
		<div class="side-nav-content">
			<div class="row ">
				<div class="col-lg-6">	


					<?php
						if(! empty($category_menus) && is_array( $category_menus)){ ?>
							<ul class="main-navigation side-navigation list-inline flex-column">
								<?php 
									foreach($category_menus as $menu_item){
										if(! $menu_item->menu_item_parent){ 
												$child_menu_items = $menu_class->get_child_menu_items($category_menus, $menu_item->ID);
												$has_children = ! empty( $child_menu_items) && is_array( $child_menu_items);

												if(! $has_children){ ?>
													<li><a href="<?php echo esc_url( $menu_item->url); ?>"><?php echo esc_html($menu_item->title);?></a></li>
												<?php } else{ ?>
													<li class="has-submenu"><a href="<?php echo esc_url( $menu_item->url) ?>"><?php echo esc_html($menu_item->title);?></a>
														<ul class="submenu">
															<?php foreach($child_menu_items as $child_menu_item){ ?>
																<li><a href="<?php echo esc_url( $child_menu_item->url) ?>"><?php echo esc_html($child_menu_item->title);?></a></li>  
															<?php } ?>
														</ul>
													</li>
												<?php }
											?>
											
											
										<?php }
									}
								?>
							</ul>  
							<!-- End of .main-navigation -->
						<?php }
					?>  




				</div>
				<!-- End of  .col-md-6 -->
				<div class="col-lg-6">
					<div class="axil-contact-info-inner">
						<h5 class="h5 m-b-xs-10">
							Contact Information
						</h5>
						<div class="axil-contact-info">
							<address class="address">
								<p class="m-b-xs-30  mid grey-dark-three ">Kingdom Kampala</p>
								<div class="h5 m-b-xs-5">W13 6th Floor, Nile Avenue Kampala. </div>
								
								<div>
									<div class="h5 m-b-xs-5">Contact. </div>
									<a class="tel" href="mailto:info@barrelmagazine.com"><i class="fas fa-envelope"></i>info@barrelmagazine.com</a>
								</div>
							</address>
							<!-- End of address -->
							<div class="contact-social-share m-t-xs-30">
								<div class="axil-social-title h5">Follow Us</div>
								<ul class="social-share social-share__with-bg">
									<li><a href="https://twitter.com/BarrelMagazine"><i class="fab fa-twitter"></i></a></li>
									<li><a href="https://www.instagram.com/barrelmagazineug/"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
							<!-- End of .contact-shsdf -->
						</div>
						<!-- End of .axil-contact-info -->
					</div>
					<!-- End of .axil-contact-info-inner -->
				</div>
			</div>
			<!-- End of .row -->
		</div>
	</div>
	<!-- End of .side-nav-inner -->
	<div class="close-sidenav" id="close-sidenav">
		<div></div>
		<div></div>
	</div>
</div>
<!-- End of .side-nav -->

<!-- Header starts -->
<header class="page-header">


	<div class="header-top bg-grey-dark-one">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md">
					<ul class="header-top-nav list-inline justify-content-center justify-content-md-start">
						<li class="current-date"><?php echo date('D M, Y ');  ?></li>
						<?php
							if(!empty($special_menus) && is_array($special_menus)){?>
								<?php foreach ($special_menus as $menu_item ){
									$child_menu_items = $menu_class->get_child_menu_items($special_menus, $menu_item->ID); ?>

									<li class="current-date"><a href="<?php echo esc_url( $menu_item->url); ?>"><?php echo esc_html($menu_item->title);?></a></li>

								<?php } ?>
							<?php }?>
						
					</ul>

					<!-- End of .header-top-nav -->
				</div>
				<div class="col-md-auto">
					<ul class="ml-auto social-share header-top__social-share">
						<li><a href="https://twitter.com/BarrelMagazine"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.instagram.com/barrelmagazineug/"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
			<!-- End of .row -->
		</div>
		<!-- End of .container -->
	</div>


	<!-- End of .header-top -->
	<nav class="navbar bg-white">
		<div class="container">
			<div class="navbar-inner">
				<div class="brand-logo-container">
					<a href="/">
						<img src="<?php echo BARREL_DIR_URI .'/assets/images/Barrel-Coloured-logo.png'; ?>" alt="Bar.Mag" class="brand-logo">
					</a>
				</div>
				<!-- End of .brand-logo-container -->
				<div class="main-nav-wrapper">


				<?php
					if(! empty($header_menus) && is_array( $header_menus)){ ?>
						<ul class="main-navigation list-inline" id="main-menu">
							<?php 
								foreach($header_menus as $menu_item){
									if(! $menu_item->menu_item_parent){ 
											$child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
											$has_children = ! empty( $child_menu_items) && is_array( $child_menu_items);

											if(! $has_children){ ?>
												<li><a href="<?php echo esc_url( $menu_item->url); ?>"><?php echo esc_html($menu_item->title);?></a></li>
											<?php } else{ ?>
												<li class="has-submenu"><a href="<?php echo esc_url( $menu_item->url) ?>"><?php echo esc_html($menu_item->title);?></a>
													<ul class="submenu">
														<?php foreach($child_menu_items as $child_menu_item){ ?>
															<li><a href="<?php echo esc_url( $child_menu_item->url) ?>"><?php echo esc_html($child_menu_item->title);?></a></li>  
														<?php } ?>
													</ul>
												</li>
											<?php }
										?>
										
										
									<?php }
								}
							?>
						</ul>  
					<?php }
				?>   

					<!-- End of .main-navigation -->
				</div>
				<!-- End of .main-nav-wrapper -->
				<div class="navbar-extra-features ml-auto">
					
					
					<form action="/" method="get" class="navbar-search">
						<div class="search-field">
							<input type="text" class="navbar-search-field" name="s" id="s" onkeyup="fetch()" placeholder="Search Here...">
							<button class="navbar-search-btn" type="button"><i class="fal fa-search"></i></button>
						</div>
						<!-- End of .search-field -->
						<a href="#" class="navbar-search-close"><i class="fal fa-times"></i></a>
					</form>
					<!-- End of .navbar-search -->

					

					<a href="#" class="nav-search-field-toggler" data-toggle="nav-search-feild"><i
							class="far fa-search"></i></a>
					<a href="#" class="side-nav-toggler" id="side-nav-toggler">
						<span></span>
						<span></span>
						<span></span>
					</a>
				</div>
				<!-- End of .navbar-extra-features -->
				<div class="main-nav-toggler d-block d-lg-none" id="main-nav-toggler">
					<div class="toggler-inner">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<!-- End of .main-nav-toggler -->
			</div>
			<!-- End of .navbar-inner -->
		</div>
		<!-- End of .container -->
	</nav>
	<!-- End of .navbar -->


</header>
<!-- End of .page-header -->