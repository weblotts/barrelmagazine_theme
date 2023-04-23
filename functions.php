<?php 
/**
 * Theme Functions
 * @package barrel
 */
if ( ! defined('BARREL_DIR_PATH' ) ) {
    define( 'BARREL_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if(!defined('BARREL_DIR_URI')){
    define('BARREL_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once BARREL_DIR_PATH . '/inc/helpers/autoloader.php';


function barrel_get_theme_instance(){
    \BARREL\Inc\BARREL_THEME::get_instance();
}
barrel_get_theme_instance();


// Breadcrumbs
function barrel_get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif(is_tag()){
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_tags('  ');
        if (is_single()) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    }
    elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}
