<?php
/**
 * Created by PhpStorm.
 * User: nguyentrunghieu
 * Date: 3/14/2018
 * Time: 12:10 AM
 */

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
        'supports' => array(
            'title',
            'author',
            'thumbnail',
            'editor'
        ), //Các tính năng được hỗ trợ trong post type
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