<?php
/**
 * Created by PhpStorm.
 * User: nguyentrunghieu
 * Date: 3/14/2018
 * Time: 12:11 AM
 */


// Custom Post types for trademark on home page
add_action('init', 'create_trademark');
function create_trademark() {
    $trademark_args = array(
        'labels' => array(
            'name' => __( 'Thương hiệu' ),
            'singular_name' => __( 'Thương hiệu' ),
            'add_new' => __( 'Thêm thương hiệu' ),
            'add_new_item' => __( 'Thêm thương hiệu' ),
            'edit_item' => __( 'Chỉnh sửa thương hiệu' ),
            'new_item' => __( 'Thêm mới thương hiệu' ),
            'view_item' => __( 'Hiển thị thương hiệu' ),
            'search_items' => __( 'Tìm kiếm thương hiệu' ),
            'not_found' => __( 'No trademark found' ),
            'not_found_in_trash' => __( 'No trademark found in trash' )
        ),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail',  'author',)
    );
    register_post_type('trademark',$trademark_args);
}
add_filter("manage_feature_edit_columns", "trademark_edit_columns");

function trademark_edit_columns($trademark_columns){
    $trademark_columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Title",
    );
    return $trademark_columns;
}

add_action( 'save_post', 'cd_meta_box_save_trademark' );
function cd_meta_box_save_trademark( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set
    if( isset( $_POST['url'] ) )
        update_post_meta( $post_id, 'url', wp_kses( $_POST['url'], $allowed ) );
}

//End slider



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
    add_meta_box('xxxx_image_box', 'Ảnh sản phẩm của thương hiệu', 'xxxx_render_image_attachment_box', 'trademark', 'normal', 'high');

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