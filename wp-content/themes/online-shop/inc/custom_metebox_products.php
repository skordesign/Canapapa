<?php
/**
 * Created by PhpStorm.
 * User: HD088
 * Date: 3/25/2018
 * Time: 8:57 AM
 */
//custom filed product
// The code for displaying WooCommerce Product Custom Fields

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_block_general');

// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_block_general_save');


function woocommerce_product_custom_block_general()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_package',
            'placeholder' => 'Quy cách đóng gói',
            'label' => __('Quy cách đóng gói', 'woocommerce'),
        )
    );
    //Custom Product Origin
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_origin',
            'placeholder' => 'Nguồn góc',
            'label' => __('Nguồn gốc', 'woocommerce'),
        )
    );
    //Custom Product Where production
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_product_production',
            'placeholder' => 'Nơi sản xuất',
            'label' => __('Nơi sản xuất', 'woocommerce'),
        )
    );
    echo '</div>';

}

function woocommerce_product_custom_block_general_save($post_id)
{
    // Custom Product Text Field
    $woocommerce__custom_product_package = $_POST['_custom_product_package'];
    if (!empty($woocommerce__custom_product_package))
        update_post_meta($post_id, '_custom_product_package', esc_attr($woocommerce__custom_product_package));

    $woocommerce_custom_product_trademark = $_POST['_custom_product_trademark'];
    if (!empty($woocommerce_custom_product_trademark))
        update_post_meta($post_id, '_custom_product_trademark', esc_attr($woocommerce_custom_product_trademark));

    $woocommerce_custom_product_origin = $_POST['_custom_product_origin'];
    if (!empty($woocommerce_custom_product_origin))
        update_post_meta($post_id, '_custom_product_origin', esc_attr($woocommerce_custom_product_origin));

    $woocommerce_custom_product_production = $_POST['_custom_product_production'];
    if (!empty($woocommerce_custom_product_production))
        update_post_meta($post_id, '_custom_product_production', esc_html($woocommerce_custom_product_production));

}

function custom_filed_product_user_manual() {
    $screens = ['product'];
    foreach ($screens as $screen) {
        add_meta_box(
            'custom_product_user_manual',           // Unique ID
            'User Manual',  // Box title
            'custom_product_user_manual_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
add_action('add_meta_boxes', 'custom_filed_product_user_manual');

function custom_product_user_manual_box_html($post)
{
    $value = get_post_meta($post->ID, '_custom_product_user_manual', true);
    ?>
    <textarea id name="user_manual_field" id="user_manual_field" class="postbox" cols="130"><?php echo $value; ?></textarea>
    <?php
}

function product_user_manual_save_postdata($post_id) {
    if (array_key_exists('user_manual_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_custom_product_user_manual',
            $_POST['user_manual_field']
        );
    }
}
add_action('save_post', 'product_user_manual_save_postdata');


