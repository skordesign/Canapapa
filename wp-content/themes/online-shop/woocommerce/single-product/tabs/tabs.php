<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$trademark = get_post_custom(get_the_ID(), '_custom_product_trademark_metabox', true);
$package = get_post_custom(get_the_ID(), '_custom_product_package', true);
$origin = get_post_custom(get_the_ID(), '_custom_product_origin', true);
$production = get_post_custom(get_the_ID(), '_custom_product_production', true);
$user_manual = get_post_custom(get_the_ID(), '_custom_product_user_manual', true);

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $tabs as $key => $tab ) : ?>
                <?php if($key != 'pwb_tab'): ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
                <?php endif; ?>
			<?php endforeach; ?>
            <li class="guide_tab" id="tab-title-guide" role="tab" aria-controls="tab-guide">
                <a href="#tab-guide">Hướng dẫn sử dụng</a>
            </li>
            <li class="params_product" id="tab-title-params_product" role="tab" aria-controls="params-product">
                <a href="#params-product">Thông số sản phẩm</a>
            </li>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>
		<?php endforeach; ?>
            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--guide_tab panel entry-content wc-tab" id="tab-guide" role="tabpanel" aria-labelledby="tab-title-guide_tab">
                <p><?php echo $user_manual['_custom_product_user_manual'][0] ?></p>
            </div>
            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--params_product panel entry-content wc-tab" id="params-product" role="tabpanel" aria-labelledby="tab-title-params_product">
                <table cellspacing="0" cellpadding="0" border="0" class="tb_info_sanpham">
                    <tbody>
                    <?php if($trademark['_custom_product_trademark_metabox']) : ?>
                        <tr>
                            <td class="col_tb_info_sp bg_info_sp">Thương Hiệu</td>
                            <td><?php echo $trademark['_custom_product_trademark_metabox']['0']; ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($origin['_custom_product_origin']) : ?>
                        <tr>
                            <td class="col_tb_info_sp bg_info_sp">Xuất xứ</td>
                            <td><?php echo $origin['_custom_product_origin']['0'] ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($package['_custom_product_package']) : ?>
                        <tr>
                            <td class="col_tb_info_sp bg_info_sp">Quy cách đóng gói</td>
                            <td><?php echo $package['_custom_product_package']['0'] ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if($production['_custom_product_production']) : ?>
                        <tr>
                            <td class="col_tb_info_sp bg_info_sp">Nơi sản xuất</td>
                            <td><?php echo $production['_custom_product_production']['0'] ?></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
	</div>

<?php endif; ?>
