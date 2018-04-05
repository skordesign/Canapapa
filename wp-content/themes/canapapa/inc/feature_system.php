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
    $product_id        = (isset($_POST['product_id']) && !empty($_POST['product_id'])) ? $_POST['product_id'] : false;
    $quantity          = (isset($_POST['qty']) && !empty($_POST['qty'])) ? $_POST['qty'] : false;
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
    $product_status    = get_post_status( $product_id );

    if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity ) && 'publish' === $product_status )
    {
        global $woocommerce;
        $count = $woocommerce->cart->cart_contents_count;
        $err = array(
            'err' => 1,
            'msg' => '',
            'count_qty' => $count,
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


