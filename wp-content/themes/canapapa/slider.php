<?php
$params = array('posts_per_page' => 4, 'post_type' => 'slider');
$wp_slider = new WP_Query($params);
?>
<div id="banner" class="slick-initialized slick-slider">
    <div aria-live="polite" class="slick-list draggable" tabindex="0">
        <div class="slick-track" style="opacity: 1; width: 2664px;">
            <?php if ($wp_slider->have_posts()) : ?>
                <?php while ($wp_slider->have_posts()) : $wp_slider->the_post();
                    ?>
                    <?php
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_slider->ID));
                    ?>
                    <div class="item slick-slide" data-slick-index="1" aria-hidden="true"
                         style="width: 1332px; position: relative; left: -1332px; top: 0px; z-index: 900; opacity: 1;">
                        <img
                                class="img-responsive"
                                src="<?php echo $featured_image['0'] ?>"
                                alt="<?php the_title(); ?>"
                        >
                        <div class="slider-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-lg-6 caption-body">
                                        <h2 data-animation="fadeInLeft" class="title fadeInDownBig text-primary">Khuyến
                                            mãi</h2>
                                        <h1 data-animation="fadeInDownBig" class="title fadeInDownBig text-primary"> <?php the_title(); ?></h1>
                                        <p data-animation="fadeInUp"
                                           class="subtitle col-sm-9  fadeInUp text-primary hidden-xs">
                                            <?php the_content(); ?>
                                        </p>
                                        <div class="clearfix"></div>
                                        <a data-animation="fadeIn"
                                           class="btn btn-default fadeInUp hvr-underline-from-center-default hidden-xs"
                                           href="blog-detail.html"> <i class="rm-icon ion-android-star"></i> <span>Xem chi tiết</span>
                                        </a>
                                    </div>
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

    <button type="button" data-role="none" class="slick-prev" aria-label="previous" style="display: block;">
        Previous
    </button>
    <button type="button" data-role="none" class="slick-next" aria-label="next" style="display: block;">Next
    </button>

</div>