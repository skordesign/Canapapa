<?php
    get_header()
?>
<div class="content-wrap" data-effect="lnl-push">
    <?php get_template_part( 'header', 'canapapa' ); ?>
    <nav class="navbar navbar-default navbar-static-top line-navbar-two">
        <div class="container">
            <div class="collapse navbar-collapse" id="line-navbar-collapse-2">
                <?php get_template_part( 'menu' ); ?>
                <?php get_template_part( 'search', 'form' ); ?>
            </div>
        </div>
    </nav>
    <div id="banner" class="slick-initialized slick-slider">
        <?php get_template_part( 'content', 'slider' ); ?>
    </div>
    <div class="middle-se">
        <?php get_template_part( 'templates/products/new', 'product' ); ?>

        <section class="container">

            <div class="row">
                <?php get_template_part( 'templates/delivery/free', 'delivery' ); ?>
            </div>
        </section>

        <?php get_template_part( 'templates/products/product', 'new' ); ?>

        <?php get_template_part( 'category', 'product' ); ?>

        <?php get_template_part( 'trademark'); ?>

        <?php get_template_part( 'templates/news/news', 'fashion'); ?>

        <?php get_template_part( 'templates/products/multiple', 'products'); ?>
        <?php get_template_part( 'templates/news/new', 'posts'); ?>
    </div>

<?php
    get_footer();
?>