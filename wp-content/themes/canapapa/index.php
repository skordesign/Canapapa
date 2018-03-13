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
    <?php
    if ( have_posts() ) :
        get_template_part( 'content');
    else :
        get_template_part( 'content', 'none' );
    endif;

    ?>
    <?php get_footer(); ?>
</div>
</body>
</html>
