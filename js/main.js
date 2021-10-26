$(function() {

    "use strict";

    /***************************

    preloader

    ***************************/
    $(document).ready(function() {
        $(".preloader").animate({
            opacity: 1
        }, {
            duration: 400,
        });
        setTimeout(function() {
            $('.preloader-number').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                    countNum: countTo
                }, {
                    duration: 800,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                });
            });
            $(".preloader-bar").animate({
                width: '100%'
            }, {
                duration: 800,
                complete: function() {
                    $(".preloader-frame").addClass('hidden')
                }
            });
        }, 1000);
    });
    /***************************

    popup

    ***************************/
    $('#book-popup , #book-popup-2').on("click", function() {
        $('.popup-frame').toggleClass('active')
    });
    $('.close-popup').on("click", function() {
        $('.popup-frame').removeClass('active')
    });
    /***************************

    scrollspy and smooth scroll

    ***************************/
    $('.side-menu a , .knsk-s-s').on("click", function() {
        $(".active").removeClass("active");
        $(this).closest('li a').addClass("active");
        var theClass = $(this).attr("class");
        $('.' + theClass).parent('li a').addClass('active');
        $('html, body').stop().animate({
            scrollTop: $($(this).attr('href')).offset().top - 170
        }, 600);
        return false;
    });
    /***************************

    parallax

    ***************************/
    $(window).on('scroll', parallax)

    function parallax() {
        var s = $(window).scrollTop();

        function parallaxDown(e, t) {
            $(e).css({
                'position': 'relative',
                'top': (s * t) + 'px'
            });
        }
        parallaxDown('.parallax', .4);
    }
    /***************************

    menu

    ***************************/
    $('.menu-btn').on('click', function() {
        $('.menu-btn , .right-side').toggleClass('active');
    })
    $('.menu ul li a').on('click', function() {
            $('.menu-btn , .right-side').removeClass('active');
        })
        /***************************

        nice select

        ***************************/
    $(document).ready(function() {
        $('select').niceSelect();
    });
    /***************************

    datepicker

    ***************************/
    $('.datepicker-here').datepicker({
            language: 'en',
            minDate: new Date()
        })
        /***************************

        about slider

        ***************************/
    var swiper = new Swiper('.about-slider', {
        slidesPerView: 3,
        spaceBetween: 20,
        parallax: true,
        calculateHeight: true,
        updateOnWindowResize: true,
        initialSlide: 1,
        centeredSlides: true,
        speed: 800,
        pagination: {
            el: '.about-slider-1-pagination',
            type: "fraction",
        },
        navigation: {
            prevEl: '.about-slider-1-prev',
            nextEl: '.about-slider-1-next',
        },
        breakpoints: {
            1600: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 1,
            },
        },
    });
    /***************************

    testimonials slider

    ***************************/
    var swiper = new Swiper('.testimonials-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        parallax: true,
        calculateHeight: true,
        updateOnWindowResize: true,
        initialSlide: 1,
        centeredSlides: true,
        speed: 800,
        pagination: {
            el: '.testimonials-slider-1-pagination',
            type: "fraction",
        },
        navigation: {
            prevEl: '.testimonials-slider-1-prev',
            nextEl: '.testimonials-slider-1-next',
        },
    });
    /***************************

    rooms slider

    ***************************/
    var swiper = new Swiper('.uni-slider', {
        slidesPerView: 3,
        spaceBetween: 20,
        parallax: true,
        calculateHeight: true,
        updateOnWindowResize: true,
        speed: 800,
        pagination: {
            el: '.uni-slider-pagination',
            type: "fraction",
        },
        navigation: {
            prevEl: '.uni-slider-prev',
            nextEl: '.uni-slider-next',
        },
        breakpoints: {
            1200: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 1,
            },
        },
    });
    /***************************

    room details

    ***************************/
    var swiper1 = new Swiper(".rd-slider-1", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".rd-slider-2", {
        loop: true,
        effect: 'fade',
        parallax: true,
        thumbs: {
            swiper: swiper1,
        },
    });
    /***************************

    fancybox

    ***************************/
    $('[data-fancybox]').fancybox({
        animationEffect: "zoom-in-out",
        animationDuration: 200,
        transitionDuration: 800,
        buttons: [
            "zoom",
            "slideShow",
            "thumbs",
            "close",
        ],
    });
    /***************************

    scroll animation

    ***************************/
    $(window).scroll(function() {
        $('.scroll-animation').each(function(i) {
            var bottom_of_object = $(this).offset().top - 380 + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                $(this).addClass('active-el');
            }
            if (bottom_of_window < bottom_of_object) {
                $(this).removeClass('active-el');
            }
        });
    });
    /***************************

    counters

    ***************************/
    var count = 0;
    if ($('.counters-card').length) {
        $(window).scroll(function() {
            var oTop = $('.counters-card').offset().top - window.innerHeight;
            if (count == 0 && $(window).scrollTop() > oTop) {
                $('.counter-number').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                        }
                    });
                });
                count = 1;
            }
        });
    }
    /***************************

    sticky

    ***************************/
    var sticky = new Sticky('.sticky');
    if ($(window).width() < 992) {
        sticky.destroy();
    }
    /***************************

    map

    ***************************/
    $(".lock").on('click', function() {
        $('.map').toggleClass('active');
        $('.lock').toggleClass('active');
        $('.lock .fas').toggleClass('fa-unlock');
    });
    if ($("div").is("#map")) {
        mapboxgl.accessToken = 'pk.eyJ1Ijoic3Rvc2NhciIsImEiOiJja2VpbDE4b2UwbDg3MnNwY2d3YzlvcDV5In0.e26tLedpKwxrkOmPkWhQlg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/stoscar/ckr3l0wj625iz17mhhfrwf7oo',
            center: [-70.00133907824335, 18.49315226156898],
            zoom: 9
        });
        var marker = new mapboxgl.Marker()
            .setLngLat([-70.00133907824335, 18.49315226156898])
            .addTo(map);
    }
    /***************************

    isotope

    ***************************/
    $('.filter a').on('click', function() {
        $('.filter .current').removeClass('current');
        $(this).addClass('current');

        var selector = $(this).data('filter');
        $('.masonry-grid').isotope({
            filter: selector
        });
        return false;
    });

    $('.menu li').on("click", function() {
        $('.menu li').removeClass('current-item');
        $(this).addClass('current-item');
    });
    $(document).ready(function() {
        $('.masonry-grid').isotope({
            filter: '*',
            itemSelector: '.masonry-grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
    });
});