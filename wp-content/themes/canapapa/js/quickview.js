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
                    var post = data.posts[0];
                    var bind ='';
                    bind += temp.replace(/{{post_title}}/g, post.post_title);
                    document.getElementById('quick-view-box').innerHTML = bind;
                },
                error: function (err) {
                    console.log(err);
                }

            })
        });


    });


}(jQuery));


;