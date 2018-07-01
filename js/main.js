$(document).ready(function () {
    function resizeImg(){
        var img = $('.site-header'),
            imgSrc = img.css('background-image').slice(5,-2),
            widthScreen = $('body').width();
            heightScreen = $(window).height();
        $('<img />').attr('src', imgSrc).on('load', function() { 
            if(this.width > widthScreen){
                img.width(widthScreen);
                img.height(heightScreen);
            }
            if(widthScreen < (this.width - widthScreen)/2){
                var offset = $('.box .cherry-btn').offset();
                var height = offset.top + 100;
                img.width(widthScreen);
                img.height(height);
            }
            
        });
    }
    // resizeImg();
    $( window ).resize(function() {
        resizeImg();
    });

    function sliderNext(name) {
        let number = $('.'+name+'.active').index();
        let ex = $('.'+name).length;
        if(number + 1 == ex){
            $('.'+name).eq(number).removeClass('active');
            number = -1;
        }
        $('.'+name).eq(number).removeClass('active');
        $('.'+name).eq(number + 1).addClass('active');
    }
    function sliderPrev(name) {
        let number = $('.'+name+'.active').index();
        let ex = $('.'+name).length;
        if(number == 0){
            $('.'+name).eq(number).removeClass('active');
            number = ex;
        }
        $('.'+name).eq(number).removeClass('active');
        $('.'+name).eq(number - 1).addClass('active');
    }
    $('.next').click(function(){
        sliderNext('entry-content__slider__content-group');
        sliderNext('entry-content__slider__thumb__images');
    });
    $('.prev').click(function(){
        sliderPrev('entry-content__slider__content-group');
        sliderPrev('entry-content__slider__thumb__images');
    });
    $('.entry-content__slider__thumb__images').click(function(){
        let numberOldContent = $('.entry-content__slider__content-group.active').index();
        let numberOldThumb = $('.entry-content__slider__thumb__images.active').index(); 
        let number = $(this).index();
        $('.entry-content__slider__content-group').eq(numberOldContent).removeClass('active');
        $('.entry-content__slider__thumb__images').eq(numberOldThumb).removeClass('active');
        $('.entry-content__slider__content-group').eq(number).addClass('active');
        $('.entry-content__slider__thumb__images').eq(number).addClass('active');
    });

    $('.header-menu__item.dropdown').hover(function() {
        $(this).addClass('active');
     });

    $('body').on({
        mouseleave: function(){
            $('.header-menu__item.dropdown.active').removeClass('active');
            $('.header-menu__submenu').parents('li').removeClass('active');
        }
    },'.header-menu');

    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 50) {
            $('.header-menu').addClass('fixed');
            $('.logo-mobile').addClass('fixed');
        } else {
            $('.header-menu').removeClass('fixed');
            $('.logo-mobile').removeClass('fixed');
        }
    });

    $(document).ready(function() {
        autoPlayYouTubeModal();
        $('.watch-video').click(function(e) {
            e.stopPropagation();
            var videoID = $('.video-home').text(),
            videoSRC = "https://www.youtube.com/embed/" + videoID;
            videoSRCauto = videoSRC + "?autoplay=1";
            $('.video-modal').attr('src', videoSRCauto);
            $('#videoModal').addClass('active');
          });
        function autoPlayYouTubeModal() {
          var trigger = $('.entry-content__video__item');
          trigger.click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            var videoID = $(this).attr("data-thevideo"),
            videoSRC = "https://www.youtube.com/embed/" + videoID;
            videoSRCauto = videoSRC + "?autoplay=1";
            $('.video-modal').attr('src', videoSRCauto);
            $('#videoModal').addClass('active');
          });
          $('body').click(function(){
                $('#videoModal').removeClass('active');
                $('.video-modal').attr('src', "");
            });
        }
      });

      $('.button-menu').on( "click",function() {
        if($('.header-menu').hasClass('active')){
            $(this).parents('.container').find('.header-menu').removeClass('active');
        }else{
            $('.header-menu').addClass('active');
        }
      });
});
