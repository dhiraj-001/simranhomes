$(function () {
    if(!$('header').is('.header-fixed')){
        $(window).on('scroll', function() {
            $(this).scrollTop() > 10 ? $('header').addClass('header-fixed') : $('header').removeClass('header-fixed');
        }); 
        $(window).scrollTop() > 10 ? $('header').addClass('header-fixed') : $('header').removeClass('header-fixed');
    }

    if(!$('.search-div').is('fixed')){
        $(window).on('scroll', function() {
            $(this).scrollTop() > 100 ? $('.search-div').addClass('fixed') : $('.search-div').removeClass('fixed');
        })
        $(window).scrollTop() > 100 ? $('.search-div').addClass('fixed') : $('.search-div').removeClass('fixed'); 
    }

    //

    const formControls = $(".form-control");
    formControls.on('focus input change blur', throttle(handleForm));
    formControls.each(function () {
        handleForm.call(this);
    });

    //

    niceSelect($);
    $('select').niceSelect();

    //

    adjustWhatsAppUrls();
    $(window).resize(function () {
        adjustWhatsAppUrls();
    });

    //

    startCountAnimation();
    $(window).scroll(function () {
        startCountAnimation();
    })

    //
    

    document.querySelectorAll('img.svg').forEach(img => {
        fetch(img.src)
            .then(response => response.text())
            .then(data => {
                const svg = new DOMParser().parseFromString(data, 'image/svg+xml').querySelector('svg');
                if (svg) {
                    svg.classList.add('svg');
                    img.replaceWith(svg);
                }
            });
    });    

    //

    $(document).on('click', '.tab-nav [data-tab]:not(.disabled-btn)', function () {
        var tab = $(this).addClass('active').siblings().removeClass('active').end().data('tab');
        $('.tab-nav-content >*[data-tab= ' + tab + ']').addClass('active').siblings().removeClass('active');
    });

    //

    $(document).on('click', '[data-scrollTo]',function () {
        headerheight = parseInt($(':root').css('--headerfixed')) + parseInt($(':root').css('--headerstripfixed'));
        var section = $(this).attr('data-scrollTo');
        if (section) {
            $('html, body').stop().animate({
                scrollTop: $(section).offset().top - headerheight
            }, 1000);
        }
    });

    handleAnimations()
    //

    $(document).on('click', '[data-model]',function () {
        var model = $(this).attr('data-model');
        openModel(model);
    });

    $(document).on('click','.overlay,.close', function () {
        closeModel();
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

    $(document).on('click', '[data-video]',function () {
        var src = $(this).attr('data-video');
        if (src.includes('youtube.com/embed/')) {
            var videoId = src.split('embed/')[1].split('?')[0];
            src += '&autoplay=1&loop=1&playlist=' + videoId;
            $('#iframe1').attr('src', src);
        }
        else{
            $('#iframe1').attr('src', src);
        }
        $('.video-pop').addClass('is-open');
    });
    $('.close-video').on('click', function () {
        $('#iframe1').attr('src', '');
        $('.video-pop').removeClass('is-open');
    });

    //

    $('.summery-detail-content .col:has(article) .title').click(function(){
        var $parentCol = $(this).parent('.col');
        $('.summery-detail-content .col').not($parentCol).find('article').stop().slideUp();
        $('.summery-detail-content .col').not($parentCol).removeClass('active');
        $parentCol.toggleClass('active');
        $(this).siblings('article').stop().slideToggle();
    }); 

    //Sliders

    function commonSlider1(containerSelector, prevButtonSelector, nextButtonSelector) {
        return new Swiper(containerSelector, {
            loop: false,
            navigation: {
                prevEl: prevButtonSelector,
                nextEl: nextButtonSelector,
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
                    slidesPerView: 3,
                    spaceBetween: 23,
                    speed: 2000,
                }
            }
        });
    }

    new Swiper('.logo-slider', {
        loop: true,
        a11y: {
            enabled: false,
        },
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.5,
                spaceBetween: 16,
                speed: 3000,
            },
            521: {
                slidesPerView: 2,
                spaceBetween: 16,
                speed: 3000,
            },
            675: {
                slidesPerView: 3,
                spaceBetween: 16,
                speed: 3000,
            },
            991: {
                slidesPerView: 4,
                spaceBetween: 16,
                speed: 3000,
            },
            1153: {
                slidesPerView: 5,
                spaceBetween: 20,
                speed: 3000,
            }
        }
    });

    new Swiper('.product-preview-slider',{
        loop: false,
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: {
            prevEl: '.product-preview-prev',
            nextEl: '.product-preview-next',
        },
    });

    new Swiper('.client_slider', {
        loop: true,
        direction: 'horizontal',
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 10,
                speed: 1500,
            },
            675: {
                slidesPerView: 4,
                spaceBetween: 12,
                speed: 1500,
            },
            991: {
                slidesPerView: 5,
                spaceBetween: 30,
                speed: 1500,
            },
            1153: {
                slidesPerView: 6,
                spaceBetween: 42,
                speed: 1500,
            }
        }
    });
    new Swiper('.property_slider', {
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        centeredSlides: true,
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
                speed: 1500,
            },
            675: {
                slidesPerView: 3,
                spaceBetween: 15,
                speed: 1500,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 20,
                speed: 1500,
            },
            1153: {
                slidesPerView: 3,
                spaceBetween: 10,
                speed: 1500,
            }
        }
    });
    new Swiper('.prolisting_slider', {
        loop: true,
        autoplay: {
            delay: 2000,
            // disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.propdots',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 1500,
            },
            675: {
                slidesPerView: 2,
                spaceBetween: 15,
                speed: 1500,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 30,
                speed: 1500,
            },
            1153: {
                slidesPerView: 3,
                spaceBetween: 40,
                speed: 1500,
            }
        }
    });
    new Swiper('.top_slider', {
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.25,
                spaceBetween: 10,
                speed: 2500,
            },
            675: {
                slidesPerView: 2.25,
                spaceBetween: 15,
                speed: 2500,
            },
            991: {
                slidesPerView: 3.25,
                spaceBetween: 10,
                speed: 2500,
            },
            1153: {
                slidesPerView: 3.25,
                spaceBetween: 10,
                speed: 2500,
            }
        }
    }); 
    new Swiper('.bottom_slider', {
        loop: true,
        autoplay: {
            delay: 2000,
            reverseDirection: true,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.25,
                spaceBetween: 10,
                speed: 2500,
            },
            675: {
                slidesPerView: 2.25,
                spaceBetween: 15,
                speed: 2500,
            },
            991: {
                slidesPerView: 3.25,
                spaceBetween: 10,
                speed: 2500,
            },
            1153: {
                slidesPerView: 3.25,
                spaceBetween: 10,
                speed: 2500,
            }
        }
    });

});

