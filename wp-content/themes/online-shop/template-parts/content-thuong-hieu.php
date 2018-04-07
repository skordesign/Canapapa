<?php
/**
 * Created by PhpStorm.
 * User: HD088
 * Date: 4/7/2018
 * Time: 6:36 PM
 */

    $brand = array(
        '0-9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'R', 'S', 'T',
        'U', 'V', 'W', 'Y', 'Z',
    );

?>
<section id="wrapper_container">
    <div id="brand_page">
        <div class="brand_thuongthieu">
            <div class="title_folder space_bottom_10">Xem thương hiệu</div>
            <div class="list_aphabet">
                <?php foreach ($brand as $value) : ?>
                <a class="txt_color_1 txt_22" href="#brand_<?php echo $value ?>"> <?php echo $value ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php foreach ($brand as $item) : ?>
        <?php
            $query = "
                    SELECT      *
                    FROM        $wpdb->posts
                    WHERE       $wpdb->posts.post_title LIKE '$item%'
                    AND         $wpdb->posts.post_type = 'trademark'
                    AND         $wpdb->posts.post_status != 'auto-draft'
                    ORDER BY    $wpdb->posts.post_title
            ";
            $wc_trademark = $wpdb->get_results($query);
        ?>
        <?php if(!empty($wc_trademark)) : ?>
        <div class="brand_thuonghieu_item space_bottom_10">
            <div id="brand_<?php echo $item ?>" class="title_row_thuongthieu space_bottom_20 text-uppercase"><?php echo $item ?></div>
            <div class="row list_thuonghieu_item">
                <?php foreach ($wc_trademark as $value) :
                    $src = wp_get_attachment_image_src(get_post_thumbnail_id($value->ID), array(138, 69), false, '');
                    $existing_image_id = get_post_meta($value->ID,'_xxxx_attached_image', true);
                    $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large', array(266, 266), '', false);
                    $existing_image_url = $arr_existing_image[0];
                ?>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 space_bottom_10">
                    <div class="thumb_thuonghieu">
                        <a href="<?php echo get_permalink($value->ID) ?>"><img alt="<?php echo $value->post_title ?>" src="<?php echo $existing_image_url ?>"></a>
                        <div class="logo_thuongthieu"><a href="<?php echo get_permalink($value->ID) ?>"><img alt="<?php echo $value->post_title ?>" src="<?php echo $src['0'] ?>"></a></div>
                    </div>
                    <h5 class="name_thuonghieu text-center"><a href="<?php echo get_permalink($value->ID) ?>"><?php echo $value->post_title ?></a> </h5>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

    </div>
</section>