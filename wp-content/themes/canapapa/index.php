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
            <?php get_template_part('menu-home') ?>
        </div>
    </header>
    <main id="maincontent" class="page-main">
        <div class="columns container">
            <div class="column main">
                <section id="top_story" class="space_bottom_20">
                    <?php get_template_part('slider') ?>
                </section>
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
        </div>

    </main>
    <?php get_footer(); ?>
</div>
</body>
</html>