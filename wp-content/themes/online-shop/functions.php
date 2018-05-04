<?php
/**
 * Online Shop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Online Shop
 */

/**
 * require int.
 */
require_once trailingslashit( get_template_directory() ).'acmethemes/init.php';

include 'inc/feature_system.php';
include 'inc/custom_metebox_products.php';
include 'inc/admin-order.php';

function online_shop_canapapa_deals_widget_init(){
    register_sidebar(array(
        'name' => esc_html__('Main Deals Content Area', 'online-shop'),
        'id'   => 'online-canapapa-deals',
        'description'	=> '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="at-title-action-wrapper clearfix"><h2 class="widget-title">',
        'after_title' => '</h2></div>',
    ));
}
add_action('widgets_init', 'online_shop_canapapa_deals_widget_init');


if ( ! function_exists( 'online_shop_deals' ) ) :

    function online_shop_deals() {
        $online_shop_customizer_all_values = online_shop_get_theme_options();
        $online_shop_hide_front_page_content = $online_shop_customizer_all_values['online-shop-hide-front-page-content'];

        /*show widget in front page, now user are not force to use front page*/
        if( is_active_sidebar( 'online-canapapa-deals' ) && is_home() ){
            echo 1;
            dynamic_sidebar( 'online-canapapa-deals' );
        } else {
            echo 2;
        }
        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        else {
            if( 1 != $online_shop_hide_front_page_content ){
                include( get_page_template() );
            }
        }
    }
endif;
add_action( 'online_shop_action_deals', 'online_shop_deals', 20 );