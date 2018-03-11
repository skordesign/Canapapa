<section class="container">
    <div class="row">
        <div class="col-sm-12 big-title text-uppercase text-center">
            <h3 class="text-primary">Sản phẩm mới</h3>
            <small>Luôn cập nhật những sản phẩm mới nhất đem đến tay khách hàng</small>
            <p><span class="ion-android-star-outline"></span></p>
        </div>
        <div class="col-sm-12">
            <div id="new-arrivals" class="col-sm-12 accordion wow fadeIn animated animated" data-wow-offset="10"
                 data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">
                <div role="tabpanel">
                    <div class="centered-pills">
                        <ul id="new-items" class="nav nav-tabs nav-pills hidden-xs" role="tablist">
                            <li role="presentation" class="active"><a href="#men" aria-controls="men" role="tab"
                                                                      data-toggle="tab">Dưỡng thể</a></li>
                            <li role="presentation"><a href="#women" aria-controls="women" role="tab"
                                                       data-toggle="tab"> Trang điểm</a></li>
                            <li role="presentation"><a href="#children" aria-controls="children" role="tab"
                                                       data-toggle="tab"> Sửa tắm</a></li>
                        </ul>
                        <div class="panel-group visible-xs" id="new-items-accordion"></div>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class=" row tab-pane fade in active clearfix" id="men">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 product-item-container effect-wrap effect-animate"
                                 style="display: block;">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                    <?php get_template_part( 'templates/products/components/nursing', 'archive-product' ); ?>
                                <?php endwhile; ?>
                                <?php else : ?>
                                    <?php get_template_part( 'content', 'none' ); ?>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div role="tabpanel" class="row tab-pane fade in clearfix" id="women">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 product-item-container effect-wrap effect-animate"
                                 style="display: block;">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                    <?php get_template_part( 'templates/products/components/makeup', 'archive-product' ); ?>
                                <?php endwhile; ?>
                                <?php else : ?>
                                    <?php get_template_part( 'content', 'none' ); ?>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div role="tabpanel" class="row tab-pane fade in clearfix" id="children">
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 product-item-container effect-wrap effect-animate"
                                 style="display: block;">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                    <?php get_template_part( 'templates/products/components/shampoo', 'archive-product' ); ?>
                                <?php endwhile; ?>
                                <?php else : ?>
                                    <?php get_template_part( 'content', 'none' ); ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>