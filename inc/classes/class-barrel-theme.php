<?php
/**
 * Bootstraps the theme
 * @package barrel
 */

 namespace BARREL\Inc;
 use BARREL\Inc\Traits\Singleton;

 class BARREL_THEME{
     use Singleton;

     protected function __construct(){
        Assets::get_instance();
        Menus::get_instance();

        $this->set_hooks();
     }

     protected function set_hooks(){
        add_action( 'after_setup_theme', [$this, 'setup_theme'] );
     }

    function setup_theme(){
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', [
            'header-text'   => ['site-title', 'site-description'],
            'height'        => 100,
            'width'         => 400,
            'flex-height'   => true,
            'flex-width'    => true,
        ] );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', [
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style'
        ]);
        add_editor_style();
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');

        global $content_width;
        if( ! isset( $content_width)){
            $content_width = 1240;
        }
    }

    // Breadcrumbs
    function barrel_get_breadcrumb() {
        echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
        if (is_category() || is_single()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            // the_category(' &bull; ');
                if (is_single()) {
                    echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                    the_title();
                }
        }
        elseif(the_tags()){
            // echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            // the_tags( ' &bull; ');
            //     if (is_single()) {
            //         echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            //         the_title();
            //     }
            echo 'Hello';
        }
        elseif (is_page()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            echo the_title();
        } elseif (is_search()) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
            echo '"<em>';
            echo the_search_query();
            echo '</em>"';
        }elseif(is_author() ) {
            echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
            echo the_author();
        }
    }

    function wpdocs_custom_excerpt_length( $length ) {
        return 20;
    }

    function count_cat_post($category) {
        if(is_string($category)) {
            $catID = get_cat_ID($category);
        }
        elseif(is_numeric($category)) {
            $catID = $category;
        } else {
            return 0;
        }
            $cat = get_category($catID);
        return $cat->count;
    }


 }
