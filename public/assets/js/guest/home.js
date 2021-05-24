/**
* Author: 
*/
!(function($) {
    "use strict";
  
  // Intro carousel
  var bannerCarousel = $("#bannerCarousel");
  var bannerCarouselIndicators = $("#banner-carousel-indicators");
  bannerCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
    (index === 0) ?
    bannerCarouselIndicators.append("<li data-target='#bannerCarousel' data-slide-to='" + index + "' class='active'></li>"):
      bannerCarouselIndicators.append("<li data-target='#bannerCarousel' data-slide-to='" + index + "'></li>");
  });

  bannerCarousel.on('slid.bs.carousel', function(e) {
    $(this).find('.carousel-content ').addClass('animate__animated animate__fadeInDown');
  });

})(jQuery);