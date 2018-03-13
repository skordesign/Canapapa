<?php
$params = array('posts_per_page' => 10, 'post_type' => 'trademark');
$wc_trademarks = new WP_Query($params);
?>


<section class="container" data-speed="6">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary">Thương hiệu</h3>
            <small> Cam kết sản phẩm chính hãng từ những thương hiệu nổi tiếng</small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div id="brands"
             class="col-sm-12 opacity-eff wow fadeIn slick-initialized slick-slider animated animated"
             data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
            <div aria-live="polite" class="slick-list draggable" tabindex="0">
                <div class="slick-track"
                     style="opacity: 1; width: 4680px; transform: translate3d(-2574px, 0px, 0px);">
                    <?php if ($wc_trademarks->have_posts()) : ?>
                        <?php while ($wc_trademarks->have_posts()) : $wc_trademarks->the_post();
                            ?>
                            <?php
                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_trademarks->post->ID));
                            ?>
                            <div class="slick-slide" data-slick-index="-5" aria-hidden="true"
                                 style="width: 204px;">
                                <a href="#">
                                    <figure><img width="200" height="100" alt="<?php the_title(); ?>" data-pagespeed-url-hash="1164501970"
                                                 src="<?php echo $featured_image['0'] ?>"
                                        >
                                    </figure>
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
            </div>


        </div>
    </div>
</section>