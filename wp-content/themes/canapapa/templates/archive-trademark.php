<?php
$params = array('posts_per_page' => 10, 'post_type' => 'trademark');
$wc_trademark = new WP_Query($params);

?>

<section>
    <h5 class="sub-title text-info text-uppercase"><?php esc_attr_e( 'Trademark'); ?></h5>
    <ul class="list-group nudge">
        <?php if($wc_trademark->have_posts()) : ?>
        <?php while ($wc_trademark->have_posts()) : $wc_trademark->the_post(); ?>
        <li class="list-group-item"><a href="<?php echo get_permalink($wc_trademark->ID) ?>"><?php the_title() ?></a></li>
        <?php endwhile; ?>
        <?php endif; ?>
    </ul>
</section>