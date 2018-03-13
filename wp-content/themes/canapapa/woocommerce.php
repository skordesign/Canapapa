<?php
get_header();
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

    <div class="middle-sec wow fadeIn animated animated" data-wow-offset="10" data-wow-duration="2s"
         style="visibility: visible; animation-duration: 2s;">
        <div class="page-header">
            <div class="container text-center">
                <h2 class="text-primary text-uppercase"> <?php the_title(); ?></h2>
            </div>
        </div>
        <section class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-ad">
                        <figure><img class="img-responsive" src="" width="1170" height="100" alt="" data-pagespeed-url-hash="2102948165"></figure>
                    </div>
                </div>
                <div class="col-sm-12 equal-height-container">
                    <div class="row">
                        <?php get_template_part('sidebar', 'left') ?>
                        <?php get_template_part('content', 'product') ?>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php
get_footer();
?>