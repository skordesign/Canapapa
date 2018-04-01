(function ($) {
    $(document).ready(function () {
        $('.sub_item_menu').mouseenter(function(){
            if($(this).children('.conten_hover_submenu').css('display')=='none'){
                $(this).children('.conten_hover_submenu').css('display','block');
            }
        });
        $('.sub_item_menu').mouseleave(function(){
            if($(this).children('.conten_hover_submenu').css('display')=='block'){
                $(this).children('.conten_hover_submenu').css('display','none');
            }
        });
    });
}(jQuery));



