<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <?php wp_head(); ?>
</head>
<body>
<div class="page-wrapper hidden_mobile">
    <header id="wrapper_header" class="page-header">
        <div class="header content">
            <?php get_template_part('header') ?>
            <?php get_template_part('menu-page') ?>
        </div>
    </header>
    <?php
    global $getProductDetail;
    global $wp, $product_cat;
    $getProductDetail = get_post();
    $product_cat = explode('=', $wp->query_string);
    ?>
    <main id="maincontent" class="page-main">
        <div class="columns container">
            <div class="column main">
                <section class="container">
                    <div class="row">
                        <div class="col-sm-12 equal-height-container">
                            <?php if(is_product_category($product_cat['1'])) : ?>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-3 main-sec">
                                    <?php get_template_part('templates/archive', 'category'); ?>
                                    <?php get_template_part('templates/archive', 'trademark'); ?>
                                    <?php get_template_part('templates/archive', 'tags'); ?>
                                </div>
                                <div class="col-sm-8  col-md-9 col-lg-9 sub-data-left sub-equal">
                                    <?php get_template_part('templates/title', 'product') ?>
                                    <?php get_template_part('templates/search', 'product') ?>
                                    <?php get_template_part('content') ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(is_product()) : ?>
                            <div class="row">
                                <div class="col-sm-8  col-md-9 col-lg-9 sub-data-left sub-equal">
                                    <div class="row">
                                        <?php get_template_part('templates/title', 'product') ?>
                                        <?php get_template_part('templates/products/detail', 'content') ?>
                                        <?php get_template_part('templates/products/desc', 'product') ?>
                                        <?php get_template_part('templates/products/relasionship', 'product') ?>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-lg-3 main-sec">
                                    <?php get_template_part('templates/archive', 'transport'); ?>
                                    <?php get_template_part('templates/archive', 'product-trademark'); ?>
                                    <?php get_template_part('templates/archive', 'tags'); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

            </div>
        </div>

    </main>
    <?php get_footer(); ?>
</div>
</body>
</html>

