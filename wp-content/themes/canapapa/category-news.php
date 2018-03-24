<?php
$args = array(
    'type'                     => 'post',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => 1,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'taxonomy'                 => 'category',
    'pad_counts'               => false

);
$categories = get_categories( $args );

$params = array('posts_per_page' => 15, 'post_type' => 'post');
$wc_posts = new WP_Query($params);


?>
<div class="col-sm-4 col-md-3 sub-data-right sub-equal">
    <div class="row">
        <section class="col-sm-12">
            <h5 class="sub-title text-info text-uppercase"><?php esc_attr_e( 'Category'); ?></h5>
            <ul class="list-group nudge">
                <?php foreach ($categories as $cate) : ?>
                <li class="list-group-item"><a href="<?php echo get_permalink($cate->term_id) ?>"><?php echo $cate->name ?></a></li>
               <?php endforeach; ?>
            </ul>
        </section>
        <section class="col-sm-12">
            <h5 class="sub-title text-info text-uppercase"><?php esc_attr_e( 'News'); ?></h5>
            <?php if($wc_posts->have_posts()) : ?>
            <?php while ($wc_posts->have_posts()) : $wc_posts->the_post() ;
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
            ?>
            <a href="<?php echo get_permalink(get_the_ID()) ?>">
                <img class="img-responsive" src="<?php echo $featured_image['0'] ?>" width="370" height="50" alt="">
            </a>
            <h5 class="text-uppercase">
                <a href="<?php echo get_permalink(get_the_ID()) ?>"><?php the_title() ?></a>
            </h5>
            <p>
                <?php the_content() ?>
            </p>
            <?php endwhile; ?>
            <?php endif; ?>
        </section>
        <section class="col-sm-12 instagram">
            <h5 class="sub-title text-info text-uppercase">instagram</h5>
            <div class="gallery">
                <img src="" data-pagespeed-url-hash="4273646131" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                <img src="" data-pagespeed-url-hash="273178756" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                <img src="" data-pagespeed-url-hash="567678677" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                <img src="" data-pagespeed-url-hash="862281302" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                <img src="" data-pagespeed-url-hash="1955907379" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                <img src="" data-pagespeed-url-hash="1451178440" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </div>
        </section>
    </div>
</div>