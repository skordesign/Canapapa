<?php
/**
 * Plugin Name: WooCommerce NganLuong Gateway
 * Plugin URI: https://www.nganluong.vn/
 * Description: Add-on WooCommerce NganLuong Gateway For WooCommerce 2.6.14
 * Version: 1.0
 * Author: TOBEST
 * Author URI: http://www.tobest.net/
 * License: GPL2
 */
 
/**
 * Plugin dựa trên ý tưởng từ bộ code ví dụ của Ngân lượng. Bản quyền của ngân lượng và DUCLM - 0948389111
 * Chúng tôi đã chỉnh sửa lại và update để phù hợp WooCommerce version mới nhất.
 */

add_action('plugins_loaded', 'woocommerce_payment_nganluong_init', 0);
add_action('parse_request', array(WC_Gateway_NganLuong, 'nganluong_return_handler'));

function woocommerce_payment_nganluong_init() {
    if (!class_exists('WC_Payment_Gateway')){
        return;
	}
	require_once( plugin_basename( 'classes/class-wc-gateway-nganluong.php' ) );
    function woocommerce_add_NganLuong_gateway($methods) {
        $methods[] = 'WC_Gateway_NganLuong';
        return $methods;
    }
    add_filter('woocommerce_payment_gateways', 'woocommerce_add_NganLuong_gateway');
}
