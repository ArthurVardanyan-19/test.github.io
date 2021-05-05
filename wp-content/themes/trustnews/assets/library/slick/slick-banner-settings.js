jQuery(document).ready(function($) {
  //For RTL
  var RTL = false;
  if( $('html').attr('dir') == 'rtl' ) {
  RTL = true;
  }
  //Slider
  jQuery('.banner-list').slick({
    autoplay: true,
    infinite: true,
    speed: 1000,
    cssEase: 'linear',
    rtl: RTL,
    rows: 0,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3
                        }
                    },

                    {
                        breakpoint: 1000,
                        settings: {
                            slidesToShow: 2
                        }
                    },

                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
  });
  
});