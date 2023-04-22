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
        // add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
        add_action( 'init', [$this,'create_custom_post_type'] );
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

    // magazine custom type
    function create_custom_post_type(){
        register_post_type('magazine', [
            'labels' =>[ 
                'name' => __('Magazines', 'barrel'),
                'singular_name' => __('Magazine', 'barrel')
            ],
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug', 'magazines'],
            'show_in_rest' => true 
        ]);
    }



    function qt_custom_breadcrumbs() {
 
        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '&raquo;'; // delimiter between crumbs
        $home = 'Home'; // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
       
        global $post;
        $homeLink = get_bloginfo('url');
       
        if (is_home() || is_front_page()) {
       
          if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
       
        } else {
       
          echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
       
          if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
       
          } elseif ( is_search() ) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
       
          } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
       
          } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
       
          } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
       
          } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
              $post_type = get_post_type_object(get_post_type());
              $slug = $post_type->rewrite;
              echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
              if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
              $cat = get_the_category(); $cat = $cat[0];
              $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
              if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
              echo $cats;
              if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }
       
          } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
       
          } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
       
          } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;
       
          } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
              $page = get_page($parent_id);
              $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
              $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
              echo $breadcrumbs[$i];
              if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
       
          } elseif ( is_tag() ) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
       
          } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
       
          } elseif ( is_404() ) {
            echo $before . 'Error 404' . $after;
          }
       
          if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
          }
       
          echo '</div>';
       
        }
      }

















 }