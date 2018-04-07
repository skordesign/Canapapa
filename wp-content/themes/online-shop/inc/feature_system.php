<?php
/**
 * Created by PhpStorm.
 * User: HD088
 * Date: 3/25/2018
 * Time: 8:57 AM
 */

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
        default :
            $sizes['default'] = array(
                'width' => 200,
                'height' => 200,
                'crop' => true
            );
    endswitch;

    return $sizes;
}