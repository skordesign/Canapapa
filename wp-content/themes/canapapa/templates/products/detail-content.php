<?php
global $product, $nameTrademark, $nameOrigin, $nameProduction, $user_manual, $attributes;

$regular_price = get_post_meta($product->ID, '_regular_price', true);
$sale_price = get_post_meta($product->ID, '_sale_price', true);
$sku = get_post_meta($product->ID, '_sku', true);
$stock_status = get_post_meta($product->ID, '_stock_status', true);
$attachmentIds = explode(',', get_post_meta($product->ID, '_product_image_gallery', true));
$nameTrademark = get_post_custom($product->ID, '_custom_product_trademark_metabox', true);
$nameOrigin = get_post_custom($product->ID, '_custom_product_origin', true);
$nameProduction = get_post_custom($product->ID, '_custom_product_production', true);
$user_manual = get_post_custom($product->ID, '_custom_product_user_manual', true);
$product_attributes = get_post_meta($product->ID, '_product_attributes', true);
$default_attributes = get_post_meta($product->ID, '_default_attributes', true);
//echo '<pre>'; print_r($default_attributes   ); die();
foreach ($product_attributes as $key => $attr) {
    $attributes[$attr['name']] = get_the_terms($product, $attr['name']);
}
//echo '<pre>'; print_r($attributes); die();
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
                                             alt="<?php $product->post_title ?>">
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
                                        src="<?php echo $image ?>" alt="<?php $product->post_title ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 sub-info">
            <div class="product-name">
                <h5 class="text-primary text-uppercase"><?php echo $nameTrademark['_custom_product_trademark_metabox']['0'] ?></h5>
            </div>
            <div class="product-review">
                <h5 class="text-primary text-uppercase"><?php echo $product->post_title ?></h5>
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
                <p> <?php echo wp_trim_words($product->post_excerpt) ?></p>
            </div>
            <div class="product-availability">
                <p>Tình trạng:
                    <span class="text-info">
                        <?php
                        if ($stock_status == 'instock') {
                            echo 'Còn hàng';
                        } else {
                            echo 'Hết hàng';
                        }
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
            <?php if(!empty($attributes['pa_image'])) : ?>
            <div class="product_chose_type">
                <div class="control relative">
                    <h5 class="text-primary text-uppercase">Chọn màu sắc</h5>
                    <?php foreach ($attributes['pa_image'] as $key => $attr) :
                        $attachment_id = absint( get_term_meta( $attr->term_id, 'product_attribute_image', TRUE ) );
                        $image = wp_get_attachment_image_url( $attachment_id );
                    ?>
                    <?php if($default_attributes['pa_image'] == $attr->slug) : ?>
                        <a data-toggle="tooltip" title="<?php echo $attr->name  ?>" alt="<?php echo $attr->name  ?>" class="item_chose_type_color configurable_option active" data-attribute-id="149" data-attribute-name="color_detail" data-option-id="2399">
                            <img src="<?php echo $image ?>">
                        </a>
                    <?php else: ?>
                        <a data-toggle="tooltip" title="<?php echo $attr->name  ?>" alt="<?php echo $attr->name  ?>" class="item_chose_type_color configurable_option" data-attribute-id="149" data-attribute-name="color_detail" data-option-id="2399">
                            <img src="<?php echo $image ?>">
                        </a>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($attributes['pa_color'])) : ?>
            <div class="product-size">
                <div class="product-colors">
                    <h5 class="text-primary text-uppercase">Chọn màu sắc</h5>
                    <select name="colorpicker-bootstrap3-form" id="colorpicker-bootstrap3-form" class="form-control"
                            style="display: none;">
                        <?php foreach ($attributes['pa_color'] as $key => $attr) : ?>
                        <option value="<?php echo $attr->name ?>"></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="simplecolorpicker inline ionicons">
                        <?php foreach ($attributes['pa_color'] as $key => $attr) : ?>
                            <?php if($default_attributes['pa_color'] == $attr->slug) : ?>
                        <span class="color" title="Green"
                              style="background-color: <?php echo $attr->name ?>;" data-color="<?php echo $attr->name ?>"
                              data-selected="" role="button" tabindex="0">
                        </span>
                        <?php else: ?>
                        <span class="color" title="Green"
                              style="background-color: <?php echo $attr->name ?>;" data-color="<?php echo $attr->name ?>"
                              role="button" tabindex="0">

                        </span>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </span>

                </div>
            </div>
            <?php endif; ?>

            <?php
                if($attributes['pa_size']) :
            ?>
            <div class="product-size">
                <div class="product-size">
                    <h5 class="text-primary text-uppercase">Chọn size</h5>
                    <?php foreach ($attributes['pa_size'] as $key => $attr) : ?>
                    <button class="product-variation" data-id="<?php echo $attr->term_id ?>"><?php echo $attr->name ?></button>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="product-quantity">
                <h5 class="text-primary text-uppercase">Số lượng</h5>
                <div class="qty-btngroup clearfix pull-left">
                    <button type="button" class="minus">-</button>
                    <input name="quantity" type="text" value="1">
                    <button type="button" class="plus">+</button>
                </div>
                <?php if ($stock_status == 'instock') : ?>
                    <a class="btn btn-primary pull-left hvr-underline-from-center-primary"
                       data-id="<?php echo $product->ID ?>" data-name="<?php echo $product->post_title ?>"
                       id="add_to_cart">Thêm giỏ hàng</a>
                <?php else: ?>
                    <a class="btn btn-primary pull-left hvr-underline-from-center-primary">Thông báo khi có hàng</a>
                <?php endif; ?>
            </div>
            <div class="box-tocart">
                <div class="quick_ship">
                    <img class="image_quick_ship" src="<?php bloginfo('template_url') ?>/images/deliverynow.png"><span
                            id="quickship_info">HCM: Nhận hàng hỏa tốc dưới 120'( trước <span
                                class="txt_color_2">10h</span> ngày mai. Đặt hàng trước <span
                                class="txt_color_2">8h</span> và chọn giao hàng dưới <span
                                class="txt_color_2">120 phút</span> ở bước thanh toán.</span>
                    <a href="" class="txt_color_1" target="_blank">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>