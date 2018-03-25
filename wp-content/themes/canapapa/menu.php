<?php
//get all categories
$taxonomy = 'product_cat';
$orderby = 'name';
$show_count = 0;      // 1 for yes, 0 for no
$pad_counts = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title = '';
$empty = 0;

$params1 = array(
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
);
$all_categories = get_categories($params1);


//get id shop
$params2 = array(
    'name' => 'shop',
    'post_type' => 'page',
    'post_status' => 'publish',
    'posts_per_page' => 1,
);
$page_shop = get_posts($params2);
$shop_id = $page_shop['0']->ID;

$custom_slider = get_post_custom($shop_id, "_custom_slider_metabox", true);
$meta_slider_value = $custom_slider['_custom_slider_metabox'];
$arr_slider_ids = unserialize($meta_slider_value[0]);

foreach ($arr_slider_ids as $id) {
    $slider_image[] = wp_get_attachment_image_src(get_post_thumbnail_id($id));
}

?>
<ul class="nav navbar-nav lnt-nav-mega">
    <li class="dropdown" id="cp-menu-dropdown">
        <a href="#" id="cp-menu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="fa fa-dot-circle-o"></span> Danh mục <span
                    class="ion-android-arrow-dropdown"></span> </a>
        <div id="cp-menu-panel" class="dropdown-menu" role="menu">
            <div class="lnt-dropdown-mega-menu">
                <ul class="lnt-category list-unstyled">
                    <?php
                        //lay menu cha
                        foreach ($all_categories as $key => $cate) {
                            $xhtml = '';
                            if($key == 0) {
                                if($cate->parent == 0) {
                                    echo $xhtml .= '<li class="active"><a href="' . get_term_link($cate->slug, 'product_cat') . '">' . $cate->name . '</a></li>';
                                }
                            } else {
                                if($cate->parent == 0) {
                                    echo $xhtml .= '<li><a href="' . get_term_link($cate->slug, 'product_cat') . '">' . $cate->name . '</a></li>';
                                }
                            }
                        }
                    ?>
                </ul>
                <div class="lnt-subcategroy-carousel-wrap container-fluid">
                    <?php foreach($all_categories as $key => $cate) : ?>
                    <?php if($cate->key == 0) : ?>
                        <?php if($cate->parent == 0) : ?>
                            <div id="subcategory-<?php echo $cate->slug ?>">
                            <div class="lnt-subcategory col-sm-8 col-md-8">
                                <h3 class="lnt-category-name text-info text-uppercase"><?php echo $cate->name ?></h3>

                                <ul class="list-unstyled col-sm-6" id="level-<?php echo $cate->term_id?>">
                                    <?php foreach ($all_categories as $key => $child): ?>
                                    <?php if($child->parent==$cate->term_id) :?>
                                    <li>
                                        <a href="<?php echo get_category_link($cate->term_id) ?>"><i class="ion-flag icon"></i>
                                        <?php echo $child->name ?>
                                        </a>
                                    </li>
                                    <?php endif?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div id="carousel-category-home" class="carousel slide"
                                     data-ride="carousel">
                                    <ol class="carousel-indicators" style="display: none;">
                                        <li data-target="#carousel-category-home" data-slide-to="0"
                                            class="active"></li>
                                        <li data-target="#carousel-category-home" data-slide-to="1"
                                            class=""></li>
                                        <li data-target="#carousel-category-home" data-slide-to="2"
                                            class=""></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        <?php foreach ($slider_image as $key => $image) : ?>
                                            <?php if ($key == 0) : ?>
                                                <div class="item active left">
                                                    <img width="296" height="400"
                                                         alt="Slide image"
                                                         src="<?php echo $image['0'] ?>"
                                                    >
                                                </div>
                                            <?php endif; ?>
                                            <div class="item">
                                                <img width="296" height="400" alt="Slide image"
                                                     src="<?php echo $image['0'] ?>"
                                                >
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                            <div id="subcategory-<?php echo $cate->slug ?>">
                                    <div class="lnt-subcategory col-sm-8 col-md-8">
                                        <h3 class="lnt-category-name text-info text-uppercase"><?php echo $cate->name ?></h3>

                                        <ul class="list-unstyled col-sm-6" id="level-<?php echo $cate->term_id?>">
                                            <?php foreach ($all_categories as $key => $child): ?>
                                                <?php if($child->parent==$cate->term_id) :?>
                                                    <li>
                                                        <a href="<?php echo get_category_link($cate->term_id) ?>"><i class="ion-flag icon"></i>
                                                            <?php echo $child->name ?>
                                                        </a>
                                                    </li>
                                                <?php endif?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div id="carousel-category-home" class="carousel slide"
                                             data-ride="carousel">
                                            <ol class="carousel-indicators" style="display: none;">
                                                <li data-target="#carousel-category-home" data-slide-to="0"
                                                    class="active"></li>
                                                <li data-target="#carousel-category-home" data-slide-to="1"
                                                    class=""></li>
                                                <li data-target="#carousel-category-home" data-slide-to="2"
                                                    class=""></li>
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <?php foreach ($slider_image as $key => $image) : ?>
                                                    <?php if ($key == 0) : ?>
                                                        <div class="item active left">
                                                            <img width="296" height="400"
                                                                 alt="Slide image"
                                                                 src="<?php echo $image['0'] ?>"
                                                            >
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="item">
                                                        <img width="296" height="400" alt="Slide image"
                                                             src="<?php echo $image['0'] ?>"
                                                        >
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endif; ?>
                    <?php endif?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </li>
</ul>

<ul class="nav navbar-nav main-nav">
    <?php
    $menuLocations = get_nav_menu_locations();
    $menuID = $menuLocations['primary'];
    $primaryNav = wp_get_nav_menu_items($menuID);
    ?>
    <?php foreach ($primaryNav as $key => $navItem) : ?>
        <?php if($key == 0) : ?>
            <li class="active">
                <a href="<?php echo get_home_url() ?>" class="ion-ios-home"></a>
            </li>
        <?php else : ?>
            <li><a href="<?php echo $navItem->url ?>"><?php echo $navItem->title ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
