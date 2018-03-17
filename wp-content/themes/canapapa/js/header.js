(function ($) {
    $(document).ready(function () {
        $('#cp-cart').mouseenter(
            function () {
                if (!$('.dropdown').hasClass('open')) { // Keeps it open when hover it again
                    $('#cp-cart').click();
                }
            })
        $('#cp-cart').mouseleave(
            function (e) {
                if ($('.dropdown').hasClass('open') && !$('#cp-cart-panel').is(':hover')) { // Keeps it open when hover it again
                    $('#cp-cart').click();
                }
            })
        $('#cp-cart-panel').mouseleave(
            function (e) {
                if ($('.dropdown').hasClass('open') && !$('#cp-cart').is(':hover')) { // Keeps it open when hover it again
                    $('#cp-cart').click();
                }
            })
    });
}(jQuery));


