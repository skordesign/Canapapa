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
<section>
    <h5 class="sub-title text-info text-uppercase ">Danh mục</h5>
    <ul class="list-group nudge">
        <?php if ($all_categories) : ?>
            <?php foreach ($all_categories as $cat) : ?>
                <?php if ($cat->category_parent == 0) : ?>
                    <li class="list-group-item"><a
                                href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>"><?php echo $cat->name ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</section>