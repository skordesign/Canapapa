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
<div id="product_tag" class="item_box_col_right space_bottom_20">
    <div class="title_common_site">
        Tags
    </div>
    <div class="content_common_site">
        <?php if($tags) : ?>
            <?php foreach ($tags as $tag) : ?>
                <a href="<?php echo get_tag_link($tag->term_id) ?>" title="<?php echo $tag->name ?>"><?php echo $tag->name ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
