<section class="container">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary"> Hàng mới về</h3>
            <small>Một số sản phẩm mới về cửa hàng</small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div id="best-deals" class="col-sm-12 wow fadeIn slick-initialized slick-slider animated animated"
             data-wow-offset="10" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
            <div aria-live="polite" class="slick-list draggable" tabindex="0">
                <div class="slick-track"
                     style="opacity: 1; width: 4102px; transform: translate3d(-1172px, 0px, 0px);">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'templates/products/new', 'archive-product' ); ?>
                    <?php endwhile; ?>
                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>
                </div>
            </div>

            <button type="button" data-role="none" class="slick-prev" aria-label="previous"
                    style="display: block;">Previous
            </button>
            <button type="button" data-role="none" class="slick-next" aria-label="next" style="display: block;">
                Next
            </button>
        </div>
    </div>
</section>