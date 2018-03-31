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

add_action('wp_ajax_addCustomToCart', 'addCustomToCart');
add_action('wp_ajax_nopriv_addCustomToCart', 'addCustomToCart');

function addCustomToCart() {
    ob_start();
    $name        = (isset($_POST['name']) && !empty($_POST['name'])) ? $_POST['name'] : false;
    $product_id        = (isset($_POST['product_id']) && !empty($_POST['product_id'])) ? $_POST['product_id'] : false;
    $quantity          = (isset($_POST['qty']) && !empty($_POST['qty'])) ? $_POST['qty'] : false;
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
    $product_status    = get_post_status( $product_id );

    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity ) && 'publish' === $product_status )
    {
        do_action( 'woocommerce_ajax_added_to_cart', $product_id );
        wc_add_to_cart_message( $product_id );
        $err = array(
            'err' => 1,
            'msg' => 'Bạn đã đặt '.$name. ' thành công.',
        );
        wp_send_json( $err );
    }
    else
    {
        // If there was an error adding to the cart, redirect to the product page to show any errors
        $err = array(
            'error'       => 0,
            'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
        );

        wp_send_json( $err );
    }


}