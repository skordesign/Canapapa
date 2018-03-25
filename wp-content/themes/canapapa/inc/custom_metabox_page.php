<?php
/**
 * Created by PhpStorm.
 * User: HD088
 * Date: 3/25/2018
 * Time: 8:33 PM
 */


function custom_slider_meta_box()
{
    add_meta_box("demo-meta-box", "Slider", "custom_meta_box_slider", "page", "side", "high", null);
}

add_action("add_meta_boxes", "custom_slider_meta_box");

function custom_meta_box_slider($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <ul class="order_actions submitbox">
        <li class="wide" id="actions">
            <select style="width: 100%" name="slider_meta_box[]" multiple>
                <?php
                $params = array('post_type' => 'slider');
                $wc_slider = get_posts($params);
                $custom_slider = get_post_custom($object->ID, "_custom_slider_metabox", true);
                $meta_slider_value = $custom_slider['_custom_slider_metabox'];
                $slider = unserialize($meta_slider_value[0]);

                foreach($wc_slider as $key => $val)
                {
                    if(in_array($val->ID, $slider)) {
                        echo '<option selected value="'.$val->ID.'">'.$val->post_title.'</option>';
                    } else {
                        echo '<option value="'.$val->ID.'">'.$val->post_title.'</option>';
                    }

                }
                ?>
            </select>
        </li>
    </ul>
    <?php
}


function slider_save_postdata($post_id) {
    if (array_key_exists('slider_meta_box', $_POST)) {
        update_post_meta(
            $post_id,
            '_custom_slider_metabox',
            $_POST['slider_meta_box']
        );
    }
}
add_action('save_post', 'slider_save_postdata');