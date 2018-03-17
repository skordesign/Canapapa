(function ($) {
    $(document).ready(function () {
        $('#cp-menu').mouseenter(
            function () {
                if (!$('#cp-menu-dropdown').hasClass('open')) { // Keeps it open when hover it again
                    $('#cp-menu').click();
                }
            })
        $('#cp-menu').mouseleave(
            function (e) {
                setTimeout(function () {
                    if ($('#cp-menu-dropdown').hasClass('open') && !$('#cp-menu-panel').is(':hover')) { // Keeps it open when hover it again
                        $('#cp-menu').click();
                    }
                },200)
            })
        $('#cp-menu-panel').mouseleave(
            function (e) {
                setTimeout(function () {
                    if ($('#cp-menu-dropdown').hasClass('open') && !$('#cp-menu').is(':hover')) { // Keeps it open when hover it again
                        $('#cp-menu').click();
                    }
                }, 200)
            })
    });
}(jQuery));


