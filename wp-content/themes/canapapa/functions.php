<?php
/**
 * Created by PhpStorm.
 * User: nguyentrunghieu
 * Date: 3/9/2018
 * Time: 12:11 AM
 */

add_action('after_setup_theme', 'woocommerce_support');
/**
 * Add theme support
 */
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

/**
 * Setup theme canapapa
 */
function canapapa_setup_theme()
{
    /**
     * Add menu support
     */
    add_theme_support('menus');
}
add_action('init', 'canapapa_setup_theme');

/**
 * Register script and style
 */
function canapapa_script_enqueue()
{
    #include script css
    wp_enqueue_style('custom-style-1', get_template_directory_uri() . '/css/A.font-awesome.css+style.css,Mcc.Ql9FxO-sfy.css.pagespeed.cf.ho57CWxopf.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-2', get_template_directory_uri() . '/css/A.hint.css+animate.css+bootstrap-select.min.css+jquery.simplecolorpicker.css,Mcc.ITfIRIQ_Aj.css.pagespeed.cf.GwBTqSEMS1.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-3', get_template_directory_uri() . '/css/A.ionicons.min.css+bootstrap.min.css,Mcc.pIcqvJV9g2.css.pagespeed.cf.Oq0_qyyUfs.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-4', get_template_directory_uri() . '/css/canapapa.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-5', get_template_directory_uri() . '/css/slick/slick.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-6', get_template_directory_uri() . '/css/slick/slick-theme.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-7', get_template_directory_uri() . '/css/flexslider/flexslider.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery', get_template_directory_uri() . 'js/jquery.min.js', array('jquery'));
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.min.js', array('jquery'));
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'));
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'));
    wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js', array('jquery'));


}
add_action('wp_enqueue_scripts', 'canapapa_script_enqueue');

/**
 * Add post image, background, post-formats, html5 support
 */
add_theme_support('post-thumbnails');
add_theme_support('custom-background');
add_theme_support('post-formats', array('aside', 'image', 'video'));

/**
 * Navigation Menus
 */
register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
));

/**
 * Add custom thumbnail sizes
 */
//add_image_size( 'companies_thumb', 120, 120, true);
/* Adding image sizes*/
add_filter( 'intermediate_image_sizes_advanced','set_thumbnail_size_by_post_type', 10);
function set_thumbnail_size_by_post_type( $sizes ) {

    $post_type = get_post_type($_REQUEST['post_id']);

    switch ($post_type) :
        case 'trademark' :
            $sizes['trademark'] = array(
                'width' => 140,
                'height' => 70,
                'crop' => true
            );
            break;
        case 'slider' :
            $sizes['post'] = array(
                'width' => 530,
                'height' => 400,
                'crop' => true
            );
        case 'product' :
            $sizes['post'] = array(
                'width' => 263,
                'height' => 240,
                'crop' => true
            );
            break;
        default :
            $sizes['default'] = array(
                'width' => 200,
                'height' => 200,
                'crop' => true
            );
    endswitch;

    return $sizes;
}
include 'inc/icon_socail.php';
include 'inc/info_web.php';
include 'inc/create_module_slider.php';
include 'inc/create_module_trademark.php';
include 'inc/feature_system.php';
include 'inc/custom_metebox_products.php';



