<?php
global $getProductDetail;
//get custom product
$getArrayCustom = get_post_custom($getProductDetail->ID, '_custom_product_trademark_metabox', true);
$nameTrademark = $getArrayCustom['_custom_product_trademark_metabox']['0'];

//get trademark of product
$params = array(
    'posts_per_page' => 6,
    'post_type' => 'product',
    'meta_key' => '_custom_product_trademark_metabox',
    'meta_value' => $nameTrademark,
);
$wc_product = new WP_Query($params);

?>
<div id="box_cungthuonghieu" class="item_box_col_right space_bottom_20">
    <div class="title_common_site">
        Sản phẩm cùng thương hiệu
    </div>
    <div class="content_common_site">
        <div class="list_sanpham_right">
            <?php if ($wc_product->have_posts()) : ?>
            <?php while ($wc_product->have_posts()) : $wc_product->the_post();
                global $product;
                $discount = ($product->price / $product->regular_price)*10;
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
            ?>
            <div class="item_sanpham">
                <a href="<?php echo get_permalink(get_the_ID()) ?>" class="item_shopping txt_link_hasaki">
                    <div class="main_thumb_shopping">
                        <img src="<?php echo $featured_image['0'] ?>" width="150" height="100" alt="<?php the_title() ?>">
                    </div>
                    <div class="info_shopping">
                        <div class="price_item_shopping">
                            <div class="product_shopping text-uppercase"><?php echo $nameTrademark ?></div>
                            <span class="giamoi"><?php echo number_format($product->price, 0, '.', ',') ?>đ</span>
                            <span class="giacu"><?php echo number_format($product->regular_price, 0, '.', ','); ?>đ</span>
                            <span class="discount_percent2"><?php echo round($discount, 2); ?>%</span>
                        </div>
                        <h3 class="block_main_info_hsk">
                            <div class="title_item_shopping vietnam_name"><?php the_title() ?></div>
                        </h3>
                    </div>
                </a>
            </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>
                    <?php _e('No Products'); ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
        <a class="btn_xemthem_cungthuonghieu" href="<?php echo home_url('/trademark/'.str_replace(" ", "-", utf8convert($nameTrademark))); ?>">
            Xem thêm <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>