<?php
global $product_cat;
$wc_new_product = '';

if (is_product_category($product_cat['1']))
{
    $params = array(
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $product_cat['1']
            )
        ),
        'post_type' => 'product',
    );
    $wc_new_product = new WP_Query($params);
}
else if(is_singular('trademark'))
{

    global $post;
    $post_slug=$post->slug;
    echo '<pre>'; print_r(get_the_slug($post->ID)); die();
    $params = array(
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $product_cat['1']
            )
        ),
        'post_type' => 'product',
    );
    $wc_new_product = new WP_Query($params);
}
else
{
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    if(is_page('san-pham-deals'))
    {
        $params = array(
            'posts_per_page' => 15,
            'paged' => $paged,
            'post_type' => 'product',
            'meta_query'     => array(
                'relation' => 'OR',
                array( // Simple products type
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                ),
                array( // Variable products type
                    'key'           => '_min_variation_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            )
        );
        $wc_new_product = new WP_Query($params);
    }
    else
    {
        $postName = (isset($_GET['postname']) && !empty($_GET['postname']) ? $_GET['postname'] : '');

        $params = array();
        $params['paged'] = $paged;
        $params['post_type'] = 'product';
        $params['posts_per_page'] = 15;
        $params['order'] = 'desc';

        if($postName == "name" && isset($_GET['order_by']) && !empty($_GET['order_by'])) {
            $params['order_by'] = $postName;
        } else if ($postName == "price" && isset($_GET['order_by']) && !empty($_GET['order_by'])){
            $params['order_by'] = $postName;
        }
        else if(is_numeric($postName) && isset($_GET['order_by']) && !empty($_GET['order_by'])) {
            $params['posts_per_page'] = $postName;
        } else if(!is_numeric($postName)){
            $params['s'] = $postName;
        }

        $wc_new_product = new WP_Query($params);
    }

}
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
                                        <a href="<?php echo get_permalink($product->ID) ?>">
                                            <img class="btm-img"
                                             src="<?php echo $featured_image['0'] ?>"
                                             width="215"
                                             height="240"
                                             alt="<?php the_title(); ?>"
                                            >
                                            <img class="top-img" src="<?php echo $featured_image['0'] ?>" width="215"
                                                 height="240" alt="<?php the_title(); ?>"
                                                >
                                        </a>
                                    </figure>
                                    <span class="label offer-label-left"></span></div>
                                <div class="product-btns  effect-content-inner">
                                    <p class="effect-icon">
                                        <a href="<?php echo $product->add_to_cart_url() ?>" class="hint-top"
                                           data-hint="Thêm vào giỏ hàng">
                                            <span class="cart ion-bag"></span>
                                        </a>
                                    </p>
                                    <p class="effect-icon">
                                        <a data-toggle="modal" data-target="#quick-view-box" data-id="<?php echo get_the_ID() ?>"
                                           class="hint-top" data-hint="Xem nhanh">
                                            <span class="ion-ios-eye view"></span> </a>
                                    </p>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a
                                            href="<?php echo get_permalink($product->ID) ?>"><?php the_title(); ?></a>
                                </h3>
<!--                                <p class="group inner list-group-item-text">--><?php //wp_trim_words(the_excerpt()) ?><!--</p>-->
                                <div class="product-price">
                                    <span class="real-price text-info"><strong><?php echo number_format($product->price, 0, '.', ',') ?>đ</strong></span>
                                    <span class="old-price"><?php echo number_format($product->regular_price, 0, '.', ','); ?>đ</span>
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
        <div class="col-sm-12">
            <nav role="navigation">
                <ul class="cd-pagination">
                    <li class="button"><?php echo get_next_posts_link('Trước', $wc_new_product->max_num_pages) ?></li>
                    <li class="button"><?php echo  get_previous_posts_link('Sau', $wc_new_product->max_num_pages) ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>