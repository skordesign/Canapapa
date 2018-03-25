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
        })
    });


}(jQuery));