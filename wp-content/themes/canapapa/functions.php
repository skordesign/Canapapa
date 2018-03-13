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
   /* wp_enqueue_script('custom-script-1', get_template_directory_uri(). '/js/jquery.min.js.pagespeed.jm.gB2NxZAQFn.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-2', get_template_directory_uri(). '/js/custom.js+style-switcher.js+switches.js+slick.js+wow.min.js+bootstrap.min.js+jquery.highlight.js.pagespeed.jc.Ptc5pSddfg.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-3', get_template_directory_uri(). '/js/jquery.touchSwipe.min.js+line.js.pagespeed.jc.aA1v78yNIe.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-4', get_template_directory_uri(). '/js/nicescroll.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-5', get_template_directory_uri(). '/js/jquery.nicescroll.plus.js+jquery.simplecolorpicker.js+jquery.zoom.js+to-top.js+jquery.charactercounter.js+bootstrap-select.min.js+bootstrap-slider.js+jquery.particleground.js.pagespeed.jc.JMgHNL5rky.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-script-6', get_template_directory_uri(). '/js/salvattore.js', array(), '1.0.0', true);
//   */ wp_enqueue_script('custom-script-7', get_template_directory_uri(). '/js/bootstrap-tabcollapse.js', array(), '1.0.0', true);
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
    'footer'=> __('Footer Menu'),
));

/**
 * Add custom thumbnail sizes
 */
if(function_exists('add_image_size')) {
    add_image_size('custom-image-size', 500, 500, true);
//    add_image_size( 'slider-thumb', 1920, 500, true );
}

// Custom Post types for Slider on home page
add_action('init', 'create_slider');
function create_slider() {
    $slider_args = array(
        'labels' => array(
            'name' => __( 'Slider' ),
            'singular_name' => __( 'Slider' ),
            'add_new' => __( 'Add New Slider' ),
            'add_new_item' => __( 'Add New Slider' ),
            'edit_item' => __( 'Edit Slider' ),
            'new_item' => __( 'Add New Slider' ),
            'view_item' => __( 'View Slider' ),
            'search_items' => __( 'Search Slider' ),
            'not_found' => __( 'No slider found' ),
            'not_found_in_trash' => __( 'No slider found in trash' )
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('slider',$slider_args);
}
add_filter("manage_feature_edit_columns", "slider_edit_columns");

function slider_edit_columns($slider_columns){
    $slider_columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Title",
    );
    return $slider_columns;
}

add_action( 'save_post', 'cd_meta_box_save_slider' );
function cd_meta_box_save_slider( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set
    if( isset( $_POST['url'] ) )
        update_post_meta( $post_id, 'url', wp_kses( $_POST['url'], $allowed ) );
}

//End slider


// Custom Post types for trademark on home page
add_action('init', 'create_trademark');
function create_trademark() {
    $trademark_args = array(
        'labels' => array(
            'name' => __( 'Trademark' ),
            'singular_name' => __( 'Trademark' ),
            'add_new' => __( 'Add New Trademark' ),
            'add_new_item' => __( 'Add New Trademark' ),
            'edit_item' => __( 'Edit Trademark' ),
            'new_item' => __( 'Add New Trademark' ),
            'view_item' => __( 'View Trademark' ),
            'search_items' => __( 'Search Trademark' ),
            'not_found' => __( 'No trademark found' ),
            'not_found_in_trash' => __( 'No trademark found in trash' )
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('trademark',$trademark_args);
}
add_filter("manage_feature_edit_columns", "trademark_edit_columns");

function trademark_edit_columns($trademark_columns){
    $trademark_columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Title",
    );
    return $trademark_columns;
}

add_action( 'save_post', 'cd_meta_box_save_trademark' );
function cd_meta_box_save_trademark( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set
    if( isset( $_POST['url'] ) )
        update_post_meta( $post_id, 'url', wp_kses( $_POST['url'], $allowed ) );
}

//End slider


