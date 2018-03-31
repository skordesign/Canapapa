(function ($) {
    $(document).ready(function () {
        $('button.plus').click(function(){
            var parent =  $(this).parent();
            var  i =  $(parent).find('input');
            var val = $(i[0]).val()
            $(i[0]).val( function(i, oldval) {
                return ++oldval;
            });
        })
        $('button.minus').click(function() {
            var i =  $(this).siblings('input');
            var val = $(i[0]).val()
            $(i[0]).val( function(i, oldval) {
                return oldval>1?--oldval:oldval;
            });
        })
    });
}(jQuery));


