jQuery(document).ready(function($) {
  //For RTL
  var RTL = false;
  if( $('html').attr('dir') == 'rtl' ) {
  RTL = true;
  }
  //Slider

  jQuery(".main-content-area .slide-category-post, .advertise-area .slide-category-post").slick({
   
    autoplay: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 2000,
    rtl: RTL,
    rows: 0,
    nextArrow: '<i class="slide-category-post-nav cs-prev fas fa-angle-right"></i>',
    prevArrow: '<i class="slide-category-post-nav cs-next fas fa-angle-left"></i>',
    responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },

                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
  });

    jQuery("#secondary .slide-category-post, .left-widget-area .slide-category-post, .right-widget-area .slide-category-post, .slide-category-post-single, #colophon .slide-category-post").slick({
    autoplay: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1000,
    rtl: RTL,
    rows: 0,
    nextArrow: '<i class="slide-category-post-nav cs-prev fas fa-angle-right"></i>',
    prevArrow: '<i class="slide-category-post-nav cs-next fas fa-angle-left"></i>',
  });
  
});