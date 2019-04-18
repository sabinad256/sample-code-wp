var $ = jQuery;



//Burger menu

function burgerMenu() {

  $('#nav .menu-item-has-children > a').append('<span class="fa fa-plus"></span>');

  $('#nav .opener').click(function (e) {

      $('body').toggleClass('nav-active');

      e.preventDefault();

  });



  $('#nav li.menu-item-has-children .fa').click(function(evt){

    evt.preventDefault();

    $(this).parents('li').toggleClass('active');

    $(this).parents().siblings('ul').slideToggle();

  });



  $('.overlay').click(function(){

    $('body').removeClass('nav-active');

  });

}





//Same Height

equalheight = function(container){



var currentTallest = 0,

     currentRowStart = 0,

     rowDivs = new Array(),

     $el,

     topPosition = 0;

 jQuery(container).each(function() {



   $el = jQuery(this);

   jQuery($el).height('auto')

   topPostion = $el.position().top;



   if (currentRowStart != topPostion) {

     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {

       rowDivs[currentDiv].height(currentTallest);

     }

     rowDivs.length = 0; // empty the array

     currentRowStart = topPostion;

     currentTallest = $el.height();

     rowDivs.push($el);

   } else {

     rowDivs.push($el);

     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

  }

   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {

     rowDivs[currentDiv].height(currentTallest);

   }

 });

}



//------------------------------------------



jQuery(window).bind('orientationchange', function(e) {



  switch ( window.orientation ) {

    case 0:

      equalheight('.same-height');

    break;



    case 90:

      equalheight('.same-height');

    break;



    case -90:

      equalheight('.same-height');

    break;

  }



});



function initLightbox() {

  jQuery('a[rel*="lightbox"], a.lightbox').fancybox({

    padding: 10,             // inner padding

    cyclic: false,           // cyclic functioning of prev/next buttons

    overlayShow: true,       // parameter for disabling overlay

    overlayOpacity: 0.65,    // overlay opacity

    overlayColor: '#000',    // overlay background color

    titlePosition: 'inside'  // description position "inside", "outside" or "over"

  });

}



jQuery(document).ready(function () {

  burgerMenu();

  initLightbox();

  equalheight('.same-height');

  if($(".banner-slider").length){

    $(".banner-slider").slick({

      arrows: true,

      infinite: true,

      dots:true,

      autoplay: true,

       autoplaySpeed: 6000,

    });

  }



});



$(window).resize(function(){

  equalheight('.same-height');

  $('#nav .drop').removeAttr('style');

  $('body').removeClass('nav-active');

  $('#nav li.menu-item-has-children').removeClass('active');

  $('#nav li.menu-item-has-children ul').removeAttr('style');

});



jQuery(window).load(function() {

  equalheight('.same-height');

});





