<?php
//get all categories
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
<section id="section_menu_site">
    <div class="container relative">
        <div id="hamber_menu" class="relative">
            <a class="txt_color_1" href=""><i class="fa fa-bars" aria-hidden="true"></i>
                DANH MỤC SẢN PHẨM
            </a>
            <div id="sub_menu_web">
                <div class="col_menu_cap1">
                    <?php if($all_categories) : ?>
                    <?php foreach ($all_categories as $cate) : ?>
                    <div class="sub_item_menu">
                                <?php if($cate->parent == 0 ) :
                                    // get the thumbnail id using the queried category term_id
                                    $thumbnail_id = get_woocommerce_term_meta( $cate->term_id, 'thumbnail_id', true );
                                    // get the image URL
                                    $image = wp_get_attachment_url( $thumbnail_id );
                                    ?>
                                    <a alt="<?php echo $cate->name ?>" class="parent_menu" href="<?php echo get_category_link($cate->term_id) ?>">
                                        <b><?php echo $cate->name ?></b><em class="fa fa-angle-right"> </em>
                                    </a>
                                <?php endif; ?>

                                <div class="conten_hover_submenu" style="display: none;">
                                    <div class="col_hover_submenu">
                                        <?php foreach ($all_categories as $child_cate) : ?>
                                            <?php if($child_cate->parent == $cate->term_id) :
                                                ?>
                                                <a href="<?php echo get_category_link($child_cate->term_id) ?>">
                                                    <strong><?php echo $child_cate->name ?></strong>
                                                </a>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <a class="img_banner_landdin_page" href="<?php echo get_category_link($cate->term_id) ?>">
                                        <img src="<?php echo $image ?>" alt="" width="530" height="400">
                                    </a>
                                </div>

                            </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php
        $menuLocations = get_nav_menu_locations();
        $menuID = $menuLocations['primary'];
        $primaryNav = wp_get_nav_menu_items($menuID);
        ?>
        <?php if($primaryNav) : ?>
        <?php foreach ($primaryNav as $menu) : ?>
        <a href="<?php echo $menu->url ?>" class="item_menu_web text-uppercase item_block_ipad"><?php echo $menu->title ?></a>
        <?php endforeach; ?>
        <?php endif; ?>
</section>