<?php get_header(); ?>
<div class="content-wrap" data-effect="lnl-push">
    <?php get_template_part('header', 'canapapa'); ?>
    <nav class="navbar navbar-default navbar-static-top line-navbar-two">
        <div class="container">
            <div class="collapse navbar-collapse" id="line-navbar-collapse-2">
                <!--        menu    -->
                <?php get_template_part('menu'); ?>
                <!--        search    -->
                <?php get_template_part( 'search'); ?>
            </div>
        </div>
    </nav>
    <div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s"
         style="visibility: visible; animation-duration: 2s;">
        <div class="page-header">
        </div>
        <?php
        global $getProductDetail;
        global $wp, $product_cat;
        $getProductDetail = get_post();
        $product_cat = explode('=', $wp->query_string);
        ?>
        <section class="container">
            <div class="row">
                <div class="col-sm-12 equal-height-container">
                    <div class="row">
                        <div class="col-sm-8  col-md-9 col-lg-9 sub-data-left sub-equal">
                            <div class="row">
                                <?php if(is_product()) : ?>
                                    <?php get_template_part('templates/title', 'product') ?>
                                    <?php get_template_part('templates/products/detail', 'content') ?>
                                    <?php get_template_part('templates/products/desc', 'product') ?>
                                    <?php get_template_part('templates/products/relasionship', 'product') ?>
                                <?php else : ?>
                                    <?php get_template_part('templates/title', 'product') ?>
                                    <?php get_template_part('templates/search', 'product') ?>
                                    <?php get_template_part('content') ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3 col-lg-3 main-sec">
                            <?php if(is_product_category($product_cat['1'])) : ?>
                                <?php get_template_part('templates/archive', 'category'); ?>
                                <?php get_template_part('templates/archive', 'trademark'); ?>
                                <?php get_template_part('templates/archive', 'tags'); ?>
                            <?php else: ?>
                                <?php get_template_part('templates/archive', 'transport'); ?>
                                <?php get_template_part('templates/archive', 'trademark'); ?>
                                <?php get_template_part('templates/archive', 'tags'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php get_template_part('quickview')?>
    <?php get_footer(); ?>
</div>
</body>
</html>