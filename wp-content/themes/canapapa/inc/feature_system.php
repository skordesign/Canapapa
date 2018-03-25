<?php
/**
 * Created by PhpStorm.
 * User: HD088
 * Date: 3/25/2018
 * Time: 8:57 AM
 */

add_action('wp_ajax_showDetailProduct', 'showDetailProduct');
add_action('wp_ajax_nopriv_showDetailProduct', 'showDetailProduct');

function showDetailProduct() {
    if(isset($_POST)) {
        if(!empty($_POST['product_id']))
        {
            $product_id = $_POST['product_id'];
            $params = array('posts_per_page' => 15, 'post_type' => 'product', 'post__in'=> array($product_id));
            $wc_product = new WP_Query($params);
            $product = $wc_product->posts['0'];
            $product->regular_price = number_format(get_post_meta($product->ID, '_regular_price', true), 0, '.', ',');
            $product->sale_price = number_format(get_post_meta($product->ID, '_sale_price', true), 0, '.', ',');
            $product->sku = get_post_meta($product->ID, '_sku', true);
            $product->stock_status = get_post_meta($product->ID, '_stock_status', true);
            $product->featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID));
            $product->link_url_product = get_permalink($product->ID);
            $product->add_to_cart_url = '?/add-to-cart='.$product->ID;
            echo json_encode($product);
            exit();
        }
        else
        {
            echo json_encode(array(
                'err' => 0,
                'msg' => 'Product id empty',
            ));
            exit();
        }
    }
    else
    {
        echo json_encode(array(
            'err' => 0,
            'msg' => 'No isset request POST'
        ));
        exit();
    }
}