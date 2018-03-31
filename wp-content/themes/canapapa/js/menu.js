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
                }, 200)
            })
        $('#cp-menu-panel').mouseleave(
            function (e) {
                setTimeout(function () {
                    if ($('#cp-menu-dropdown').hasClass('open') && !$('#cp-menu').is(':hover')) { // Keeps it open when hover it again
                        $('#cp-menu').click();
                    }
                }, 200)
            })
        $('#cp-menu-panel > .lnt-dropdown-mega-menu > .lnt-category > li > a').mouseenter(
            function (e) {
                var parent = $(this).parent();
                if (!parent.hasClass('active')) {
                    $('#cp-menu-panel > .lnt-dropdown-mega-menu > .lnt-category').find('li').attr('class', '')
                    parent.attr('class', 'active')
                    var indexLi = $('#cp-menu-panel > .lnt-dropdown-mega-menu > .lnt-category').find('li').index(parent)
                    var listPanel = $('#cp-menu-panel > .lnt-dropdown-mega-menu > .lnt-subcategroy-carousel-wrap > div');
                    $(listPanel).attr('class','')
                    $(listPanel[indexLi]).attr('class','active')
                }
            })

    });
}(jQuery));


