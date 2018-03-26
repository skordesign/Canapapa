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
    wp_enqueue_style('custom-style-4', get_template_directory_uri() . '/css/custom-gold.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-5', get_template_directory_uri() . '/css/slick/slick.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-6', get_template_directory_uri() . '/css/slick/slick-theme.css', array(), '1.0.0', 'all');


    wp_enqueue_script('jquery');
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('slickjs', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'));
    wp_enqueue_script('header', get_template_directory_uri() . '/js/header.js', array('jquery'));
    wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js', array('jquery'));
    wp_enqueue_script('quickview', get_template_directory_uri() . '/js/quickview.js', array('jquery'));
    wp_enqueue_script('detail.content', get_template_directory_uri() . '/js/detail.content.js', array('jquery'));

    #include script js
    /* wp_enqueue_script('custom-script-1', get_template_directory_uri(). '/js/jquery.min.js.pagespeed.jm.gB2NxZAQFn.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-2', get_template_directory_uri(). '/js/custom.js+style-switcher.js+switches.js+slick.js+wow.min.js+bootstrap.min.js+jquery.highlight.js.pagespeed.jc.Ptc5pSddfg.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-3', get_template_directory_uri(). '/js/jquery.touchSwipe.min.js+line.js.pagespeed.jc.aA1v78yNIe.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-4', get_template_directory_uri(). '/js/nicescroll.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-5', get_template_directory_uri(). '/js/jquery.nicescroll.plus.js+jquery.simplecolorpicker.js+jquery.zoom.js+to-top.js+jquery.charactercounter.js+bootstrap-select.min.js+bootstrap-slider.js+jquery.particleground.js.pagespeed.jc.JMgHNL5rky.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-6', get_template_directory_uri(). '/js/salvattore.js', array(), '1.0.0', true);
    //   */
//   wp_enqueue_script('custom-script-7', get_template_directory_uri(). '/js/bootstrap-tabcollapse.js', array(), '1.0.0', true);
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
if (function_exists('add_image_size')) {
    add_image_size('custom-image-size', 500, 500, true);
}

include 'inc/icon_socail.php';
include 'inc/info_web.php';
include 'inc/create_module_slider.php';
include 'inc/create_module_trademark.php';
include 'inc/feature_system.php';
include 'inc/custom_metebox_products.php';
include 'inc/custom_metabox_page.php';

function utf8convert($str) {
	if(!$str) return false;
	$utf8 = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ|Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
	foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
return $str;
}

