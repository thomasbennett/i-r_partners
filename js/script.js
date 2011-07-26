jQuery(function($){
  $('.cycle').cycle({
    fx: 'fade',
    timeout: '40000',
    speed: 400,
    pager: '#pager'
  });

  $('.partners').cycle({
    fx: 'scrollHorz',
    prev: '.prev',
    next: '.next',
    timeout: 5000
  });

  $('.tablink').click(function(){
    $('.tab').hide();
    $('#tabs').find('li').removeClass('active-tab');
    var id = $(this).attr('id');
    var thisID = $('#' + id + '_content');
    thisID.show();
    $(this).addClass('active-tab');
  });
});
