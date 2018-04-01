<?php
$params = array('posts_per_page' => 6, 'post_type' => 'product');
$wp_product = new WP_Query($params);
?>

<section class="container" data-speed="2">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary"> <?php esc_attr_e('Sản phẩm mua nhiều'); ?></h3>
            <small> <?php esc_attr_e('Những sản phẩm khách hàng ưa chuộng hiện nay'); ?></small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div class="col-sm-12">
            <div class="row list-inline best-selling wow fadeIn">
                <?php if ($wp_product->have_posts()) : ?>
                    <?php while ($wp_product->have_posts()) : $wp_product->the_post();
                        global $product;
                        ?>
                        <?php
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_product->ID), array(100, 100), false, '');
                        ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <figure><img class="img-responsive" alt="<?php the_title(); ?>"
                                                 src="<?php echo $featured_image['0'] ?>"
                                        >
                                    </figure>
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <h3 class="product-name"><a href="<?php echo get_permalink(get_the_ID()) ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="real-price text-info"><strong><?php echo number_format($product->price, 0, '.', ',') ?>đ</strong></span>
                                        <span class="old-price"><?php echo number_format($product->regular_price, 0, '.', ','); ?>đ</span>
                                    </div>
                                </div>
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
    </div>
</section>