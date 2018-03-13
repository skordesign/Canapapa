<?php
/**
 * Created by PhpStorm.
 * User: nguyentrunghieu
 * Date: 3/14/2018
 * Time: 12:11 AM
 */


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
        'supports' => array('title', 'editor', 'thumbnail',  'author',)
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