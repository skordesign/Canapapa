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
    <!--    slider-->
    <?php get_template_part('slider') ?>
    <div class="middle-se">
        <!--        hàng mới về    -->
        <?php get_template_part('templates/products/new', 'product'); ?>
        <!--        quảng cáo    -->
        <?php get_template_part('templates/advertise/content', 'advertise') ?>
        <!--        sản phẩm mới    -->
        <?php get_template_part('templates/products/product', 'new') ?>
        <!--        danh mục sản phẩm    -->
        <?php get_template_part('category', 'product') ?>
        <!--        danh mục thương hiệu   -->
        <?php get_template_part('trademark') ?>
        <!--        tin tức thời trang   -->
        <?php get_template_part('templates/news/news', 'fashion') ?>
        <!--        sản phẩm mua nhiều   -->
        <?php get_template_part('templates/products/multiple', 'products') ?>
        <!--        tin tức   -->
        <?php get_template_part('templates/news/news', 'posts') ?>
    </div>

    <?php get_footer(); ?>
</div>
</body>
</html>
