<?php
$params = array('posts_per_page' => 15, 'post_type' => 'product');
$wc_new_product = new WP_Query($params);
?>
<section class="container">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary"> Hàng mới về</h3>
            <small>Một số sản phẩm mới về cửa hàng</small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div id="best-deals" class="col-sm-12 wow fadeIn slick-initialized slick-slider animated animated"
             data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
            <div aria-live="polite" class="slick-list draggable" tabindex="0">
                <div class="slick-track"
                     style="opacity: 1; width: 4102px; transform: translate3d(-1172px, 0px, 0px);">
                    <?php if ($wc_new_product->have_posts()) : ?>
                        <?php while ($wc_new_product->have_posts()) : $wc_new_product->the_post();
                            global $product;
                            $discount = ($product->price / $product->regular_price)*10;
                        ?>
                            <div class="product-item-container effect-wrap effect-animate slick-slide slick-cloned"
                                 data-slick-index="-4" aria-hidden="true" style="width: 263px;">
                                <div class="product-main">
                                    <div class="product-view">
                                        <?php
                                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_new_product->ID));
                                        ?>
                                        <figure class="double-img">
                                            <a href="<?php echo get_permalink($product->ID) ?>"><img class="btm-img" width="215" height="240"
                                                                                alt="<?php the_title(); ?>"
                                                                                data-pagespeed-url-hash="862281302"
                                                                                src="<?php echo $featured_image['0'] ?>"
                                                >
                                                <img class="top-img" width="215" height="240" alt="<?php the_title(); ?>"
                                                     data-pagespeed-url-hash="862281302"
                                                     src="<?php echo $featured_image['0'] ?>"
                                                ></a>
                                        </figure>
                                        <span class="label offer-label-left">bán chạy</span> <span
                                                class="label offer-label-right"><?php echo round($discount, 2); ?>% giảm</span></div>
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
                                    <h3 class="product-name"><a href="<?php echo get_permalink($product->ID) ?>"><?php the_title(); ?></a></h3>
                                </div>
                                <div class="product-price"><span class="real-price text-info"><span
                                                class="real-price text-info"><strong><?php echo $product->regular_price; ?>đ</strong></span></span>
                                    <span
                                            class="old-price"><?php echo $product->price; ?></span>đ</div>
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


            <button type="button" data-role="none" class="slick-prev" aria-label="previous"
                    style="display: block;">Previous
            </button>
            <button type="button" data-role="none" class="slick-next" aria-label="next" style="display: block;">
                Next
            </button>
        </div>
    </div>
</section>