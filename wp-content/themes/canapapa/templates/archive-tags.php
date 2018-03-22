<?php
$args = array(
    'number'     => 15,
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
    'include'    => $ids,
);
$tags = get_terms( 'product_tag', $args) ;
?>
<section class="col-sm-12 tags">
    <h5 class="sub-title text-info text-uppercase"><?php esc_attr_e( 'Tags'); ?></h5>
    <?php if($tags) : ?>
    <?php foreach ($tags as $tag) : ?>
    <a href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name ?></a>
    <?php endforeach; ?>
    <?php endif; ?>
</section>