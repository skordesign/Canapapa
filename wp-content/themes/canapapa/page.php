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
        <?php get_template_part('templates/title', 'page') ?>
        <section class="container equal-height-container">
            <div class="row">
                <div class="col-sm-12">
                        <?php
                            if(is_page('gioi-thieu'))
                            {
                                get_template_part('templates/introduce/content', 'introduce');
                                get_template_part('sidebar', 'right');
                            }
                            else if(is_page('ban-chay'))
                            {
                                echo 'ban chay';
                            }
                            else if(is_page('tin-tuc'))
                            {
                                get_template_part('templates/news/news', 'content');
                                get_template_part('category', 'news');
                            }
                            else if(is_page('lien-he'))
                            {
                                get_template_part('templates/contact/map', 'content');
                            }
                            else if(is_page('gio-hang'))
                            {
                                get_template_part('templates/cart/cart', 'content');
                            }
                            else if(is_page('thanh-toan'))
                            {
                                get_template_part('templates/checkout/checkout', 'content');
                            }
                        ?>
                </div>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</div>
</body>
</html>