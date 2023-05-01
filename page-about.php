<?php
    /**
     * Main Template file
     * @package barrel
     *
     */
get_header(); ?>


<!-- Main contents
================================================ -->
<div class="main-content">

    <!-- Breadcrumbs  -->
    <div class="breadcrumb-wrapper">
        <div class="container">
            <nav aria-label="breadcrumb">
                <?php barrel_get_breadcrumb(); ?>
            </nav>
        </div>
        <!-- End of .container -->
    </div>
    <!-- End of .breadcrumb-container -->


    <!-- Banner starts -->
    <section class="banner banner__default bg-grey-light-three">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="post-title-wrapper">
                        <h2 class="m-b-xs-0 axil-post-title hover-line "><?php the_title(); ?></h2>
                    </div>
                    <!-- End of .post-title-wrapper -->
                </div>
                <!-- End of .col-lg-8 -->
            </div>
        </div>
        <!-- End of .container -->
    </section>
    <!-- End of .banner -->




    <div class="axil-about-us section-gap-top p-b-xs-20">
        <div class="container">
                <figure class="m-b-xs-40">
					<!-- <img src="assets/images/about-us.jpg" alt="about us" class="img-fluid mx-auto"> -->
                    <?php the_post_thumbnail('full',  ['class' => 'img-fluid mx-auto ']); ?>
				</figure>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php while(have_posts()): the_post(); ?>
                                <?php the_content();?>
                            <?php endwhile; ?>
                        </div>

                    </div>
                </div>
                <!-- End of .col-lg-8 -->

                <div class="col-lg-4">
                    <aside class="post-sidebar">

                        <!-- Latest Posts -->
                        <?php get_template_part( 'templates/sidebars/latest' ); ?>

                    </aside>
                    <!-- End of .post-sidebar -->
                </div>
                <!-- End of .col-lg-4 -->
            </div>
            <!-- End of .row -->
        </div>
        <!-- End of .container -->
    </div>



    <div class="axil-our-team section-gap section-gap-top__with-text bg-grey-light-three">
        <div class="container">
            <div class="axil-team-grid-wrapper">
                <div class="section-title d-block text-center">
                    <h2 class="axil-title m-b-xs-20">Meet Our Great Team</h2>
                    <p>At Barrel Magazine, we believe in team-work<br>the fore fighting team</p>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4">
                    <div class="axil-team-block m-b-xs-30">
                        <a href="#" class="d-block img-container">
                            <img src="<?php echo BARREL_DIR_URI .'/assets/images/banner.jpg'; ?>" alt="team member 1">
                        </a>
                        <div class="axil-team-inner-content text-center">
                            <h3 class="axil-member-title hover-line"><a href="">Ronnie Bravo Katungi</a></h3>
                            <div class="axil-designation">
                                CEO/Founder
                            </div>
                        </div>
                        <!-- End of .axil-team-inner-content -->
                        <div class="axil-team-share-wrapper">
                            <ul
                                class="social-share social-share__with-bg social-share__with-bg-white social-share__vertical">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                            <!-- End of .social-share -->
                        </div>
                        <!-- End of .axil-team-share-wrapper -->
                    </div>
                    <!-- End of .team-block -->
                </div>
                <!-- End of .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="axil-team-block m-b-xs-30">
                        <a href="#" class="d-block img-container">
                            <img src="<?php echo BARREL_DIR_URI .'/assets/images/banner.jpg'; ?>" alt="team member 1">
                        </a>
                        <div class="axil-team-inner-content text-center">
                            <h3 class="axil-member-title hover-line"><a href="">Josepha Jabo</a></h3>
                            <div class="axil-designation">
                                Editor
                            </div>
                        </div>
                        <!-- End of .axil-team-inner-content -->
                        <div class="axil-team-share-wrapper">
                            <ul
                                class="social-share social-share__with-bg social-share__with-bg-white social-share__vertical">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                            <!-- End of .social-share -->
                        </div>
                        <!-- End of .axil-team-share-wrapper -->
                    </div>
                    <!-- End of .team-block -->
                </div>
                <!-- End of .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="axil-team-block m-b-xs-30">
                        <a href="#" class="d-block img-container">
                            <img src="<?php echo BARREL_DIR_URI .'/assets/images/banner.jpg'; ?>" alt="team member 1">
                        </a>
                        <div class="axil-team-inner-content text-center">
                            <h3 class="axil-member-title hover-line"><a href="">Andrew Baingana</a></h3>
                            <div class="axil-designation">
                                Graphics
                            </div>
                        </div>
                        <!-- End of .axil-team-inner-content -->
                        <div class="axil-team-share-wrapper">
                            <ul
                                class="social-share social-share__with-bg social-share__with-bg-white social-share__vertical">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                            <!-- End of .social-share -->
                        </div>
                        <!-- End of .axil-team-share-wrapper -->
                    </div>
                    <!-- End of .team-block -->
                </div>
                <!-- End of .col-lg-4 -->


            </div>
        </div>
    </div>

</div>





<!-- Footer -->
<?php get_footer();?>
