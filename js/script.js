$(document).ready(function() {
  $('.sidenav').sidenav();
  $('.modal').modal();
  if($(window).width()<=600){
    $('.brand-logo').removeClass('right');
  }
});

$('.bannerSec .owl-carousel').owlCarousel({
  loop:true,
  margin:0,
  nav:true,
  dots:true,
  lazyLoad:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
});

$('.testSec .owl-carousel').owlCarousel({
  loop:true,
  margin:30,
  nav:true,
  dots:true,
  lazyLoad:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:3
      }
  }
});

$(function() {
  $('.card.dairyCard').hover(
      function() {
          $(this).find('> .card-image > img.activator').click();
      }, function() {
          $(this).find('> .card-reveal > .card-title').click();
      }
  );
});
// start sticky navbar
$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      $('#stickyNav').addClass('navbarFixed');
      $('.blackLogo').addClass('d-none');
      $('.whiteLogo').removeClass('d-none');
    }
    if ($(window).scrollTop() < 300) {
      $('#stickyNav').removeClass('navbarFixed');
      $('.blackLogo').removeClass('d-none');
      $('.whiteLogo').addClass('d-none');
    }
  });
  // end sticky navbar