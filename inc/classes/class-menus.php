<?php
/**
 * Register Menus
 * @package barrel
 */

 namespace BARREL\Inc;
 use BARREL\Inc\Traits\Singleton;

 class Menus{
     use Singleton;

     protected function __construct(){
        $this->set_hooks();
     }

     protected function set_hooks(){
        add_action( 'init', [$this, 'register_menus'] );
     }

    function register_menus(){
        register_nav_menus(
            [
                'barrel-header-menu'       => esc_html__('Header Menu', 'barrel'),
                'barrel-category-menu'       => esc_html__('Category Menu', 'barrel'),
                'barrel-footer-menu'       => esc_html__('Footer Menu', 'barrel'),
                'barrel-special-menu'       => esc_html__('Special Menu', 'barrel')
            ]
        );
    }

    function get_menu_id($location){
        //Get all the locations
        $locations = get_nav_menu_locations();        
        // get object ID by location
        $menu_id =  $locations[$location];
        return ! empty( $menu_id) ? $menu_id : '';
    }

    function get_child_menu_items( $menu_array, $parent_id){
        $child_menus = [];
        if( ! empty( $menu_array ) && is_array( $menu_array )){
            foreach( $menu_array as $menu ){
                if( intval ($menu->menu_item_parent) === $parent_id){
                    array_push($child_menus, $menu);
                }
            }
        }
        return $child_menus;
    }
     
 }
