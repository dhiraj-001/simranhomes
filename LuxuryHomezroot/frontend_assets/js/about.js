$(function(){ 

    if(!$('header').is('.header-fixed')){
        $(window).on('scroll', function() {
            $(this).scrollTop() > 300 ? $('header').addClass('header-fixed') : $('header').removeClass('header-fixed');
        }); 
        $(window).scrollTop() > 300 ? $('header').addClass('header-fixed') : $('header').removeClass('header-fixed');
    }

    //open ad popup

    openModel('.ad-pop');

    //
    
    const formControls = $(".form-control");
    formControls.on('focus input change blur', throttle(handleForm));

    formControls.each(function() {
        handleForm.call(this);
    });

    //

    
    niceSelect($);
    $('select').niceSelect();

    //

    adjustWhatsAppUrls();
    $(window).resize(function() {
        adjustWhatsAppUrls();
    });

    //

    startCountAnimation();

    $(window).scroll(function(){
        startCountAnimation();
    })

    //

    $('.home-banner .figure-wrap').addClass('is-animate');

    //

    window.addEventListener('load', handleAnimations);
    window.addEventListener('resize', handleAnimations);
    window.addEventListener('orientationchange', handleAnimations);
    handleAnimations();
    //
    
    $('.tab-nav li').on('click', function () {
        var tab = $(this).addClass('active').siblings().removeClass('active').end().data('tab');
        $('.tab-nav-content .tabs[data-tab= ' + tab + ']').addClass('active').siblings().removeClass('active');
    });

    //
    var headerheight = parseInt($(':root').css('--headerfixed'));

    $(document).on('click','[data-scrollTo]',function(){
        var section = $(this).attr('data-scrollTo');
        $('html, body').stop().animate({
            scrollTop: $(section).offset().top - headerheight
        }, 1000);
    });
    //
    $('[data-model]').on('click',function(){
        var model = $(this).attr('data-model');
        openModel(model);
    });
    $('.overlay,.close').on('click',function(){
        closeModel();
    });

    //

    $('.summery-detail-content .col:has(article) .title').click(function(){
        var $parentCol = $(this).parent('.col');
        $('.summery-detail-content .col').not($parentCol).find('article').stop().slideUp();
        $('.summery-detail-content .col').not($parentCol).removeClass('active');
        $parentCol.toggleClass('active');
        $(this).siblings('article').stop().slideToggle();
    }); 

    //
    $('[data-video]').on('click', function () {
        $('.video-pop').addClass('is-open');
        var src = $(this).attr('data-video');
        
        if (src.includes('youtube.com/embed/')) {
            var videoId = src.split('embed/')[1].split('?')[0];
            src += '&autoplay=1&loop=1&playlist=' + videoId;
        }
        
        $('#iframe1').attr('src', src);
    });
    $('.close-video').on('click', function () {
        $('#iframe1').attr('src', '');
        $('.video-pop').removeClass('is-open');
        $('body,html').removeClass('overflow-hidden');
    });

    //

    $('[data-slide]').click(function(){
        $(this).toggleClass('active');
        var slide = $(this).data('slide');
        $(slide).stop().slideToggle();
    })

    //

    jQuery.fn.extend({
        toggleText: function(text1, text2){
            return this.text(this.text() === text1 ? text2 : text1);
        }
    });

    $('[data-content]').each(function() {
        var totalLines = $(this).data('content');
        $(this).css('--totalline', totalLines);
        var lineHeight = parseFloat($(this).css('line-height'));
        var expectedHeight = lineHeight * totalLines; 
        var actualHeight = $(this)[0].scrollHeight;
        if (actualHeight <= expectedHeight) {
            $(this).siblings('[data-read]').hide();
        }
    });
    $('[data-read]').each(function() {
        $(this).click(function(){
            $(this).siblings('[data-content]').toggleClass('is-shown');
            $(this).toggleText('Read Less', 'Read More');
            $(this).toggleClass('active');
        })
    });

    //


    $('input[type="file"].form-control').on('change', function () {
        var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
        if (fileName) {
            $(this).siblings('.file-name').css('--filenameinitial', `"${fileName}"`);
        } else {
            $(this).siblings('.file-name').css('--filenameinitial', 'var(--filename)');
        }
    });

    //

    const swiper = new Swiper('.home-banner-slider', {
        slidesPerView: 1,
        direction: 'vertical',
        spaceBetween: 0,
        speed: 1000,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        on: {
            init: function () {
                handleFigureAnimation(this.realIndex);
            },
            slideChange: function () {
                handleFigureAnimation(this.realIndex);
            },
        },
    });
    
    function handleFigureAnimation(index) {
        clearTimeout($.data(this, 'figureTimer'));
    
        const $figures = $('.figure-wrap figure');
        const $currentFigure = $figures.eq(index);
        
        $figures.removeClass('active');
        $currentFigure.addClass('active');
    
        const $images = $currentFigure.find('img');

        const timer = setTimeout(() => {
            $images.removeClass('active');
            $images.eq(1).addClass('active');
        }, 3000);
    
        $.data(this, 'figureTimer', timer);
    }

    const journeyYearSwiper = new Swiper('.year-journey-slider', {
        loop: false,
        slidesPerView: 1,
        direction: 'vertical',
        speed: 2000,
        allowTouchMove: false,
        navigation: {
            prevEl: '.journey-prev',
            nextEl: '.journey-next',
        },
    });
    const journeyImgSwiper = new Swiper('.journey-img-slider', {
        loop: false,
        slidesPerView: 1,
        direction: 'vertical',
        speed: 2500,
        allowTouchMove: false,
        navigation: {
            prevEl: '.journey-prev',
            nextEl: '.journey-next',
        },
    });
    const journeyContentSwiper = new Swiper('.journey-content-slider', {
        loop: false,
        slidesPerView: 1,
        direction: 'vertical',
        speed: 2000,
        allowTouchMove: false,
        navigation: {
            prevEl: '.journey-prev',
            nextEl: '.journey-next',
        },
    });

    if ($('.journey-content-slider').length){
        const totalSlides = journeyContentSwiper.slides.length;
        let triggerClass = window.innerHeight <= 665 || window.matchMedia("(max-width: 675px)").matches 
        ? ".journey-wrap" 
        : ".home-secA";

        let screenSwipe = window.matchMedia("(max-width: 991px)").matches ? 600 : 600;
        let screenSwipeScrub = window.matchMedia("(max-width: 991px)").matches ? 2 : 1;

        if (totalSlides) {
            ScrollTrigger.create({
                trigger: triggerClass,
                start: `top top+=${headerheight}`,
                end: () => `+=${screenSwipe * 15}vh`,
                pin: true,
                scrub: screenSwipeScrub,
                onUpdate: (self) => {
                    const currentSlide = Math.round(self.progress * (totalSlides - 1));
                    if (journeyContentSwiper.activeIndex !== currentSlide) {
                        journeyYearSwiper.slideTo(currentSlide);
                        journeyImgSwiper.slideTo(currentSlide);
                        journeyContentSwiper.slideTo(currentSlide);
                        if (self.isActive) {
                            if (currentSlide === totalSlides - 1) {
                                $('.skip-an-btn').remove();
                            } else if (currentSlide >= 1) {
                                $('.skip-an-btn').remove();
                                const buttonTarget = self.direction < 0 ? ".home-secA" : ".home-secB";
                                const buttonHTML = `<button type="button" class="btn black-border skip-an-btn" data-scrollTo="${buttonTarget}">Skip</button>`;
                                $('.back-to-top').after(buttonHTML);
                            } else {
                                $('.skip-an-btn').remove();
                            }
                        }
                    }
                },
            });
        }
    }


    

    $(document).on('click','.skip-an-btn',function(){
        $(this).remove();
    })




    function commonProjectSlider(containerSelector, prevButtonSelector, nextButtonSelector) {
        return new Swiper(containerSelector, {
            loop: true,
            loopClone: true,
            navigation: {
                prevEl: prevButtonSelector,
                nextEl: nextButtonSelector,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.1,
                    spaceBetween: 12,
                    speed: 500,
                },
                675: {
                    slidesPerView: 1.4,
                    spaceBetween: 25,
                    speed: 2000,
                    centeredSlides: true,
                    watchOverflow: true,
                },
                991: {
                    slidesPerView: 1.4,
                    spaceBetween: 30,
                    speed: 2000,
                    centeredSlides: true,
                    watchOverflow: true,
                },
                1153: {
                    slidesPerView: 1.5,
                    spaceBetween: 42,
                    speed: 2000,
                    centeredSlides: true,
                    watchOverflow: true,
                }
            }
        });
    }

    commonProjectSlider('.home-project-slider1', '.project-prev1', '.project-next1');
    commonProjectSlider('.home-project-slider2', '.project-prev2', '.project-next2');
    commonProjectSlider('.home-project-slider3', '.project-prev3', '.project-next3');
    commonProjectSlider('.home-project-slider4', '.project-prev4', '.project-next4');
    commonProjectSlider('.home-project-slider5', '.project-prev5', '.project-next5');
    commonProjectSlider('.home-project-slider6', '.project-prev6', '.project-next6');

    new Swiper('.home-blog-slider', {
        loop: true,
        loopClone: true,
        navigation: {
            prevEl: '.home-blog-prev',
            nextEl: '.home-blog-next',
        },
        pagination: {
            enabled: true,
            el: '.home-blog-progress',
            type: "progressbar",
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 12,
                speed: 500,
            },
            675: {
                slidesPerView: 1.3,
                spaceBetween: 25,
                speed: 2000,
                initialSlide: 1,
                centeredSlides: true,
                watchOverflow: true,
            },
            991: {
                slidesPerView: 1.3,
                spaceBetween: 30,
                speed: 2000,
                centeredSlides: true,
                watchOverflow: true,
            },
            1153: {
                slidesPerView: 1.5,
                spaceBetween: 42,
                speed: 2000,
                centeredSlides: true,
                watchOverflow: true,
            }
        }
    });

    new Swiper('.onboard-project-slider', {
        slidesPerView: 'auto',
        speed: 3000,
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
    });

    new Swiper('.floor-plan-slider', {
        loop: false,
        speed: 500,
        navigation: {
            prevEl: '.floor-plan-prev',
            nextEl: '.floor-plan-next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
                speed: 500,
            },
            675: {
                slidesPerView: 2,
                spaceBetween: 15,
                speed: 2000,
            },
            1007: {
                slidesPerView: 3,
                spaceBetween: 15,
                speed: 1000,
            }
        }
    });
    new Swiper('.project-gallery-slider', {
        loop: false,
        speed: 500,
        navigation: {
            prevEl: '.project-gallery-prev',
            nextEl: '.project-gallery-next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
                speed: 500,
            },
            767: {
                slidesPerView: 2,
                spaceBetween: 20,
                speed: 2000,
            },
            1007: {
                slidesPerView: 2,
                spaceBetween: 20,
                speed: 1000,
            }
        }
    });
    new Swiper('.more-project-slider', {
        loop: false,
        speed: 500,
        navigation: {
            prevEl: '.more-project-prev',
            nextEl: '.more-project-next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
                speed: 500,
            },
            675: {
                slidesPerView: 2,
                spaceBetween: 20,
                speed: 2000,
            },
            1007: {
                slidesPerView: 2,
                spaceBetween: 20,
                speed: 1000,
            }
        }
    });

    new Swiper('.about-journey-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 1500,
        loop: false,
        pagination: {
            el: '.about-journey-pagination',
                  clickable: true,
                  renderBullet: function (index, className) {
                    const year = $('.about-journey-slider .swiper-slide').eq(index).attr('data-year');
                    return `<span class="${className}">${year}</span>`;
                  }
        },
        navigation: {
            prevEl: '.about-journey-prev',
            nextEl: '.about-journey-next',
        },
    });

    new Swiper('.about-vimi-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        speed: 1500,
        loop: false,
        pagination: {
            el: '.about-vimi-pagination',
                  clickable: true,
                  renderBullet: function (index, className) {
                    const tab = $('.about-vimi-slider .swiper-slide').eq(index).attr('data-slide');
                    return `<span class="${className}">${tab}</span>`;
                  }
        }
    });

    new Swiper('.certificate-slider',{
        loop: true,
        speed: 500,
        navigation: {
            prevEl: '.certificate-prev',
            nextEl: '.certificate-next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
                speed: 500,
            },
            675: {
                slidesPerView: 2,
                spaceBetween: 15,
                speed: 1000,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 0,
                speed: 1000,
                centeredSlides: true,
                centeredSlidesBounds: true
            }
        }
    });

    new Swiper('.group-company-slider',{
        loop: true,
        speed: 500,
        navigation: {
            prevEl: '.group-company-prev',
            nextEl: '.group-company-next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
                speed: 500,
            },
            675: {
                slidesPerView: 2,
                spaceBetween: 12,
                speed: 2000,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 20,
                speed: 2000,
            },
            1153: {
                slidesPerView: 4,
                spaceBetween: 20,
                speed: 1000,
            }
        }
    });

    new Swiper('.career-gallery-slider', {
        loop: true,
        initialSlide: 1,
        loopClone: true,
        centeredSlides: true,
        navigation: {
            prevEl: '.career-gallery-prev',
            nextEl: '.career-gallery-next',
        },
        a11y: {
            enabled: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 12,
                speed: 500,
            },
            675: {
                slidesPerView: 1.5,
                spaceBetween: 30,
                speed: 2000,
            },
            768: {
                slidesPerView: 1.5,
                spaceBetween: 50,
                speed: 2000,
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 50,
                speed: 2000,
            },
            1153: {
                slidesPerView: 2,
                spaceBetween: 83,
                speed: 2000,
            }
        }
    });
});
