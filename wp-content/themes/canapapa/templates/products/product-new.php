<?php
$taxonomy = 'product_cat';
$orderby = 'name';
$show_count = 0;      // 1 for yes, 0 for no
$pad_counts = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title = '';
$empty = 0;

$params = array(
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
);
$all_categories = get_categories($params);

?>
<section class="container">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary">Sản phẩm mới</h3>
            <small>Luôn cập nhật những sản phẩm mới nhất đem đến tay khách hàng</small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div class="col-sm-12">
            <div id="new-arrivals" class="col-sm-12 accordion wow fadeIn animated animated" data-wow-offset="10"
                 data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
                <div role="tabpanel">
                    <div class="centered-pills">
                        <ul id="new-items" class="nav nav-tabs nav-pills hidden-xs" role="tablist">
                            <?php if ($all_categories) : ?>
                                <?php foreach ($all_categories as $key => $cat) : ?>
                                    <?php
                                    if ($cat->category_parent == 0) :
                                        $slugs[] = $cat->slug;
                                        ?>
                                        <?php if ($key == 0) : ?>
                                        <li role="presentation" class="active"><a href="#<?php echo $cat->slug ?>"
                                                                                  aria-controls="<?php echo $cat->slug ?>"
                                                                                  role="tab"
                                                                                  data-toggle="tab"><?php echo $cat->name ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li role="presentation"><a href="#<?php echo $cat->slug ?>"
                                                                   aria-controls="<?php echo $cat->slug ?>"
                                                                   role="tab"
                                                                   data-toggle="tab"><?php echo $cat->name ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="panel-group visible-xs" id="new-items-accordion"></div>
                    </div>
                    <div class="tab-content">
                        <?php foreach ($slugs as $name) :
                            $params1 = array(
                                'posts_per_page' => 8,
                                'product_cat' => $name,
                                'post_type' => 'product',
                                'orderby' => 'title',
                            );
                            $wc_product = new WP_Query($params1);
                            ?>
                            <?php if ($all_categories) : ?>
                            <?php foreach ($all_categories as $key => $cat) :
                                ?>
                                <?php if ($key == 0 && $cat->slug == $name) : ?>
                                    <div role="tabpanel" class=" row tab-pane fade in active clearfix"
                                     id="<?php echo $name ?>">
                                    <?php if ($wc_product->have_posts()) : ?>
                                        <?php while ($wc_product->have_posts()) : $wc_product->the_post();
                                            global $product;
                                            ?>
                                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 product-item-container effect-wrap effect-animate"
                                                 style="display: block;">
                                                <div class="product-main">
                                                    <?php
                                                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_new_product->post->ID));
                                                    ?>
                                                    <div class="product-view">
                                                        <figure class="double-img">
                                                            <a href="product-details.html"><img class="btm-img"
                                                                                                width="215"
                                                                                                height="240"
                                                                                                alt="<?php the_title(); ?>"
                                                                                                data-pagespeed-url-hash="4273646131"
                                                                                                src="<?php echo $featured_image['0'] ?>"

                                                                                                data-pagespeed-lazy-replaced-functions="1">
                                                                <img class="top-img" width="215" height="240"
                                                                     alt="<?php the_title(); ?>"
                                                                     data-pagespeed-url-hash="4089456764"
                                                                     src="<?php echo $featured_image['0'] ?>"
                                                                ></a>
                                                        </figure>
                                                        <span class="label offer-label-left">Mới</span></div>
                                                    <div class="product-btns  effect-content-inner">
                                                        <p class="effect-icon"><a href="" class="hint-top"
                                                                                  data-hint="Thêm vào giỏ hàng"><span
                                                                        class="cart ion-bag"></span></a></p>
                                                        <p class="effect-icon"><a data-toggle="modal"
                                                                                  data-target="#quick-view-box"
                                                                                  class="hint-top"
                                                                                  data-hint="Xem nhanh"><span
                                                                        class="ion-ios-eye view"></span> </a></p>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h3 class="product-name"><a
                                                                href="product-details.html"><?php the_title(); ?></a>
                                                    </h3>
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
                                </div>
                                <?php else: ?>
                                    <div role="tabpanel" class=" row tab-pane fade in clearfix"
                                         id="<?php echo $name ?>">
                                        <?php if ($wc_product->have_posts()) : ?>
                                            <?php while ($wc_product->have_posts()) : $wc_product->the_post();
                                                global $product;
                                                ?>
                                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 product-item-container effect-wrap effect-animate"
                                                     style="display: block;">
                                                    <div class="product-main">
                                                        <?php
                                                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_new_product->post->ID));
                                                        ?>
                                                        <div class="product-view">
                                                            <figure class="double-img">
                                                                <a href="product-details.html"><img class="btm-img"
                                                                                                    width="215"
                                                                                                    height="240"
                                                                                                    alt="<?php the_title(); ?>"
                                                                                                    data-pagespeed-url-hash="4273646131"
                                                                                                    src="<?php echo $featured_image['0'] ?>"

                                                                                                    data-pagespeed-lazy-replaced-functions="1">
                                                                    <img class="top-img" width="215" height="240"
                                                                         alt="<?php the_title(); ?>"
                                                                         data-pagespeed-url-hash="4089456764"
                                                                         src="<?php echo $featured_image['0'] ?>"
                                                                    ></a>
                                                            </figure>
                                                            <span class="label offer-label-left">Mới</span></div>
                                                        <div class="product-btns  effect-content-inner">
                                                            <p class="effect-icon"><a href="" class="hint-top"
                                                                                      data-hint="Thêm vào giỏ hàng"><span
                                                                            class="cart ion-bag"></span></a></p>
                                                            <p class="effect-icon"><a data-toggle="modal"
                                                                                      data-target="#quick-view-box"
                                                                                      class="hint-top"
                                                                                      data-hint="Xem nhanh"><span
                                                                            class="ion-ios-eye view"></span> </a></p>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-name"><a
                                                                    href="product-details.html"><?php the_title(); ?></a>
                                                        </h3>
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
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
</section>