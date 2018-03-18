<?php
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
                    foreach ($all_categories as $key => $cat) {
                        if($key == 0) {
                            if ($cat->category_parent == 0) {
                                $category_id = $cat->term_id;
                                $category_name = $cat->name;
                                echo '<li class="active"><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $category_name . '</a></li>';
                            }
                        }else{
                            if ($cat->category_parent == 0) {
                                $category_id = $cat->term_id;
                                $category_name = $cat->name;
                                echo '<li ><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $category_name . '</a></li>';
                            }
                        }

                    }
                    ?>

                </ul>
                <?php
                $params2 = array(
                    'taxonomy' => $taxonomy,
                    'child_of' => 0,
                    'parent' => $category_id,
                    'orderby' => $orderby,
                    'show_count' => $show_count,
                    'pad_counts' => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li' => $title,
                    'hide_empty' => $empty
                );
                $sub_cats = get_categories($params2);
                ?>
                <div class="lnt-subcategroy-carousel-wrap container-fluid">

                    <div id="subcategory-home" class="active">
                        <div class="lnt-subcategory col-sm-8 col-md-8">
                            <h3 class="lnt-category-name text-info text-uppercase"><?php echo $category_name ?></h3>
                            <?php
                            foreach ($sub_cats as $sub_category) :
                                $sub_category_name = $sub_category->name;
                                $sub_category_id = $sub_category->term_id;
                                ?>
                                <ul class="list-unstyled col-sm-6">
                                    <li><a href="<?php echo get_term_link($sub_category->slug, 'product_cat') ?>"><?php echo $sub_category_name ?></a>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
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
                                    <div class="item next left"><img width="296" height="400"
                                                                     alt="Slide image"
                                                                     data-pagespeed-url-hash="2385484616"
                                                                     src=""
                                        >
                                    </div>
                                    <div class="item"><img width="296" height="400" alt="Slide image"
                                                           data-pagespeed-url-hash="2385484616"
                                                           src=""
                                        >
                                    </div>
                                    <div class="item active left"><img width="296" height="400"
                                                                       alt="Slide image"
                                                                       data-pagespeed-url-hash="2385484616"
                                                                       src="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <?php foreach ($primaryNav as $navItem) : ?>
        <?php if (rtrim($navItem->url, "/") == get_home_url()) : ?>
            <li class="active">
                <a href="<?php echo $navItem->url ?>" class="ion-ios-home"></a>
            </li>
        <?php else : ?>
            <li><a href="<?php echo $navItem->url ?>"><?php echo $navItem->title ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
