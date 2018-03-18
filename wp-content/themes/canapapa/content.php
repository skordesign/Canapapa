<?php
$params = array('posts_per_page' => 15, 'post_type' => 'product');
$wc_new_product = new WP_Query($params);
?>
<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <div id="products" class="row">
                <?php if ($wc_new_product->have_posts()) : ?>
                    <?php while ($wc_new_product->have_posts()) : $wc_new_product->the_post();
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_new_product->ID));
                        global $product;
                        $discount = ($product->price / $product->regular_price) * 10;
                        ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 product-item-container effect-wrap effect-animate">
                            <div class="product-main">
                                <div class="product-view">
                                    <figure class="double-img">
                                        <a href="<?php echo get_permalink($product->ID) ?>"><img class="btm-img" src="<?php echo $featured_image['0'] ?>" width="215"
                                                                            height="240" alt="<?php the_title(); ?>"
                                                                            data-pagespeed-url-hash="4273646131">
                                            <img class="top-img" src="<?php echo $featured_image['0'] ?>" width="215" height="240" alt="<?php the_title(); ?>"
                                                 data-pagespeed-url-hash="4089456764"></a>
                                    </figure>
                                    <span class="label offer-label-left">Mới</span></div>
                                <div class="product-btns  effect-content-inner">
                                    <p class="effect-icon"><a href="<?php echo $product->add_to_cart_url() ?>" class="hint-top"
                                                              data-hint="Thêm vào giỏ hàng"><span
                                                    class="cart ion-bag"></span></a></p>
                                    <p class="effect-icon"><a data-toggle="modal" data-target="#quick-view-box"
                                                              class="hint-top" data-hint="Xem nhanh"><span
                                                    class="ion-ios-eye view"></span> </a></p>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a href="<?php echo get_permalink($product->ID) ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="group inner list-group-item-text"><?php the_content(); ?></p>
                                <div class="product-price"><span class="real-price text-info"><span
                                                class="real-price text-info"><strong><?php echo $product->regular_price; ?></strong></span></span>
                                    <span class="old-price"><?php echo $product->price; ?></span></div>
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
        <div class="col-sm-12">
            <nav role="navigation">
                <ul class="cd-pagination">
                    <li class="button"><a href="#0">Trước</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#" class="current">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">20</a></li>
                    <li class="button"><a href="#0">Sau</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>