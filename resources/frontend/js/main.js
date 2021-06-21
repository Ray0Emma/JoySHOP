console.log('%c Proudly Crafted with ZiOn.', 'background: #222; color: #bada55');

/* ---------------------------------------------- /*
 * Preloader
 /* ---------------------------------------------- */
(function(){
    $(window).on('load', function() {
        $('.loader').fadeOut();
        $('.page-loader').delay(350).fadeOut('slow');
    });

    $(document).handler(function() {

        /* ---------------------------------------------- /*
         * WOW Animation When You Scroll
         /* ---------------------------------------------- */

        wow = new WOW({
            mobile: false
        });
        wow.init();


        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        

        


        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var homeSection = $('.home-section'),
            navbar      = $('.navbar-custom'),
            navHeight   = navbar.height(),
            worksgrid   = $('#works-grid'),
            width       = Math.max($(window).width(), window.innerWidth),
            mobileTest  = false;

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }

        buildHomeSection(homeSection);
        navbarAnimation(navbar, homeSection, navHeight);
        navbarSubmenu(width);
        hoverDropdown(width, mobileTest);

        // $(window).resize(function() {
        //     var width = Math.max($(window).width(), window.innerWidth);
        //     buildHomeSection(homeSection);
        //     hoverDropdown(width, mobileTest);
        // });

        // $(window).scroll(function() {
        //     effectsHomeSection(homeSection, this);
        //     navbarAnimation(navbar, homeSection, navHeight);
        // });

        /* ---------------------------------------------- /*
         * Set sections backgrounds
         /* ---------------------------------------------- */

        var module = $('.home-section, .module, .module-small, .side-image');
        module.each(function(i) {
            if ($(this).attr('data-background')) {
                $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
            }
        });

        /* ---------------------------------------------- /*
         * Home section height
         /* ---------------------------------------------- */

        function buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height($(window).height());
                } else {
                    homeSection.height($(window).height() * 0.85);
                }
            }
        }


        /* ---------------------------------------------- /*
         * Home section effects
         /* ---------------------------------------------- */

        // function effectsHomeSection(homeSection, scrollTopp) {
        //     if (homeSection.length > 0) {
        //         var homeSHeight = homeSection.height();
        //         var topScroll = $(document).scrollTop();
        //         if ((homeSection.hasClass('home-parallax')) && ($(scrollTopp).scrollTop() <= homeSHeight)) {
        //             homeSection.css('top', (topScroll * 0.55));
        //         }
        //         if (homeSection.hasClass('home-fade') && ($(scrollTopp).scrollTop() <= homeSHeight)) {
        //             var caption = $('.caption-content');
        //             caption.css('opacity', (1 - topScroll/homeSection.height() * 1));
        //         }
        //     }
        // }

        /* ---------------------------------------------- /*
         * Intro slider setup
         /* ---------------------------------------------- */

        if( $('.hero-slider').length > 0 ) {
            $('.hero-slider').flexslider( {
                animation: "fade",
                animationSpeed: 1000,
                animationLoop: true,
                prevText: '',
                nextText: '',
                before: function(slider) {
                    $('.titan-caption').fadeOut().animate({top:'-80px'},{queue:false, easing: 'swing', duration: 700});
                    slider.slides.eq(slider.currentSlide).delay(500);
                    slider.slides.eq(slider.animatingTo).delay(500);
                },
                after: function(slider) {
                    $('.titan-caption').fadeIn().animate({top:'0'},{queue:false, easing: 'swing', duration: 700});
                },
                useCSS: true
            });
        }


        /* ---------------------------------------------- /*
         * Rotate
         /* ---------------------------------------------- */

        $(".rotate").textrotator({
            animation: "dissolve",
            separator: "|",
            speed: 3000
        });


        /* ---------------------------------------------- /*
         * Transparent navbar animation
         /* ---------------------------------------------- */

        // function navbarAnimation(navbar, homeSection, navHeight) {
        //     var topScroll = $(window).scrollTop();
        //     if (navbar.length > 0 && homeSection.length > 0) {
        //         if(topScroll >= navHeight) {
        //             navbar.removeClass('navbar-transparent');
        //         } else {
        //             navbar.addClass('navbar-transparent');
        //         }
        //     }
        // }

        // /* ---------------------------------------------- /*
        //  * Navbar submenu
        //  /* ---------------------------------------------- */

        // function navbarSubmenu(width) {
        //     if (width > 767) {
        //         $('.navbar-custom .navbar-nav > li.dropdown').hover(function() {
        //             var MenuLeftOffset  = $('.dropdown-menu', $(this)).offset().left;
        //             var Menu1LevelWidth = $('.dropdown-menu', $(this)).width();
        //             if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
        //                 $(this).children('.dropdown-menu').addClass('leftauto');
        //             } else {
        //                 $(this).children('.dropdown-menu').removeClass('leftauto');
        //             }
        //             if ($('.dropdown', $(this)).length > 0) {
        //                 var Menu2LevelWidth = $('.dropdown-menu', $(this)).width();
        //                 if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
        //                     $(this).children('.dropdown-menu').addClass('left-side');
        //                 } else {
        //                     $(this).children('.dropdown-menu').removeClass('left-side');
        //                 }
        //             }
        //         });
        //     }
        // }

        // /* ---------------------------------------------- /*
        //  * Navbar hover dropdown on desctop
        //  /* ---------------------------------------------- */

        // function hoverDropdown(width, mobileTest) {
        //     if ((width > 767) && (mobileTest !== true)) {
        //         $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').removeClass('open');
        //         var delay = 0;
        //         var setTimeoutConst;
        //         $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').hover(function() {
        //                 var $this = $(this);
        //                 setTimeoutConst = setTimeout(function() {
        //                     $this.addClass('open');
        //                     $this.find('.dropdown-toggle').addClass('disabled');
        //                 }, delay);
        //             },
        //             function() {
        //                 clearTimeout(setTimeoutConst);
        //                 $(this).removeClass('open');
        //                 $(this).find('.dropdown-toggle').removeClass('disabled');
        //             });
        //     } else {
        //         $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').unbind('mouseenter mouseleave');
        //         $('.navbar-custom [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function(event) {
        //             event.preventDefault();
        //             event.stopPropagation();
        //             $(this).parent().siblings().removeClass('open');
        //             $(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
        //             $(this).parent().toggleClass('open');
        //         });
        //     }
        // }

        // /* ---------------------------------------------- /*
        //  * Navbar collapse on click
        //  /* ---------------------------------------------- */

        // $(document).on('click','.navbar-collapse.in',function(e) {
        //     if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
        //         $(this).collapse('hide');
        //     }
        // });

        /* ---------------------------------------------- /*
         * Post Slider
         /* ---------------------------------------------- */

        if ($('.post-images-slider').length > 0 ) {
            $('.post-images-slider').flexslider( {
                animation: "slide",
                smoothHeight: true,
            });
        }


        /* ---------------------------------------------- /*
         * Owl Carousel
         /* ---------------------------------------------- */

        // $('.owl-carousel').each(function(i) {

        //     // Check items number
        //     if ($(this).data('items') > 0) {
        //         items = $(this).data('items');
        //     } else {
        //         items = 4;
        //     }

        //     // Check pagination true/false
        //     if (($(this).data('pagination') > 0) && ($(this).data('pagination') === true)) {
        //         pagination = true;
        //     } else {
        //         pagination = false;
        //     }

        //     // Check navigation true/false
        //     if (($(this).data('navigation') > 0) && ($(this).data('navigation') === true)) {
        //         navigation = true;
        //     } else {
        //         navigation = false;
        //     }

        //     // Build carousel
        //     $(this).owlCarousel( {
        //         navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        //         nav: navigation,
        //         dots: pagination,
        //         loop: true,
        //         dotsSpeed: 400,
        //         items: items,
        //         navSpeed: 300,
        //         autoplay: 2000
        //     });

        // });

        /* ---------------------------------------------- /*
         * Scroll Animation
         /* ---------------------------------------------- */

        // $('.section-scroll').bind('click', function(e) {
        //     var anchor = $(this);
        //     $('html, body').stop().animate({
        //         scrollTop: $(anchor.attr('href')).offset().top - 50
        //     }, 1000);
        //     e.preventDefault();
        // });

    });
})