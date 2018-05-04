<?php
/**
 * Created by PhpStorm.
 * User: HD088
 * Date: 4/22/2018
 * Time: 12:13 PM
 */
add_action( 'admin_head', 'my_custom_admin_styles' );
function my_custom_admin_styles() {

    // HIDE "New Order" button when current user don't have 'manage_options' admin user role capability
//    if( ! current_user_can( 'manage_options' ) ):
        ?>
        <style>
            .post-type-shop_order #wpbody-content > div.wrap > a.page-title-action{
                display: none !important;
            }
        </style>
    <?php
//    endif;
}

add_action('admin_footer-edit.php', 'custom_bulk_admin_order');

function custom_bulk_admin_order() {

    global $post_type;

    if($post_type == 'shop_order') {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                var post_type = document.getElementsByClassName('post-type-shop_order');
                if(post_type) {
                    var bulk_action = document.getElementById("bulk-action-selector-top");
                    for (var i=0; i< bulk_action.length; i++){
                        if (bulk_action.options[i].value == 'trash' )
                            bulk_action.remove(i);
                    }
                }
            });
        </script>
        <?php
    }
}
