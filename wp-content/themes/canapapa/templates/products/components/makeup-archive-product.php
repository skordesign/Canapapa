<?php
$params = array('posts_per_page' => 4, 'post_type' => 'product');
$wc_new_product = new WP_Query($params);
?>
<?php if ($wc_new_product->have_posts()) : ?>
    <?php while ($wc_new_product->have_posts()) : $wc_new_product->the_post();
        global $product; ?>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 product-item-container effect-wrap effect-animate"
             style="display: block;">
            <div class="product-main">
                <div class="product-view">
                    <?php
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_new_product->post->ID));
                    ?>
                    <figure class="double-img">
                        <a href=""><img class="btm-img" width="215"
                                        height="240" alt="<?php the_title(); ?>"
                                        data-pagespeed-url-hash="2334780907"
                                        src="<?php echo $featured_image['0'] ?>"
                            >
                            <img class="top-img" width="215" height="240" alt="<?php the_title(); ?>"
                                 data-pagespeed-url-hash="2334780907"
                                 src="<?php echo $featured_image['0'] ?>"
                            ></a>
                    </figure>
                    <span class="label offer-label-left">mới</span>
                </div>
                <div class="product-btns  effect-content-inner">
                    <p class="effect-icon">
                        <a href="<?php echo $product->get_id(); ?>" class="hint-top" data-hint="Thêm vào giỏ hàng">
                            <span class="cart ion-bag"></span>
                        </a>
                    </p>
                    <p class="effect-icon">
                        <a data-toggle="modal" data-target="#quick-view-box" class="hint-top"
                           data-hint="Xem nhanh">
                            <span class="ion-ios-eye view"></span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-name"><a href=""><?php the_title(); ?></a></h3>
            </div>
            <div class="product-price"><span class="real-price text-info"><span
                            class="real-price text-info"><strong><?php echo $product->regular_price; ?></strong></span></span>
                <span class="old-price"><?php echo $product->price; ?></span></div>
        </div>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else: ?>
    <p>
        <?php _e('No Products'); ?>
    </p>
<?php endif; ?>