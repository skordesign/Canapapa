<?php
global $getProductDetail;
$regular_price = get_post_meta($getProductDetail->ID, '_regular_price', true);
$sale_price = get_post_meta($getProductDetail->ID, '_sale_price', true);
$sku = get_post_meta($getProductDetail->ID, '_sku', true);
$stock_status = get_post_meta($getProductDetail->ID, '_stock_status', true);
$attachmentIds = explode(',', get_post_meta($getProductDetail->ID, '_product_image_gallery', true));
$imgUrls = array();
foreach ($attachmentIds as $attachmentId) {
    $imgUrls[] = wp_get_attachment_url($attachmentId);
}
//var_dump($imgUrls); die();
?>

<div class="col-sm-12 product-details">
    <div class="row">
        <div class="col-sm-6">
            <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <?php if ($imgUrls) : ?>
                        <?php foreach ($imgUrls as $key => $image) : ?>
                            <?php if ($key == 0) : ?>
                                <div class="item active">
                                    <span class="inner-zoom" style="position: relative; overflow: hidden;">
                                        <img class="img-responsive" src="<?php echo $image ?>" width="700" height="700"
                                             alt="">
                                        <img src="<?php echo $image ?>" class="zoomImg"
                                             style="position: absolute; top: -27.7262px; left: -50.1051px; opacity: 0; width: 490px; height: 490px; border: none; max-width: none; max-height: none;">
                                    </span>
                                </div>
                            <?php else : ?>
                                <div class="item">
                                    <span class="inner-zoom" style="position: relative; overflow: hidden;">
                                        <img class="img-responsive" src="<?php echo $image ?>" width="700" height="700"
                                             alt="<?php $getProductDetail->post_title ?>">
                                        <img src="<?php echo $image ?>" class="zoomImg"
                                             style="position: absolute; top: -27.7262px; left: -50.1051px; opacity: 0; width: 490px; height: 490px; border: none; max-width: none; max-height: none;">
                                    </span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="carousel-link clearfix">
                    <?php if ($imgUrls) : ?>
                        <?php foreach ($imgUrls as $key => $image) : ?>
                            <div data-target="#carousel" data-slide-to="<?php echo $key ?>" class="thumb"><img
                                        src="<?php echo $image ?>" alt="<?php $getProductDetail->post_title ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 sub-info">
            <div class="product-name">
                <h5 class="text-primary text-uppercase"><?php echo $getProductDetail->post_title ?></h5>
            </div>
            <div class="product-review">
                <p><a href="#">
                        <small><?php echo $getProductDetail->post_title ?></small>
                    </a></p>
            </div>
            <div class="product-description">
                <h5 class="text-primary text-uppercase">Thông tin nhanh</h5>
                <p> <?php echo $getProductDetail->post_excerpt ?></p>
            </div>
            <div class="product-availability in-stock">
                <p>Tình trạng:
                    <span class="text-info">
                        <?php
                        echo esc_attr_e($stock_status)
                        ?>
                    </span>
                </p>
            </div>
            <div class="product-price clearfix"><span
                        class="pull-left btn btn-primary"><strong><?php echo number_format($regular_price, 0, '.', ','); ?>
                        đ</strong></span> <span class="pull-left btn btn-link"><del><?php echo number_format($sale_price, 0, '.', ','); ?>
                        đ</del></span></div>
            <div class="product-size">
                <div class="product-colors">
                    <h5 class="text-primary text-uppercase">select color</h5>
                    <select name="colorpicker-bootstrap3-form" id="colorpicker-bootstrap3-form" class="form-control"
                            style="display: none;">
                        <option value="#7bd148">Green</option>
                        <option value="#5484ed">Bold blue</option>
                        <option value="#a4bdfc">Blue</option>
                        <option value="#46d6db">Turquoise</option>
                        <option value="#7ae7bf">Light green</option>
                        <option value="#51b749">Bold green</option>
                        <option value="#fbd75b">Yellow</option>
                        <option value="#ffb878">Orange</option>
                        <option value="#ff887c">Red</option>
                        <option value="#dc2127">Bold red</option>
                        <option value="#dbadff">Purple</option>
                        <option value="#e1e1e1">Gray</option>
                    </select><span class="simplecolorpicker inline ionicons"><span class="color" title="Green"
                                                                                   style="background-color: #7bd148;"
                                                                                   data-color="#7bd148" data-selected=""
                                                                                   role="button"
                                                                                   tabindex="0"></span><span
                                class="color" title="Bold blue" style="background-color: #5484ed;" data-color="#5484ed"
                                role="button" tabindex="0"></span><span class="color" title="Blue"
                                                                        style="background-color: #a4bdfc;"
                                                                        data-color="#a4bdfc" role="button"
                                                                        tabindex="0"></span><span class="color"
                                                                                                  title="Turquoise"
                                                                                                  style="background-color: #46d6db;"
                                                                                                  data-color="#46d6db"
                                                                                                  role="button"
                                                                                                  tabindex="0"></span><span
                                class="color" title="Light green" style="background-color: #7ae7bf;"
                                data-color="#7ae7bf" role="button" tabindex="0"></span><span class="color"
                                                                                             title="Bold green"
                                                                                             style="background-color: #51b749;"
                                                                                             data-color="#51b749"
                                                                                             role="button"
                                                                                             tabindex="0"></span><span
                                class="color" title="Yellow" style="background-color: #fbd75b;" data-color="#fbd75b"
                                role="button" tabindex="0"></span><span class="color" title="Orange"
                                                                        style="background-color: #ffb878;"
                                                                        data-color="#ffb878" role="button"
                                                                        tabindex="0"></span><span class="color"
                                                                                                  title="Red"
                                                                                                  style="background-color: #ff887c;"
                                                                                                  data-color="#ff887c"
                                                                                                  role="button"
                                                                                                  tabindex="0"></span><span
                                class="color" title="Bold red" style="background-color: #dc2127;" data-color="#dc2127"
                                role="button" tabindex="0"></span><span class="color" title="Purple"
                                                                        style="background-color: #dbadff;"
                                                                        data-color="#dbadff" role="button"
                                                                        tabindex="0"></span><span class="color"
                                                                                                  title="Gray"
                                                                                                  style="background-color: #e1e1e1;"
                                                                                                  data-color="#e1e1e1"
                                                                                                  role="button"
                                                                                                  tabindex="0"></span></span>
                </div>
            </div>
            <div class="product-quantity">
                <h5 class="text-primary text-uppercase">Số lượng</h5>
                <div class="qty-btngroup clearfix pull-left">
                    <button type="button" class="minus">-</button>
                    <input type="text" value="1">
                    <button type="button" class="plus">+</button>
                </div>
                <a href="#" class="btn btn-primary pull-left hvr-underline-from-center-primary">THêm giỏ hàng</a></div>
        </div>
    </div>
    <hr>
</div>