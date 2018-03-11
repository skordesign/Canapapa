<?php
/**
 * Created by PhpStorm.
 * User: nguyentrunghieu
 * Date: 3/9/2018
 * Time: 12:11 AM
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
/**
 * Add theme support
 */
function woocommerce_support() {
    add_theme_support('woocommerce');
}

/**
 * Setup theme canapapa
 */
function canapapa_setup_theme() {
    /**
     * Add menu support
     */
    add_theme_support('menus');
    /**
     * Navigation Menus
     */
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer'=> __('Footer Menu'),
    ));
}
add_action('init', 'canapapa_setup_theme');

/**
 * Register script and style
 */
function canapapa_script_enqueue() {
    #include script css
    wp_enqueue_style('custom-style-1', get_template_directory_uri(). '/css/A.font-awesome.css+style.css,Mcc.Ql9FxO-sfy.css.pagespeed.cf.ho57CWxopf.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-2', get_template_directory_uri(). '/css/A.hint.css+animate.css+bootstrap-select.min.css+jquery.simplecolorpicker.css,Mcc.ITfIRIQ_Aj.css.pagespeed.cf.GwBTqSEMS1.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-3', get_template_directory_uri(). '/css/A.ionicons.min.css+bootstrap.min.css,Mcc.pIcqvJV9g2.css.pagespeed.cf.Oq0_qyyUfs.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-4', get_template_directory_uri(). '/css/custom-gold.css', array(), '1.0.0', 'all');

    #include script js
    wp_enqueue_script('custom-script-1', get_template_directory_uri(). '/js/jquery.min.js.pagespeed.jm.gB2NxZAQFn.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-2', get_template_directory_uri(). '/js/custom.js+style-switcher.js+switches.js+slick.js+wow.min.js+bootstrap.min.js+jquery.highlight.js.pagespeed.jc.Ptc5pSddfg.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-3', get_template_directory_uri(). '/js/jquery.touchSwipe.min.js+line.js.pagespeed.jc.aA1v78yNIe.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-4', get_template_directory_uri(). '/js/nicescroll.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-5', get_template_directory_uri(). '/js/jquery.nicescroll.plus.js+jquery.simplecolorpicker.js+jquery.zoom.js+to-top.js+jquery.charactercounter.js+bootstrap-select.min.js+bootstrap-slider.js+jquery.particleground.js.pagespeed.jc.JMgHNL5rky.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-6', get_template_directory_uri(). '/js/salvattore.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-7', get_template_directory_uri(). '/js/bootstrap-tabcollapse.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'canapapa_script_enqueue');

/**
 * Add post image, background, post-formats, html5 support
 */
add_theme_support('post-thumbnails');
add_theme_support('custom-background');
add_theme_support('post-formats', array('aside', 'image', 'video'));

/**
 * Add custom thumbnail sizes
 */
if(function_exists('add_image_size')) {
    add_image_size('custom-image-size', 500, 500, true);
}


