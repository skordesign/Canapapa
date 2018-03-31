<?php
$params = array('posts_per_page' => 3, 'post_type' => 'post');
$wc_new_posts = new WP_Query($params);
?>
<section class="container">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary"><?php esc_attr_e('News'); ?></h3>
            <small><?php esc_attr_e('Latest news about cosmetic world'); ?></small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <?php if ($wc_new_posts->have_posts()) : ?>
                    <?php while ($wc_new_posts->have_posts()) : $wc_new_posts->the_post();
                        ?>
                        <?php
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_new_posts->ID));
                        ?>
                        <div class="col-sm-12 col-md-4">
                            <div class="thumbnail">
                                <figure>
                                    <a href="<?php echo get_post_permalink($wc_new_posts->ID) ?>">
                                        <img class="img-responsive" width="1024" height="683" alt="<?php the_title(); ?>" src="<?php echo $featured_image['0'] ?>">
                                    </a>
                                </figure>
                                <div class="caption">
                                    <h4 class="text-uppercase"><a href="<?php echo get_post_permalink($wc_new_posts->ID) ?>"><?php the_title(); ?></a></h4>
                                    <div class="blog-info">
                                        <p class="text-muted">
                                            <span>Bởi
                                            <a href="">Nguyễn Thị Anh</a> /
                                            <a href="">Tư vấn làm đẹp</a> /
                                            <a href="#">3 Nhận xét</a></span>
                                        </p>
                                    </div>
                                    <p><?php the_content(); ?></p>
                                    <hr>
                                    <a href="<?php echo get_post_permalink($wc_new_posts->ID) ?>" class="btn btn-primary hvr-underline-from-center-primary"><?php esc_attr_e('Details'); ?></a></div>
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