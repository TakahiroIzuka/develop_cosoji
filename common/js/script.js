window.onload = function() {
    
    $('.qanda-title-wrapper').click(function() {
        var $content = $('.inner_sm').find('.qanda-list-wrapper');
        var $icon = $(this).find('.qanda-img');
        
        if($content.hasClass('open')) {
            $content.removeClass('open');
            $content.slideUp(700);
            
        }else{
            $content.addClass('open');
            $content.slideDown(700);
        };
        
        if($icon.hasClass('down')) {
            $icon.removeClass('down');
            $icon.addClass('up');
        }else{
            $icon.removeClass('up');
            $icon.addClass('down');
        };
    });
    
};