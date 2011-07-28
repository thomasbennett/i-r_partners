jQuery(function($){
  $('#donateMain input').each(function(){
    var curval = $(this).val();
    var altval = $(this).attr('alt');
    if(curval == altval){
      if( !$(this).hasClass('amount')){
        $(this).val('');
      }
    }
  });

  //loop through to find all search bars
  $('#search').each(function(){
    var curval = $(this).val();
    var altval = $(this).attr('alt');
    if (curval == "" || curval == altval) {
      $(this).css({"color":"#999"});
      $(this).val(altval);
    } else {
      $(this).css({"color":"#000"});
    }
  });

  // if focus, clear if necessary
  $('#search').focus(function(){
    var curval = $(this).val();
    var altval = $(this).attr('alt');
    $(this).css({"color":"#000"});
    if(curval==altval){
      $(this).val("");
    }
  });

  // if blur, put default text back and gray if necessary
  $('#search').blur(function(){
    var curval = $(this).val();
    var altval = $(this).attr('alt');
    if(curval==""){
      $(this).css({"color":"#999"});
      $(this).val(altval);
    }
  });
});
