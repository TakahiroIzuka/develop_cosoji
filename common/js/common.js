
$(function() {
	//ページトップに戻るボタンをスクロールしたらふわっと表示
	var $pagetop = $('#pagetop');    
    $pagetop.hide();
    var $startPos = 0;
    var $winScrollTop = 0;
    $(window).scroll(function () {
         $winScrollTop = $(this).scrollTop();
        if($winScrollTop >= $startPos){
            if($winScrollTop >= 200){
                 $('.header').addClass('hide');
            }
        }else{
            $('.header').removeClass('hide');
        }
        $startPos = $winScrollTop;
        
        if ($winScrollTop > 300) {
            $pagetop.fadeIn();
        } else {
            $pagetop.fadeOut();
        }
    });
	//スムーススクロール
	$('a[href^="#"]').click(function() {
    	var speed = 400;
    	var href= $(this).attr("href");
    	var target = $(href == "#" || href == "" ? 'html' : href);
    	var position = target.offset().top;
    	$('body,html').animate({scrollTop:position}, speed, 'swing');
    	return false;
	});
　　
	//要素の高さを揃える
	$('.usage-item-paragraph').matchHeight();
    $('.kinds-item-text').matchHeight();
    $('.merit-item-title').matchHeight();
    
    
    //QandA アコーディオン 
    $(".qanda-title").on('click',function(){
        $(this).toggleClass('active');
        $(this).next(".qanda-data").slideToggle();
    });
    
    $('.Toggle').click(function() {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $('.header-nav2').addClass('active');　 
        } else {
            $('.header-nav2').removeClass('active'); 
        }
        
        $('.header-nav-item>a').on('click',function(){
            $('.Toggle').toggleClass('active');
            $('.header-nav2').removeClass('active'); 
        });
     });
    
    
});