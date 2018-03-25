(function ($) {
    $(document).ready(function () {

        $('button.close').click(function () {
            $('#quick-view-box').attr('display', 'none');
        });

        $('.hint-top').click(function () {
            var product_id = $(this).attr('data-id');
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                dataType: 'json',
                data: {action: 'showDetailProduct', product_id : product_id},
                success: function (data) {
                    var temp = document.getElementById('quickview-posttemplate').innerHTML;
                    var bind = '';
                    bind += temp.replace(/{{post_title}}/g, data.post_title)
                                .replace(/{{regular_price}}/g, data.regular_price)
                                .replace(/{{sale_price}}/g, data.sale_price)
                                .replace(/{{post_excerpt}}/g, data.post_excerpt)
                                .replace(/{{sku}}/g, data.sku)
                                .replace(/{{stock_status}}/g, data.stock_status)
                                .replace(/{{featured_image}}/g, data.featured_image['0'])
                                .replace(/{{link_url_product}}/g, data.link_url_product)
                                .replace(/{{add_to_cart_url}}/g, data.add_to_cart_url),

                    document.getElementById('quick-view-box').innerHTML = bind;
                },
                error: function (err) {
                    console.log(err);
                }

            })
        });

        $('#mySelectOrderBy').on('changed.bs.select', function (e) {
            document.location.href = $(this).val();
        });

        $('#mySelectPagination').on('changed.bs.select', function (e) {
            document.location.href = $(this).val();
        });

        $('#add_to_cart').click(function () {
            var quantity = $('input[name="quantity"]').val();
            var product_id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                dataType: 'json',
                data: {action: 'addCustomToCart', product_id : product_id, qty : quantity, name : name},
                success: function (data) {
                    var xhtml = "";
                    xhtml += '<div class="modal fade in open" tabindex="-1" role="dialog" aria-labelledby="quickviewboxLabel" aria-hidden="false" style="display: block;padding-right: 17px;">';
                    xhtml += '<div class="modal-backdrop fade in" style="height: 100%;"></div>';
                    xhtml += '<div class="modal-dialog">';
                    xhtml += '<div class="modal-content">';
                    xhtml += '<div class="modal-header">';
                    xhtml += '<button type="button" class="close_cart" onclick="renderHome()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
                    xhtml += '<h6 class="modal-title text-primary1 text-uppercase" id="quickviewboxLabel">'+data.msg+'</h6><br>';
                    xhtml += '<p class="text-primary1">Vui lòng kiểm tra giỏ hàng của bạn</p>';
                    xhtml += '</div>';
                    xhtml += '</div>';
                    xhtml += '</div>';
                    var dialog = document.createElement('div');
                    dialog.setAttribute('id', 'add-cart-view-box');
                    dialog.innerHTML = xhtml;
                    document.getElementsByTagName('body')[0].appendChild(dialog);
                },
                error: function (err) {
                    console.log(err);
                }
            })
        })
    });


}(jQuery));

function renderHome() {
    document.location.href = document.getElementsByName('home_url')[0].value;
}

