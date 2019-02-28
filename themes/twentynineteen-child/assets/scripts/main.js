/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages

                $(".js-modal-btn").modalVideo();

                $('#hs-eu-confirmation-button').on('click', function () {
                    dataLayer.push({'event': 'consentGiven'});
                });

            },
            finalize: function () {

                var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
                var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
                var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
                var is_safari = navigator.userAgent.indexOf("Safari") > -1;
                var is_opera = navigator.userAgent.toLowerCase().indexOf("op") > -1;
                if (is_safari) {
                    // console.log('Safari');
                    $('body').addClass('safari');
                }
                if (is_chrome) {
                    // console.log('Chrome');
                    $('body').addClass('chrome');
                }
                if (is_firefox) {
                    //  console.log('Firefox');
                    $('body').addClass('firefox');
                }
                if (is_explorer) {
                    //  console.log('Explorer');
                    $('body').addClass('explorer');
                }
                if (is_opera) {
                    //  console.log('Opera');
                    $('body').addClass('opera');
                }

                //looks for iframes wraps and adapts the height and width
                (function (window, document, undefined) {

                    /*
                     * Grab all iframes on the page or return
                     */
                    var iframes = document.getElementsByTagName('iframe');

                    /*
                     * Loop through the iframes array
                     */
                    for (var i = 0; i < iframes.length; i++) {

                        var iframe = iframes[i],

                            /*
                             * RegExp, extend this if you need more players
                             */
                            players = /www.youtube.com|player.vimeo.com/;

                        /*
                         * If the RegExp pattern exists within the current iframe
                         */
                        if (iframe.src.search(players) > 0) {

                            /*
                             * Calculate the video ratio based on the iframe's w/h dimensions
                             */
                            var videoRatio = (iframe.height / iframe.width) * 100;

                            /*
                             * Replace the iframe's dimensions and position
                             * the iframe absolute, this is the trick to emulate
                             * the video ratio
                             */
                            iframe.style.position = 'absolute';
                            iframe.style.top = '0';
                            iframe.style.left = '0';
                            iframe.width = '100%';
                            iframe.height = '100%';

                            /*
                             * Wrap the iframe in a new <div> which uses a
                             * dynamically fetched padding-top property based
                             * on the video's w/h dimensions
                             */
                            var wrap = document.createElement('div');
                            wrap.className = 'fluid-vids';
                            wrap.style.width = '100%';
                            wrap.style.position = 'relative';
                            wrap.style.paddingTop = videoRatio + '%';

                            /*
                             * Add the iframe inside our newly created <div>
                             */
                            var iframeParent = iframe.parentNode;
                            iframeParent.insertBefore(wrap, iframe);
                            wrap.appendChild(iframe);

                        }

                    }

                })(window, document);

// Animation,
                // JavaScript to be fired on all pages, after page specific JS is fired
                window.sr = ScrollReveal({
                    // reset: true
                });

                if ($(".animation")[0]) {
                    // Do something if class exists
                    sr.reveal(".animation", {
                        origin: origin,
                        delay: delay,
                        duration: duration,
                        distance: distance,
                        easing: easing,
                        scale: scale,

                    });
                } else {
                    // Do something if class does not exist
                }


//CAROUSEL
                $('.carousel').slick({
                    dots: false,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    speed: 300,
                    autoplay: true,
                    autoplaySpeed: 5000,

                });


//CLICK AND TEXT TOGGLE
                $(".slidingDiv").hide();
                $('.show_hide').on("click", function () {
                    if ($(this).html() == 'Read More') {
                        $(this).html('Read Less');
                    } else {
                        $(this).html('Read More');
                    }
                    $(this).closest('.inner_block').siblings('.slidingDiv')
                        .slideToggle();
                });

// Add smooth scrolling to all links
                $('a[href*=#]').on('click', function (event) {

                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top - 200
                        }, 400, function () {


                        });
                    } // End if
                });

                //LIGHTBOX

                $('.gallery-item').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    disableOn: 0,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        preload: [0, 2]
                    }
                });

// SHARE LINKS

                setShareLinks();

                function socialWindow(url) {
                    var left = (screen.width - 570) / 2;
                    var top = (screen.height - 570) / 2;
                    var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
                    // Setting 'params' to an empty string will launch
                    // content in a new tab or window rather than a pop-up.
                    // params = "";
                    window.open(url, "NewWindow", params);
                }

                function setShareLinks() {
                    var pageUrl = encodeURIComponent(document.URL);
                    var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));

                    $(".social-share.facebook").on("click", function () {
                        url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
                        socialWindow(url);
                    });

                    $(".social-share.twitter").on("click", function () {
                        url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
                        socialWindow(url);
                    });

                    $(".social-share.linkedin").on("click", function () {
                        url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
                        socialWindow(url);
                    })
                }

            },


        },
        // Home page

        'home': {
            init: function () {
                // JavaScript to be fired on the home page
                console.log('Home Page');

            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS

            }
        },

        // Flexible page
        'flexible': {
            init: function () {
                // JavaScript to be fired on the home page

            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS

            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function () {
                // JavaScript to be fired on the about us page
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
