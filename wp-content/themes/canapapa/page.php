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

    <main id="maincontent" class="page-main">
        <div class="columns container">
            <div class="column main">
                <section class="container equal-height-container">
                    <div class="col-sm-12">
                        <?php
                        if(is_page('gio-hang'))
                        {
                            get_template_part('templates/cart/cart', 'content');
                        }
                        else if(is_page('thanh-toan'))
                        {
                            get_template_part('templates/checkout/checkout', 'content');
                        }else if(is_page('san-pham'))
                        {
                            get_template_part('templates/products/product', 'content');
                        }
                        else if(is_page('san-pham-deals'))
                        {
                            get_template_part('templates/products/product', 'content');
                        }else if(is_page('thuong-hieu'))
                        {
                            get_template_part('templates/trademark/trademark', 'content');
                        }
                        ?>
                    </div>
                </section>

            </div>
        </div>

    </main>
    <?php get_footer(); ?>
</div>
</body>
</html>