new Swiper('.amntop_slider', {
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.25,
                spaceBetween: 10,
                speed: 2500,
                centeredSlides: true
            },
            675: {
                slidesPerView: 3,
                spaceBetween: 15,
                speed: 2500,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 20,
                speed: 2500,
            },
            1153: {
                slidesPerView: 4,
                spaceBetween: 20,
                speed: 2500,
            }
        }
    });

new Swiper('.amnbottom_slider', {
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
            reverseDirection: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.25,
                spaceBetween: 10,
                speed: 2500,
                centeredSlides: true
            },
            675: {
                slidesPerView: 3,
                spaceBetween: 15,
                speed: 2500,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 20,
                speed: 2500,
            },
            1153: {
                slidesPerView: 4,
                spaceBetween: 20,
                speed: 2500,
            }
        }
    });


// back to top

 
  const backToTopBtn = document.getElementById('backToTop');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      backToTopBtn.classList.add('show');
    } else {
      backToTopBtn.classList.remove('show');
    }
  });

  backToTopBtn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

 
// keywords banner slider
new Swiper('.keyword_slider', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                // spaceBetween: 10,
                speed: 2500,
            },
            675: {
                slidesPerView: 1,
                // spaceBetween: 15,
                speed: 2500,
            },
            991: {
                slidesPerView: 1,
                // spaceBetween: 20,
                speed: 2500,
            },
            1153: {
                slidesPerView: 1,
                // spaceBetween: 20,
                speed: 1500,
            }
        }
    }); 

     new Swiper('.bloglisting_slider', {
        loop: true,
        autoplay: {
            delay: 2000,
            // disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.blogdots',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 10,
                speed: 1500,
            },
            675: {
                slidesPerView: 2,
                spaceBetween: 15,
                speed: 1500,
            },
            991: {
                slidesPerView: 3,
                spaceBetween: 30,
                speed: 1500,
            },
            1153: {
                slidesPerView: 3,
                spaceBetween: 40,
                speed: 1500,
            }
        }
    });