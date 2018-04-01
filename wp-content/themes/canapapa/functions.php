<?php
/**
 * Created by PhpStorm.
 * User: nguyentrunghieu
 * Date: 3/9/2018
 * Time: 12:11 AM
 */

add_action('after_setup_theme', 'woocommerce_support');
/**
 * Add theme support
 */
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

/**
 * Setup theme canapapa
 */
function canapapa_setup_theme()
{
    /**
     * Add menu support
     */
    add_theme_support('menus');
}
add_action('init', 'canapapa_setup_theme');

/**
 * Register script and style
 */
function canapapa_script_enqueue()
{
    #include script css
    wp_enqueue_style('custom-style-1', get_template_directory_uri() . '/css/A.font-awesome.css+style.css,Mcc.Ql9FxO-sfy.css.pagespeed.cf.ho57CWxopf.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-2', get_template_directory_uri() . '/css/A.hint.css+animate.css+bootstrap-select.min.css+jquery.simplecolorpicker.css,Mcc.ITfIRIQ_Aj.css.pagespeed.cf.GwBTqSEMS1.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-3', get_template_directory_uri() . '/css/A.ionicons.min.css+bootstrap.min.css,Mcc.pIcqvJV9g2.css.pagespeed.cf.Oq0_qyyUfs.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-4', get_template_directory_uri() . '/css/canapapa.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-5', get_template_directory_uri() . '/css/slick/slick.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-6', get_template_directory_uri() . '/css/slick/slick-theme.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom-style-7', get_template_directory_uri() . '/css/flexslider/flexslider.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery', get_template_directory_uri() . 'js/jquery.min.js', array('jquery'));
    wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.min.js', array('jquery'));
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'));
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'));



}
add_action('wp_enqueue_scripts', 'canapapa_script_enqueue');

/**
 * Add post image, background, post-formats, html5 support
 */
add_theme_support('post-thumbnails');
add_theme_support('custom-background');
add_theme_support('post-formats', array('aside', 'image', 'video'));

/**
 * Navigation Menus
 */
register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
));

/**
 * Add custom thumbnail sizes
 */
//add_image_size( 'companies_thumb', 120, 120, true);
/* Adding image sizes*/
add_filter( 'intermediate_image_sizes_advanced','set_thumbnail_size_by_post_type', 10);
function set_thumbnail_size_by_post_type( $sizes ) {

    $post_type = get_post_type($_REQUEST['post_id']);

    switch ($post_type) :
        case 'trademark' :
            $sizes['trademark'] = array(
                'width' => 140,
                'height' => 70,
                'crop' => true
            );
            break;
        case 'slider' :
            $sizes['post'] = array(
                'width' => 530,
                'height' => 400,
                'crop' => true
            );
        case 'product' :
            $sizes['post'] = array(
                'width' => 263,
                'height' => 240,
                'crop' => true
            );
            break;
        default :
            $sizes['default'] = array(
                'width' => 200,
                'height' => 200,
                'crop' => true
            );
    endswitch;

    return $sizes;
}
include 'inc/icon_socail.php';
include 'inc/info_web.php';
include 'inc/create_module_slider.php';
include 'inc/create_module_trademark.php';
include 'inc/feature_system.php';
include 'inc/custom_metebox_products.php';
include 'inc/custom_metabox_page.php';

function utf8convert($str) {
	if(!$str) return false;
	$utf8 = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ|Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
	foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
return $str;
}


function xxxx_add_edit_form_multipart_encoding() {

    echo ' enctype="multipart/form-data"';

}
add_action('post_edit_form_tag', 'xxxx_add_edit_form_multipart_encoding');

function xxxx_render_image_attachment_box($post) {

    // See if there's an existing image. (We're associating images with posts by saving the image's 'attachment id' as a post meta value)
    // Incidentally, this is also how you'd find any uploaded files for display on the frontend.
    $existing_image_id = get_post_meta($post->ID,'_xxxx_attached_image', true);
    if(is_numeric($existing_image_id)) {

        echo '<div>';
        $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large', array(266, 266), '', false);
        $existing_image_url = $arr_existing_image[0];
        echo '<img width="266px" height="266px" src="' . $existing_image_url . '" />';
        echo '</div>';

    }

    // If there is an existing image, show it
    if($existing_image_id) {

        echo '<div>Attached Image ID: ' . $existing_image_id . '</div>';

    }

    echo 'Upload image product: <input type="file" name="xxxx_image" id="xxxx_image" />';

    // See if there's a status message to display (we're using this to show errors during the upload process, though we should probably be using the WP_error class)
    $status_message = get_post_meta($post->ID,'_xxxx_attached_image_upload_feedback', true);

    // Show an error message if there is one
    if($status_message) {

        echo '<div class="upload_status_message">';
        echo $status_message;
        echo '</div>';

    }

    // Put in a hidden flag. This helps differentiate between manual saves and auto-saves (in auto-saves, the file wouldn't be passed).
    echo '<input type="hidden" name="trademark_product_save_flag" value="true" />';

}



