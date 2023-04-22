<?php 
/**
 * Enqueue Theme Assets
 * @package barrel
 */
namespace BARREL\Inc;
use BARREL\Inc\Traits\Singleton;

class Assets{

    use Singleton;

    protected function __construct(){
        $this->set_hooks();
    }

    protected function set_hooks(){
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }


    public function register_styles(){
        wp_register_style('fontawesome',  BARREL_DIR_URI . '/assets/css/fontawesome-all.min.css', [ ], filemtime( BARREL_DIR_PATH .'/assets/css/fontawesome-all.min.css'), 'all');
        wp_register_style('iconfont',  BARREL_DIR_URI . '/assets/css/iconfont.css', [ ], filemtime( BARREL_DIR_PATH .'/assets/css/fontawesome-all.min.css'), 'all');
        wp_register_style('bootstrap',  BARREL_DIR_URI . '/assets/css/vendor/bootstrap.min.css', [ ], filemtime( BARREL_DIR_PATH .'/assets/css/vendor/bootstrap.min.css'), 'all');
        wp_register_style('carousel',  BARREL_DIR_URI . '/assets/css/vendor/owl.carousel.min.css', [ ], filemtime( BARREL_DIR_PATH .'/assets/css/vendor/owl.carousel.min.css'), 'all');
        wp_register_style('magnific',  BARREL_DIR_URI . '/assets/css/vendor/magnific-popup.css', [ ], filemtime( BARREL_DIR_PATH .'/assets/css/vendor/magnific-popup.css'), 'all');
        wp_register_style('animate',  BARREL_DIR_URI . '/assets/css/vendor/animate.css', [ ], filemtime( BARREL_DIR_PATH .'/assets/css/vendor/animate.css'), 'all');
        wp_register_style('custom',  BARREL_DIR_URI . '/assets/css/style.css', [ ], filemtime( BARREL_DIR_PATH .'/assets/css/style.css'), 'all');

        
        wp_enqueue_style('fontawesome');
        wp_enqueue_style('iconfont');
        wp_enqueue_style('bootstrap');
        wp_enqueue_style('carousel');
        wp_enqueue_style('magnific');
        wp_enqueue_style('animate');
        wp_enqueue_style('custom');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
    }

    public function register_scripts(){
        wp_register_script('jquery-migrate', BARREL_DIR_URI .'/assets/js/vendor/jquery-migrate.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/jquery-migrate.min.js'), true);        
        wp_register_script('easing', BARREL_DIR_URI .'/assets/js/vendor/easing-1.3.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/easing-1.3.js'), true);        
        wp_register_script('waypoints', BARREL_DIR_URI .'/assets/js/vendor/jquery.waypoints.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/jquery.waypoints.min.js'), true);        
        wp_register_script('carousel', BARREL_DIR_URI .'/assets/js/vendor/owl.carousel.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/owl.carousel.min.js'), true);        
        wp_register_script('slick', BARREL_DIR_URI .'/assets/js/vendor/slick.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/slick.min.js'), true);        
        wp_register_script('bootstrap', BARREL_DIR_URI .'/assets/js/vendor/bootstrap.bundle.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/bootstrap.bundle.min.js'), true);        
        wp_register_script('isotope', BARREL_DIR_URI .'/assets/js/vendor/isotope.pkgd.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/isotope.pkgd.min.js'), true);        
        wp_register_script('counterup', BARREL_DIR_URI .'/assets/js/vendor/jquery.counterup.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/jquery.counterup.js'), true);        
        wp_register_script('magnific', BARREL_DIR_URI .'/assets/js/vendor/jquery.magnific-popup.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/jquery.magnific-popup.min.js'), true);        
        wp_register_script('nicescroll', BARREL_DIR_URI .'/assets/js/vendor/jquery.nicescroll.min.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/vendor/jquery.nicescroll.min.js'), true);        
        wp_register_script('ponyfill', 'https://cdn.jsdelivr.net/npm/css-vars-ponyfill@2', ['jquery'], false, true);        
        wp_register_script('plugins', BARREL_DIR_URI .'/assets/js/plugins.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/plugins.js'), true);        
        wp_register_script('main', BARREL_DIR_URI .'/assets/js/main.js', ['jquery'], filemtime( BARREL_DIR_PATH .'/assets/js/main.js'), true);        

        wp_enqueue_script( 'jquery-migrate' );
        wp_enqueue_script( 'easing' );
        wp_enqueue_script( 'waypoints' );
        wp_enqueue_script( 'carousel' );
        wp_enqueue_script( 'slick' );
        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'isotope' );
        wp_enqueue_script( 'counterup' );
        wp_enqueue_script( 'magnific' );
        wp_enqueue_script( 'nicescroll' );
        wp_enqueue_script( 'ponyfill' );
        // wp_enqueue_script( 'plugins' );
        wp_enqueue_script( 'main' );

    }

}

