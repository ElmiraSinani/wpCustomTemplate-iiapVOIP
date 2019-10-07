/* -----------------------------------------------------------------
 
 [Content Structure]
 
 01. Global variables and Helper Functions
 02. Megamenu
 03. Vertical Menu
 04. Fixed Header
 05. Slider config
 06. Carousel config
 07. Plugins config 
 #
 Stellar, Flickr Feed, Zoom, Raty, Range Slider, Text Rotator, 
 Bootstrap config, Twitter feed, CountTo, MagnificPopup, Sharrre
 #
 08. Miscellaneous
 09. Animations
 10. Portfolio configurations (isotope)
 11. Parallax Backgrounds
 12. Window resize
 
 ------------------------------------------------------------------- */

jQuery(document).ready(function ($) {
    "use strict";


    /* Global variables */
    /* ========================================================== */


    /* Validate function */
    function validate_data(data, def) {
        return (data !== undefined) ? data : def;
    }

    var $win = $(window);

    // body 
    var $body = $('body');

    // Window width (without scrollbar)
    var $windowWidth = $win.width();

    // Detect Mobile Devices 
    var isMobileDevice = ((navigator.userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|Windows Phone|IEMobile|Opera Mini|Mobi/i) || ($windowWidth < 768)) ? true : false);

    var isTouchDevice = ((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) ? true : false);

    // Check media query 
    var mediaWidth = $('.check-media').width();

    // detect IE browsers
    var ie = (function () {
        var rv = 0,
                ua = window.navigator.userAgent,
                msie = ua.indexOf('MSIE '),
                trident = ua.indexOf('Trident/');

        if (msie > 0) {
            // IE 10 or older => return version number
            rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        } else if (trident > 0) {
            // IE 11 (or newer) => return version number
            var rvNum = ua.indexOf('rv:');
            rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
        }

        return ((rv > 0) ? rv : 0);
    }());



    /* Megamenu */
    /* ========================================================== */


    var menu = $(".menu");
    var Megamenu = {
        desktopMenu: function () {

            menu.children("li").show(0);
            menu.children(".toggle-menu").hide(0);


            // touch event for tablets > 991px or laptops with touch screen
            if (isMobileDevice || isTouchDevice) {

                menu.on("click touchstart", "a", function (e) {

                    if ($(this).attr('href') === '#') {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    var $this = $(this),
                            $sub = $this.siblings(".submenu, .megamenu");

                    $this.parent("li").siblings("li").find(".submenu, .megamenu").stop(true, true).fadeOut(300);

                    if ($sub.css("display") === "none") {
                        $sub.stop(true, true).fadeIn(300);
                    } else {
                        $sub.stop(true, true).fadeOut(300);
                        $this.siblings(".submenu").find(".submenu").stop(true, true).fadeOut(300);
                    }
                });

                $(document).on("click.menu touchstart.menu", function (e) {

                    if ($(e.target).closest(menu).length === 0) {
                        menu.find(".submenu, .megamenu").fadeOut(300);
                    }
                });

                // Desktop hover effect	
            } else {
                menu.find('li').on({
                    "mouseenter": function () {
                        $(this).children(".submenu, .megamenu").stop(true, true).fadeIn(300);
                    },
                    "mouseleave": function () {
                        $(this).children(".submenu, .megamenu").stop(true, true).fadeOut(300);
                    }
                });
            }
        },
        mobileMenu: function () {

            // Toggle Menu
            var $children = menu.children("li"),
                    $toggle = menu.children("li.toggle-menu"),
                    $notToggle = $children.not("toggle-menu");


            $notToggle.hide(0);
            $toggle.show(0).on("click", function () {

                if ($children.is(":hidden")) {
                    $children.slideDown(300);
                } else {
                    $notToggle.slideUp(300);
                    $toggle.show(0);
                }
            });

            // Click (touch) effect
            menu.find("li").not(".toggle-menu").each(function () {

                var $this = $(this);

                if ($this.children(".submenu, .megamenu").length) {

                    $this.children("a").on("click", function (e) {

                        if ($(this).attr('href') === '#') {
                            e.preventDefault();
                            e.stopPropagation();
                        }

                        var $sub = $(this).siblings(".submenu, .megamenu");

                        if ($sub.hasClass("open")) {
                            $sub.slideUp(300).removeClass("open");
                        } else {
                            $sub.slideDown(300).addClass("open");
                        }
                    });
                }
            });
        },
        unbindEvents: function () {
            menu.find("li, a").off();
            $(document).off("click.menu touchstart.menu");
            menu.find(".submenu, .megamenu").hide(0);
        }
    }; // END Megamenu object


    if (mediaWidth === 991) {
        Megamenu.mobileMenu();
    } else {
        Megamenu.desktopMenu();
    }




    /* Vertical Menu */
    /* ========================================================== */


    // Vertical Menu Trigger 
    $("#vertical-menu-trigger").on("click", function () {
        $("body").toggleClass("vertical-menu-on");

        var $icon = $(this).find(".icon");

        if ($icon.hasClass("icon_menu")) {
            $icon.removeClass("icon_menu").addClass("icon_close");
        } else {
            $icon.removeClass("icon_close").addClass('icon_menu');
        }

        return false;
    });

    $("#vertical-menu-close").on("click", function () {
        $("body").toggleClass("vertical-menu-on");
        return false;
    });

    if ($(".vertical-menu-wrapper").length) {
        var scroll_height = $(".vertical-menu-wrapper")[0].scrollHeight;
        $(".vertical-menu-wrapper").find(".bg-overlay").css("height", scroll_height);
    }


    // Top Bar Wrapper
    function topBarHeight() {
        var barWrapper = $(".top-bar-wrapper"),
                barHeight = ((barWrapper.outerHeight()) * (-1));

        barWrapper.css("top", barHeight);
    }
    topBarHeight();

    $("#top-bar-trigger").on("click", function () {
        $(".top-bar-wrapper").toggleClass('on');
        return false;
    });




    /* Fixed Header */
    /* ========================================================== */

    function fixedHeader() {
        $(".main-header").sticky({
            topSpacing: 0,
            className: "menu-fixed"
        });
    }

    if ((!$('.static-menu').length)) {
        fixedHeader();
    }



    /* Slider Configurations */
    /* ========================================================== */

    if ($('.tp-banner-container').length) {

        $(".tp-banner-container").each(function () {

            var tp = $(this);
            var rs = {
                "startWidth": validate_data(tp.data('start-width'), (($windowWidth < 991) ? 720 : 1170)),
                "startHeight": validate_data(tp.data('start-height'), 650),
                "fullWidth": validate_data(tp.data("full-width"), "off"),
                "fullScreen": validate_data(tp.data("full-screen"), "off"),
                "fullScreenOffsetContainer": validate_data(tp.data("full-screen-offset-container"), "#nothing"),
                "fullScreenOffset": validate_data(tp.data("full-screen-offset"), "0px"),
                "navigationType": validate_data(tp.data('navigation-type'), 'thumb'),
                // "bullet", "thumb", "none"
                "navigationStyle": validate_data(tp.data('navigation-style'), 'round'),
                // "preview1", "preview2","preview3","preview4","round", "square", "round-old", "square-old", "navbar-old"
                "navigationArrows": validate_data(tp.data('navigation-arrows'), 'none'),
                // "nexttobullets", "solo" 

                "hideTimeBar": validate_data(tp.data('hide-time-bar'), "on"),
                "spinner": validate_data(tp.data('spinner'), "spinner4"),
                // "spinner1" , "spinner2", "spinner3" , "spinner4", "spinner5
                "onHoverStop": validate_data(tp.data("on-hover-stop"), "on"),
                "dottedOverlay": validate_data(tp.data("dotted-overlay"), "none")
                        //"none", "twoxtwo", "threexthree", "twoxtwowhite", "threexthreewhite"

            };

            var revapi = $(this).find('.tp-banner').revolution({
                delay: 9000,
                hideThumbs: 200,
                startwidth: (($windowWidth < 768) ? 600 : rs.startWidth),
                startheight: (($windowWidth < 768) ? 450 : rs.startHeight),
                fullWidth: rs.fullWidth,
                fullScreen: rs.fullScreen, // fullWidth have to be off

                fullScreenOffsetContainer: rs.fullScreenOffsetContainer,
                fullScreenOffset: rs.fullScreenOffset,
                thumbWidth: 120,
                thumbHeight: 50,
                thumbAmount: 3,
                navigationType: rs.navigationType,
                navigationStyle: rs.navigationStyle,
                navigationArrows: rs.navigationArrows,
                hideTimerBar: rs.hideTimeBar,
                spinner: rs.spinner,
                onHoverStop: rs.onHoverStop,
                dottedOverlay: rs.dottedOverlay,
                videoLoop: "loop",
                // Parralax	
                parallax: "scroll",
                parallaxBgFreeze: "on",
                parallaxLevels: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                parallaxDisableOnMobile: "on"
            });

            // Set a background overlay for revolution slider videos
            revapi.on("revolution.slide.onloaded", function () {
                $(this).find(".tp-video-play-button").after($('<div class="bg-overlay" style="z-index:7;"></div>'));
            });

        });

    }


    /* Carousel Configurations */
    /* ========================================================== */

    // Init Carousels - Owl Carousel
    function initCarousels() {

        if (($().owlCarousel) && ($(".owl-carousel").length)) {

            $(".owl-columns5").owlCarousel({
                itemsCustom: [[0, 1], [767, 3], [991, 4], [1199, 5]],
                navigation: true,
                pagination: false,
                autoplay: false,
                navigationText: ["<i class='icon arrow_carrot-left'></i>", "<i class='icon arrow_carrot-right'></i>"],
            });

            $(".owl-columns4").owlCarousel({
                itemsCustom: [[0, 1], [767, 2], [991, 3], [1199, 4]],
                navigation: true,
                pagination: false,
                autoplay: false,
                navigationText: ["<i class='icon arrow_carrot-left'></i>", "<i class='icon arrow_carrot-right'></i>"],
            });

            $(".owl-columns3").owlCarousel({
                itemsCustom: [[0, 1], [767, 2], [991, 3]],
                navigation: true,
                pagination: false,
                autoplay: false,
                navigationText: ["<i class='icon arrow_carrot-left'></i>", "<i class='icon arrow_carrot-right'></i>"],
            });

            $(".owl-columns2").owlCarousel({
                itemsCustom: [[0, 1], [767, 1], [991, 2]],
                navigation: true,
                pagination: false,
                autoplay: false,
                navigationText: ["<i class='icon arrow_carrot-left'></i>", "<i class='icon arrow_carrot-right'></i>"],
            });

            $(".owl-columns1").owlCarousel({
                singleItem: true,
                stopOnHover: true,
                pagination: false,
                navigation: true,
                autoPlay: false,
                navigationText: ["<i class='icon arrow_carrot-left'></i>", "<i class='icon arrow_carrot-right'></i>"],
            });

        }
    }

    $(window).load(function () {
        initCarousels();
    });



    /* Plugins Configurations */
    /* ========================================================== */
    /* Animsition, Text Rotator, Flickr Feed, Zoom, Raty, Range Slider, CountTo, Magnific Popup, Sharrre */

    // Timeout when there might be an error or
    setTimeout(function () {
        $(".animsition").css({
            "opacity": 1,
            "transition": "all 0.7s ease-out"
        });
        // update-v1.2.0
        $(".animsition-loading").css({
            "opacity": 0,
            "transition": "all 0.7s ease-out",
            "z-index": "-1"
        });
    }, 5000);

    // Animsition
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: 'a:not([target="_blank"]):not([href^=#]):not(".init-popup"):not(.animsition-off)',
        loading: true,
        loadingParentElement: 'body',
        loadingClass: 'animsition-loading',
        unSupportCss: ['animation-duration',
            '-webkit-animation-duration',
            '-o-animation-duration',
            '-ms-animation-duration'
        ],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body'
    });



    /* ========================================================== */


    // OnePage Navigation plugin configurations 
    if (($().onePageNav) && $("#onepagenav").length) {
        $("#onepagenav").onePageNav();
    }


    /* ========================================================== */


    // Range Slider configarations 
    if (($().jRange) && $(".range-slider").length) {
        $('.range-slider').jRange({
            from: 0,
            to: 1000,
            step: 1,
            showScale: false,
            format: '$ %s',
            theme: "theme-jrange",
            width: 300,
            showLabels: true,
            isRange: true
        });
    }


    /* ========================================================== */


    // countTo plugin configarations
    if (($().countTo) && ($('.stats-timer').length)) {

        if (isMobileDevice) {
            $('.stats-content').find(".stats-timer").countTo();
        } else {
            // appear init and then countTo
            $(".stats-content").appear(function () {
                $(this).find(".stats-timer").countTo();
            });
        }

    } // END if



    /* ========================================================== */


    // Magnific-popup configurations ( Gallery Template )
    if (($().magnificPopup) && ($(".init-popup").length)) {

        // Popup Gallery
        $(".popup-gallery").magnificPopup({
            delegate: "a.init-popup",
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1],
                tCounter: '<span class="mfp-counter">%curr% / %total%</span>'
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function (item) {
                    return '<h5 class="title-mfp">' + item.el.attr("title") + '</h5>';
                }
            }
        });

        // Popup Image
        $(".image-popup").magnificPopup({
            type: "image",
            closeOnContentClick: true,
            mainClass: "mfp-with-zoom",
            image: {
                tError: '<a href="%url%">The image</a> could not be loaded.',
                titleSrc: function (item) {
                    return '<h5 class="title-mfp">' + item.el.attr("title") + '</h5>';
                },
                verticalFit: true
            }
        });
    }


    /* ========================================================== */


    // Sharrre plugin 
    if (($().sharrre) && $(".sharrre").length) {

        $("#shareit").sharrre({
            share: {
                twitter: true,
                facebook: true,
                googlePlus: true
            },
            enableHover: false,
            urlCurl: "libs/sharrre/sharrre.php",
            enableTracking: ((typeof (_gaq) != 'undefined') ? true : false),
            template: "<ul class='social-icon'><li><a href='#'><i class='icon social_facebook'></i></a></li><li><a href='#'><i class='icon social_twitter'></i></a></li><li><a href='#'><i class='icon social_googleplus'></i></a></li></ul>",
            render: function (api, options) {
                $(api.element).on("click", ".social_twitter", function () {
                    api.openPopup("twitter");
                });
                $(api.element).on("click", ".social_facebook", function () {
                    api.openPopup("facebook");
                });
                $(api.element).on("click", ".social_googleplus", function () {
                    api.openPopup("googlePlus");
                });
            }
        });
    }



    /* Miscellaneous */
    /* ========================================================== */


    // Bootstrap configarations
    // Tooltips 
    if ($().tooltip) {
        $("[data-toggle='tooltip']").tooltip();
    }
    // Popovers
    if ($().popover) {
        $("[data-toggle='popover']").popover();
    }


    /* ========================================================== */


    // Contact page overlay - Button see map 
    $("#contact-see-map").on("click", function () {
        $(".contact-map-overlay").toggleClass('map-on');
        return false;
    });



    /* ========================================================== */


    // Quantity control shop
    $(".js-qty").on("click", function () {

        var $this = $(this);
        var oldValue = $this.siblings('.input-quantity').val();
        var newVal;

        if ($this.hasClass('plus')) {
            newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $this.siblings('.input-quantity').val(newVal);
    });


    /* ========================================================== */

    // Back to Top Button
    $body.append($('<div class="back-to-top"><i class="icon arrow_carrot-up"></i></div>'));

    $win.scroll(function () {
        if ($(this).scrollTop() > 1) {
            $('.back-to-top').css({bottom: "0"});
        } else {
            $('.back-to-top').css({bottom: "-100px"});
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: '0'}, 500);
        return false;
    });


    /* ========================================================== */

    // Toggle Sidebar
    $("#toggle-sidebar").on('click', function () {
        $(".sidebar").toggleClass('on');
        return false;
    });



    /* ========================================================== */


    // Notifications 
    $("#show_notification").on("click", function () {
        $(".alert-modal").addClass('alert-modal-on');
        return false;
    });

    /* ========================================================== */


    // Tabs - active class
    $('.tabs-active a').on('click', function () {
        $('.tabs-active a').removeClass('active');
        $(this).addClass('active');
        return false;
    });


    /* ========================================================== */

    // Clients 
    if ($('.client-slider').length) {

        setInterval(function () {

            $('.client-slider.on').removeClass('on');

            var random = Math.floor(Math.random() * 5);
            $('#c-' + random).addClass('on');

            var imgOn = $('.client-slider.on').find('.c-img.on').removeClass('on');

            if (imgOn.next() && imgOn.next().length) {
                imgOn.next().addClass('on');
            } else {
                imgOn.siblings(':first').addClass('on');
            }

        }, 800);
    }


    /* ========================================================== */


    // Body full height 
    function setWindowHeight() {
        var windowHeight = $(window).height();
        $(".window-fullheight").css("height", windowHeight);
    }

    setWindowHeight();

    /* ========================================================== */


    // Max Height 
    function max_height() {
        $(".max_height").each(function () {
            var maxHeight = 0;
            $(this).find(".el_max_height").each(function () {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            }).height(maxHeight);
        });
    }

    $(window).load(function () {
        max_height();
    });



    /* ========================================================== */


    // Fix column sibling height 
    function fixHeight() {
        $(".data-height-fix").each(function () {
            var $this = $(this),
                    siblingHeight = $this.find($(".get-height")).outerHeight();
            $this.find(".set-height").css("height", siblingHeight);
        });
    }

    $(window).load(function () {
        fixHeight();
    });





    /* ========================================================== */


    // Remove from Cart
    $('.remove-product').click(function () {
        $(this).parent("td").parent("tr").hide();
        return false;
    });

    // Add to Cart 
    $(".add-to-cart-btn").on('click', function () {
        $(".box-added-to-cart").show('slow');
        return false;
    });


    /* ========================================================== */


    // Fix height attribute on iframes
    $('iframe').each(function () {
        var $this = $(this);
        $this.css('height', $this.attr('height') + 'px');

    });


    /* ========================================================== */


    /* Responsive Videos - 16:9 / 4:3 format */
    function rsEmbed() {
        $('.rs-video').each(function () {
            var $this = $(this),
                    embedWidth = $this.width(),
                    embedHeight = ($this.hasClass('video-4by3') ? (embedWidth * 0.75) : (embedWidth * 0.5625));

            $this.css('height', embedHeight + 'px');
        });
    }

    rsEmbed();



    /* ========================================================== */


    // Fix IE9 placeholder 
    if (ie === 9) {
        $.getScript('../libs/jquery.placeholder.js', function () {
            $('input, textarea').placeholder();
        });
    }





    /* Animations */
    /* ========================================================== */
    if (($().appear) && (isMobileDevice === false)) {

        $('.animated').appear(function () {
            var $this = $(this);

            $this.each(function () {

                var animation = $this.data('animation'),
                        delay = ($this.data('delay') + 'ms'),
                        speed = ($this.data('speed') + 'ms');

                $this.addClass('on').addClass(animation).css({
                    '-moz-animation-delay': delay,
                    '-webkit-animation-delay': delay,
                    'animation-delay': delay,
                    '-webkit-animation-duration': speed,
                    'animation-duration': speed
                });

            });
        }, {accX: 50, accY: -150});

    } else {

        $('.animated').removeClass("animated");
    }


    /* ========================================================== */


    // Progress bars animations
    $(".progress").each(function () {

        var $this = $(this);

        if (($().appear) && (isMobileDevice === false) && ($this.hasClass("no-anim") === false)) {

            $this.appear(function () {

                var $bar = $this.find(".progress-bar");
                $bar.addClass("progress-bar-animate").css("width", $bar.attr("data-percentage") + "%");


            }, {accY: -150});

        } else {

            var $bar = $this.find(".progress-bar");
            $bar.css("width", $bar.attr("data-percentage") + "%");
        }
    });




    /* Isotope Configurations */
    /* ========================================================== */

    function setPortfolio() {

        if ($().isotope && $('.grid-isotope').length) {

            var $portfolio = $('.portfolio'),
                    $layout = ($(".grid-fit-row").length ? "fitRows" : "masonry");

            $portfolio.isotope({
                itemSelector: '.grid-col',
                filter: '*',
                layoutMode: $layout,
                transitionDuration: '0.6s',
                masonry: {
                    columnWidth: '.grid-col'
                }
            });


            // Filter links
            $('.portfolio-filter > ul > li > a').on('click', function () {

                var $this = $(this),
                        fv = $this.attr('data-filter');

                $portfolio.isotope({filter: fv});

                $('.portfolio-filter > ul > li > a').removeClass('active');
                $this.addClass('active');

                return false;
            });

        } // END if 

    }

    $(window).load(function () {
        setPortfolio();
    });


    /* ========================================================== */


    // Grid columns settings
    $(".grid-settings").find(".col-settings").on("click", "a", function () {

        var col_number = "grid-col-" + $(this).data("col");

        $(".grid-isotope").find(".portfolio")
                .removeClass("grid-col-2 grid-col-3 grid-col-4 grid-col-5")
                .addClass(col_number);

        setPortfolio();
        return false;
    });

    // Close grid settings
    $(".close-grid-settings").on('click', function () {
        $(".grid-settings").removeClass("on");
        return false;
    });


    /* Parallax Background */
    /* ========================================================== */

    if (($(".stellar").length) && !isMobileDevice && $(window).width() > 991) {

        $(".stellar").css("background-attachment", "fixed");
        $("body").stellar({
            horizontalScrolling: false,
            verticalOffset: 0,
            horizontalOffset: 0,
            responsive: true,
            scrollProperty: 'scroll',
            parallaxElements: false
        });
    }




    /* Window Resize */
    /* ========================================================== */


    var globalResizeTimer = null;
    $(window).on("resize", function () {

        if (globalResizeTimer !== null) {
            window.clearTimeout(globalResizeTimer);
        }

        globalResizeTimer = window.setTimeout(function () {


            var $windowWidth = $win.width();
            var newMediaWidth = $('.check-media').width();
            var isMobileDevice = ((navigator.userAgent.match(/Android|webOS|iPhone|iPad|iPod|BlackBerry|Windows Phone|IEMobile|Opera Mini|Mobi/i) || ($windowWidth < 767)) ? true : false);


            if (mediaWidth === 991 && newMediaWidth === 0) {
                Megamenu.unbindEvents();
                Megamenu.desktopMenu();
            }

            if (mediaWidth === 0 && newMediaWidth === 991) {
                Megamenu.unbindEvents();
                Megamenu.mobileMenu();
            }

            mediaWidth = newMediaWidth;

            // Responsive videos
            rsEmbed();

            // Top Bar Wrapper height
            topBarHeight();

            // Set Window Height
            setWindowHeight();

            // Set the same height to siblings (just 2)
            fixHeight();

            // Set the maximum height of multiple siblings 
            max_height();


        }, 400);
    });
    
    
    //    contact page
    "use strict";

        // Initialize Google map
        var map = new GMaps({
            div: '#google-map',
            lat: 40.20471,
            lng: 44.53976
        });

        map.drawOverlay({
            lat: 40.20471,
            lng: 44.53976,
            verticalAlign: "top",
            horizontalAlign: "center",
            content: '<div class="map-overlay">' + '<h3 class="title title-small">VoIP Call Service</h3>' + '<div class="br-bottom mb20"></div>' + '<p class="mb10">Armenia, Yerevan, 1, P. Sevak str.</p>' + '</div>'
        });



        

       
        
        

});


