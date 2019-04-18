var $ = jQuery;


//Burger menu
function burgerMenu() {
  $('#nav .nav-opener').click(function (e) {
    $('body').toggleClass('nav-active');
    $(this).siblings('.drop').slideToggle();
    e.preventDefault();
  });

  if($(window).width()<767){
    $('#nav li.menu-item-has-children').append('<span class="down"></down>');
  };


  $('#nav li.menu-item-has-children .down').click(function(evt){
    if($(window).width()<767){
      $(this).parent().toggleClass('arrow-down');
      $(this).siblings('ul').slideToggle();
    }
  });
}


function stickyHeader() {
  if ($(window).width() > 1600) {
    if ($(window).scrollTop() > 10) {
      $('body').addClass('sticky');
    }
    else {
      $('body').removeClass('sticky');
    }
  }
}

function accordion(){
  var accordion = $('.accordion'),
      opener    = $('h3'),
      slider    = $('.slide');

  // accordion.find(slider).hide();
  // if($(opener).parent().hasClass('active')){
  //   $('.active').find(slider).show();
  // }

  $(accordion).find(opener).click(function(e){
    var $this = $(this);
    // $('html,body').animate({scrollTop: $this.parents('div').offset().top-160});
    if($this.parent().hasClass('active')){
      $this.parent().removeClass('active');
      $this.next(slider).slideUp();
    }else{
      $(opener).parent().removeClass('active');
      $this.parents('ol').find(slider).slideUp();
      $this.parent().addClass('active');
      $this.next(slider).slideDown();
    }
    e.preventDefault();
  })
}

$(document).ready(function(){
	accordion();
  //stickyHeader();
  burgerMenu();
});

$(window).scroll(function(){
  //stickyHeader();
});

$(window).resize(function(){
  if($(window).width() > 767 ) {
    $('#nav .drop').removeAttr('style');
  }
});