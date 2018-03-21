<?php
$params = array('posts_per_page' => 10, 'post_type' => 'trademark');
$wc_trademarks = new WP_Query($params);
?>
<section class="container" data-speed="6">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary"><?php esc_attr_e('Trademark'); ?></h3>
            <small> <?php esc_attr_e('Commit to genuine products from well-known brands'); ?></small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div id="brands"  class="col-sm-12 opacity-eff wow fadeIn">
            <div class="slick-track-trademark">
                    <?php if ($wc_trademarks->have_posts()) : ?>
                        <?php while ($wc_trademarks->have_posts()) : $wc_trademarks->the_post();
                            ?>
                            <?php
                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_trademarks->ID));
                            ?>
                            <div>
                                <a href="<?php echo get_permalink($wc_trademarks->ID) ?>">
                                    <figure><img alt="<?php the_title(); ?>"src="<?php echo $featured_image['0'] ?>">
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
</section>