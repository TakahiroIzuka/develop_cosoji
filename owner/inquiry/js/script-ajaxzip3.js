jQuery(function ($) {
  $('.ajaxzip3').on('click', function(){
    AjaxZip3.zip2addr('zip1','zip2','prefecture','address');

    //成功時に実行する処理
    AjaxZip3.onSuccess = function() {
        setTimeout(function() {
      $('.address').focus();
    },10);
    };
    
    //失敗時に実行する処理
    AjaxZip3.onFailure = function() {
        alert('郵便番号に該当する住所が見つかりません');
    };
    
    return false;
  });
});
