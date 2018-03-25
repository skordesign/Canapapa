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
                <div class="block_start start_small">
                    <div class="number_start" style="width:100%;"></div>
                    <div class="start_background"></div>
                </div>
                <div class="block_review">
                    <a> 5 đánh giá</a>
                    <span>|</span>
                    <a> 55 Hỏi đáp</a>
                    <span> | </span>
                    <span>MSP: 100550103</span>
                </div>
            </div>
            <div class="product-description">
                <h5 class="text-primary text-uppercase">Thông tin nhanh</h5>
                <p> <?php echo wp_trim_words($getProductDetail->post_excerpt) ?></p>
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
            <div class="product-price clearfix">
                <span class="pull-left btn btn-primary">
                    <strong><?php echo number_format($sale_price, 0, '.', ','); ?>
                        đ</strong>
                </span>
                <span class="pull-left btn">
                    (Đã bao gồm VAT)
                </span>
            </div>
            <div class="product-size">
                <div class="product-colors">
                    <h5 class="text-primary text-uppercase">select color</h5>
                </div>
            </div>
            <div class="product-quantity">
                <h5 class="text-primary text-uppercase">Số lượng</h5>
                <div class="qty-btngroup clearfix pull-left">
                    <button type="button" class="minus" >-</button>
                    <input name="quantity" type="text" value="1">
                    <button type="button" class="plus">+</button>
                </div>
                <a class="btn btn-primary pull-left hvr-underline-from-center-primary" data-id="<?php echo $getProductDetail->ID ?>" data-name="<?php echo $getProductDetail->post_title ?>" id="add_to_cart">Thêm giỏ hàng</a>
            </div>
            <div class="box-tocart">
                <div class="quick_ship">
                    <img class="image_quick_ship" src="<?php bloginfo('template_url') ?>/images/deliverynow.png"><span id="quickship_info">HCM: Nhận hàng hỏa tốc dưới 120'( trước <span class="txt_color_2">10h</span> ngày mai. Đặt hàng trước <span class="txt_color_2">8h</span> và chọn giao hàng dưới <span class="txt_color_2">120 phút</span> ở bước thanh toán.</span>
                    <a href="" class="txt_color_1" target="_blank">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>