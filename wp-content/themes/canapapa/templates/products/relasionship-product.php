<?php
global $product;
$id_relationship_product = wc_get_related_products($product->ID);

$args = array(
    'post_type' => 'product',
    'post__in' => $id_relationship_product,
    'posts_per_page'    => 4
);
$wc_relationship_product = new WP_Query($args);

?>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <h5 class="sub-title text-primary text-uppercase"><?php esc_attr_e('Relationship product') ?></h5>
        </div>
        <?php if ($wc_relationship_product->have_posts()) : ?>
        <?php while ($wc_relationship_product->have_posts()) : $wc_relationship_product->the_post();
        global $product;
                $discount = (100 - ($product->price / $product->regular_price)*100);
        ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 product-item-container effect-wrap effect-animate">
            <div class="product-main">
                <div class="product-view">
                    <?php
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_new_product->ID), array(263, 240), false, '');
                    ?>
                    <figure class="double-img">
                        <a href="<?php echo get_permalink($product->ID) ?>">
                            <img class="btm-img" width="215" height="240" alt="<?php the_title(); ?>" src="<?php echo $featured_image['0'] ?>">
                            <img class="top-img" width="215" height="240" alt="<?php the_title(); ?>" src="<?php echo $featured_image['0'] ?>">
                        </a>
                    </figure>
                    <span class="label offer-label-left">bán chạy</span>
                    <span class="label offer-label-right"><?php echo round($discount, 2); ?>% giảm</span></div>
                <div class="product-btns  effect-content-inner">
                    <p class="effect-icon">
                        <a href="<?php echo $product->add_to_cart_url() ?>" class="hint-top" data-hint="Thêm vào giỏ hàng">
                            <span class="cart ion-bag"></span></a>
                    </p>
                    <p class="effect-icon">
                        <a data-toggle="modal" data-target="#quick-view-box" data-id="<?php echo get_the_ID() ?>" class="hint-top" data-hint="Xem nhanh">
                            <span class="ion-ios-eye view"></span> </a></p>
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-name"><a href="<?php echo get_permalink($product->ID) ?>"><?php the_title(); ?></a></h3>
            </div>
            <div class="product-price">
                <span class="real-price text-info"><strong><?php echo number_format($product->price, 0, '.', ',') ?>đ</strong></span>
                <span class="old-price"><?php echo number_format($product->regular_price, 0, '.', ','); ?>đ</span>
            </div>
        </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p>
                <?php _e('No Products'); ?>
            </p>
        <?php endif; ?>
    </div>
</div>