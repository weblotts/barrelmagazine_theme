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
    }elseif(is_author()){
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_author(' &bull; ');
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



// Reading time
function barrel_reading_time() {
    global $post;
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);

    if ($readingtime == 1) {
    $timer = " min";
    } else {
    $timer = " mins";
    }
    $totalreadingtime = $readingtime . $timer;

    return $totalreadingtime;
}

/* Flush rewrite rules for custom post types. Making it possible to display custom posts content */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
