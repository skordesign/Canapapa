<?php
$params = array('posts_per_page' => 8, 'post_type' => 'slider');
$wp_slider = new WP_Query($params);
?>
<div class="main_top_story">
    <div class="item_banner_big_top" id="slider_item_big_top">
        <div class="flexslider">
            <ul class="slides">
                <?php if ($wp_slider->have_posts()) : ?>
                <?php while ($wp_slider->have_posts()) : $wp_slider->the_post();
                $src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array(600, 172), false, '');
                ?>
                <li>
                    <a title="<?php the_title() ?>" target="_parent"
                       href="<?php get_permalink(get_the_ID()) ?>">
                        <img alt="<?php the_title() ?>" src="<?php echo $src['0'] ?>"
                             draggable="false">
                    </a>
                </li>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>

    <div class="box_quality_all">
        <div class="title_box text-center">
            <h3 class="txt_color_1 text-uppercase">Chất lượng cho tất cả</h3>
        </div>
        <div class="content_box">
            <div class="quaility_item">
                <div class="thumb_quality">
                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_quality_1.jpg"
                         alt="Thanh toán khi nhận hàng">
                </div>
                <div class="text_quality">Thanh toán khi nhận hàng</div>
            </div>
            <div class="quaility_item">
                <div class="thumb_quality">
                    <img class="image_giaohang_2"
                         src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/delivery_70X70.png">
                    <img class="image_giaohang_new"
                         src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/new_03.png">
                </div>
                <div class="text_quality"> Giao hàng <br> dưới 120 phút</div>
            </div>
            <div class="quaility_item">
                <div class="thumb_quality">
                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_quality_3.jpg"
                         alt="">
                </div>
                <div class="text_quality">14 ngày đổi trả miễn phí</div>
            </div>
            <div class="quaility_item">
                <div class="thumb_quality">
                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_quality_4.jpg"
                         alt="">
                </div>
                <div class="text_quality">Hàng <br> chính hãng</div>
            </div>
            <div class="clearfix"></div>

            <div class="block_hotline">
                <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_hotline.png"
                     alt="" class="img_hotline">
                <div class="txt_hotline">
                    Dịch vụ CSKH chu đáo <br> Hotline: <b>1900 636 900</b>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>

</div>