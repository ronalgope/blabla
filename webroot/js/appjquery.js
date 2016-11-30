$(document).ready(function(){
  /*mobile menu*/
  $("#mobile-menu-button").click(function(){
    $("#menu-nav").addClass("mobile-active");
    $("#menu-nav.mobile-active #navigation").slideToggle();
  });

	/*Home Slider */
	var count = false;
    if ($(".slider-list .item").length > 1){
      count = true;
    }else {
      count = false;
    }
  var homeSlider = $(".home-slider .slider-list");
  homeSlider.owlCarousel({
		items: 1,
		singleItem: true,
		loop: count,
		nav:false,
		dots:false,
		autoplay: false,
		autoplayTimeout:5000
	});

  if ($(".slider-list .item").length > 1){
  	homeSlider.append("<div class='owl-custom-nav'><div class='owl-custom-next'><i class='fa fa-arrow-circle-right' aria-hidden='true'></i></div><div class='owl-custom-prev'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i></div></div>");
  }
  homeSlider.find(".owl-custom-next").click(function(){
    homeSlider.trigger('next.owl.carousel');
  });

  homeSlider.find(".owl-custom-prev").click(function(){
    homeSlider.trigger('prev.owl.carousel');
  });

	/*end Home Slider*/

  /*same height*/
  $(".newest-list .about-house, .our-service .feature-box, .dena-map>div").matchHeight();

  /*partner slider*/
  var partnerSlider = $(".partner-section .partner-list");
  partnerSlider.owlCarousel({
    items: 3,
    singleItem: true,
    loop: count,
    nav:false,
    dots:false,
    autoplay:true,
    autoplayTimeout:4000,
    responsive : {
      0: {
        items: 1
      },
      480: {
        items: 2
      },
      768: {
        items: 2
      },
      800: {
        items: 3
      }
    }
  });

  partnerSlider.append("<div class='owl-custom-nav'><div class='owl-custom-next'><i class='fa fa-arrow-circle-right' aria-hidden='true'></i></div><div class='owl-custom-prev'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i></div></div>");
  
  partnerSlider.find(".owl-custom-next").click(function(){
    partnerSlider.trigger('next.owl.carousel');
  });

  partnerSlider.find(".owl-custom-prev").click(function(){
    partnerSlider.trigger('prev.owl.carousel');
  });

  /*View slider*/
  var viewSlider = $(".view-slider .view-slider-list");
  viewSlider.owlCarousel({
    items: 1,
    singleItem: true,
    thumbs: true,
    thumbsPrerendered: true
  });

  viewSlider.append("<div class='owl-custom-nav'><div class='owl-custom-next'><i class='fa fa-arrow-circle-right' aria-hidden='true'></i></div><div class='owl-custom-prev'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i></div></div>");
  
  viewSlider.find(".owl-custom-next").click(function(){
    viewSlider.trigger('next.owl.carousel');
  });

  viewSlider.find(".owl-custom-prev").click(function(){
    viewSlider.trigger('prev.owl.carousel');
  });


});