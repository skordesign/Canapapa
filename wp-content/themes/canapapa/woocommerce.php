<?php get_header(); ?>
<div class="content-wrap" data-effect="lnl-push">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 ">
                    <a href="index.html" class="navbar-brand"></a>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9 feature hidden-xs">
                    <div class="row">
                        <div class="col-sm-4 feature-box ion-chatbubble-working">
                            <dl class="text-primary text-capitalize">
                                <dt>Tư vấn hỗ trợ</dt>
                                <dd class="text-muted"> Tư vấn hỗ trợ khách hàng 24/7</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4 feature-box ion-android-sync">
                            <dl class="text-primary text-capitalize">
                                <dt>30 Ngày đổi trả miễn phí</dt>
                                <dd class="text-muted">Đổi trả miễn phí cho khách hàng</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4 feature-box ion-lock-combination">
                            <dl class="text-primary text-capitalize">
                                <dt>Cam kết hàng chính hãng</dt>
                                <dd class="text-muted"> Sản phẩm chính hãng, chất lượng.</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
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