function xxxx_setup_meta_boxes() {

    // Add the box to a particular custom content type page
    add_meta_box('xxxx_image_box', 'Upload Image Product', 'xxxx_render_image_attachment_box', 'trademark', 'normal', 'high');

}
add_action('admin_init','xxxx_setup_meta_boxes');

function xxxx_update_post($post_id, $post) {

    // Get the post type. Since this function will run for ALL post saves (no matter what post type), we need to know this.
    // It's also important to note that the save_post action can runs multiple times on every post save, so you need to check and make sure the
    // post type in the passed object isn't "revision"
    $post_type = $post->post_type;

    // Make sure our flag is in there, otherwise it's an autosave and we should bail.
    if($post_id && isset($_POST['trademark_product_save_flag'])) {

        // Logic to handle specific post types
        switch($post_type) {

            // If this is a post. You can change this case to reflect your custom post slug
            case 'trademark':

                // HANDLE THE FILE UPLOAD

                // If the upload field has a file in it
                if(isset($_FILES['xxxx_image']) && ($_FILES['xxxx_image']['size'] > 0)) {

                    // Get the type of the uploaded file. This is returned as "type/extension"
                    $arr_file_type = wp_check_filetype(basename($_FILES['xxxx_image']['name']));
                    $uploaded_file_type = $arr_file_type['type'];

                    // Set an array containing a list of acceptable formats
                    $allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png');

                    // If the uploaded file is the right format
                    if(in_array($uploaded_file_type, $allowed_file_types)) {

                        // Options array for the wp_handle_upload function. 'test_upload' => false
                        $upload_overrides = array( 'test_form' => false );

                        // Handle the upload using WP's wp_handle_upload function. Takes the posted file and an options array
                        $uploaded_file = wp_handle_upload($_FILES['xxxx_image'], $upload_overrides);

                        // If the wp_handle_upload call returned a local path for the image
                        if(isset($uploaded_file['file'])) {

                            // The wp_insert_attachment function needs the literal system path, which was passed back from wp_handle_upload
                            $file_name_and_location = $uploaded_file['file'];

                            // Generate a title for the image that'll be used in the media library
                            $file_title_for_media_library = 'your title here';

                            // Set up options array to add this file as an attachment
                            $attachment = array(
                                'post_mime_type' => $uploaded_file_type,
                                'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            );

                            // Run the wp_insert_attachment function. This adds the file to the media library and generates the thumbnails. If you wanted to attch this image to a post, you could pass the post id as a third param and it'd magically happen.
                            $attach_id = wp_insert_attachment( $attachment, $file_name_and_location );
                            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                            $attach_data = wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
                            wp_update_attachment_metadata($attach_id,  $attach_data);

                            // Before we update the post meta, trash any previously uploaded image for this post.
                            // You might not want this behavior, depending on how you're using the uploaded images.
                            $existing_uploaded_image = (int) get_post_meta($post_id,'_xxxx_attached_image', true);
                            if(is_numeric($existing_uploaded_image)) {
                                wp_delete_attachment($existing_uploaded_image);
                            }

                            // Now, update the post meta to associate the new image with the post
                            update_post_meta($post_id,'_xxxx_attached_image',$attach_id);

                            // Set the feedback flag to false, since the upload was successful
                            $upload_feedback = false;


                        } else { // wp_handle_upload returned some kind of error. the return does contain error details, so you can use it here if you want.

                            $upload_feedback = 'There was a problem with your upload.';
                            update_post_meta($post_id,'_xxxx_attached_image',$attach_id);

                        }

                    } else { // wrong file type

                        $upload_feedback = 'Please upload only image files (jpg, gif or png).';
                        update_post_meta($post_id,'_xxxx_attached_image',$attach_id);

                    }

                } else { // No file was passed

                    $upload_feedback = false;

                }

                // Update the post meta with any feedback
                update_post_meta($post_id,'_xxxx_attached_image_upload_feedback',$upload_feedback);

                break;

            default:

        } // End switch

        return;

    } // End if manual save flag

    return;

}
add_action('save_post','xxxx_update_post',1,2);


