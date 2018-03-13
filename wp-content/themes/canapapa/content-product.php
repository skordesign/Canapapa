<div class="col-sm-8 col-md-9 col-lg-9 main-sec">
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb dashed-border">
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active"><a href="products.html"><?php the_title(); ?></a></li>
            </ol>
        </div>
        <div class="col-sm-12">
            <div class="dashed-border ">
                <ul class="list-inline view-style top-menu row">
                    <li class="col-sm-3 col-md-2">
                        <select class="selectpicker" style="display: none;">
                            <option>Sắp xếp</option>
                            <option>Tên</option>
                            <option>Giá</option>
                        </select><div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle selectpicker btn-select" data-toggle="dropdown" title="Sắp xếp"><span class="filter-option pull-left">Sắp xếp</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner selectpicker" role="menu"><li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Sắp xếp</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="1"><a tabindex="0" class="" style=""><span class="text">Tên</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="2"><a tabindex="0" class="" style=""><span class="text">Giá</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div>
                    </li>
                    <li class="col-sm-3 col-md-2">
                        <select class="selectpicker" style="display: none;">
                            <option>Hiển thị</option>
                            <option>9</option>
                            <option>12</option>
                            <option>15</option>
                        </select><div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle selectpicker btn-select" data-toggle="dropdown" title="Hiển thị"><span class="filter-option pull-left">Hiển thị</span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner selectpicker" role="menu"><li rel="0" class="selected"><a tabindex="0" class="" style=""><span class="text">Hiển thị</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="1"><a tabindex="0" class="" style=""><span class="text">9</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="2"><a tabindex="0" class="" style=""><span class="text">12</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li><li rel="3"><a tabindex="0" class="" style=""><span class="text">15</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li></ul></div></div>
                    </li>
                    <li class="text-right col-sm-6 col-md-8">
                        <div class="btn-group">
                            <button id="grid" class="btn btn-primary hvr-underline-from-center-primary"> <span class="ion-android-apps"></span> </button>
                            <button id="list" class="btn btn-primary hvr-underline-from-center-primary"> <span class="ion-android-menu"></span> </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div id="products" class="row">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 product-item-container effect-wrap effect-animate">
                            <div class="product-main">
                                <div class="product-view">
                                    <figure class="double-img">
                                        <a href="product-details.html"><img class="btm-img" src="" width="215" height="240" alt="" data-pagespeed-url-hash="4273646131" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> <img class="top-img" src="" width="215" height="240" alt="" data-pagespeed-url-hash="4089456764" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                                    </figure>
                                    <span class="label offer-label-left">Mới</span> </div>
                                <div class="product-btns  effect-content-inner">
                                    <p class="effect-icon"> <a href="#" class="hint-top" data-hint="Thêm vào giỏ hàng"><span class="cart ion-bag"></span></a></p>
                                    <p class="effect-icon"> <a data-toggle="modal" data-target="#quick-view-box" class="hint-top" data-hint="Xem nhanh"><span class="ion-ios-eye view"></span> </a></p>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a href="product-details.html"><?php the_title(); ?></a></h3>
                                <p class="group inner list-group-item-text"><?php the_content(); ?></p>
                                <div class="product-price">
                                    <span class="real-price text-info">
                                        <span class="real-price text-info"><strong>105.000₫</strong></span></span>
                                        <span class="old-price">70.000₫</span>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php else : ?>
                            <?php get_template_part( 'content', 'none' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <nav role="navigation">
                        <ul class="cd-pagination">
                            <li class="button"><a href="#0">Trước</a> </li>
                            <li><a href="#">1</a> </li>
                            <li><a href="#">2</a> </li>
                            <li><a href="#" class="current">3</a> </li>
                            <li><a href="#">4</a> </li>
                            <li><span>...</span> </li>
                            <li><a href="#">20</a> </li>
                            <li class="button"><a href="#0">Sau</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>