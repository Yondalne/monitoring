jQuery.noConflict()(function ($) {
$(document).ready(function ($) {

    	
	/*************************
     Preloader
    *************************
    $(window).load(function(){
        $("body").addClass("page-loaded");	
    });

    /*************************
     Page transition
    *************************
		$('body a').on('click', function(e) {
			
			if (typeof $( this ).data('fancybox', 'filter') == 'undefined') {
			e.preventDefault(); 	
			var url = this.getAttribute("href"); 
			if( url.indexOf('#') != -1 ) {
			var hash = url.substring(url.indexOf('#'));
				
			if( $('body ' + hash ).length != 0 ){
			    $('.transition-overlay').removeClass("active");
			}
			}
			else {
                $('.transition-overlay').toggleClass("active");
                setTimeout(function(){
                window.location = url;
                },1300); 
			}
			}
		});

    /*************************
     Back to top
    *************************/
        var $window = $(window);
        var $goToTop = $('#back-to-top');
        $goToTop.hide();
        $window.scroll(function () {
            if ($window.scrollTop() > 100) $goToTop.fadeIn();
                else $goToTop.fadeOut();
        });
        $goToTop.on("click", function () {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
            return false;
        });
        });
    
    /*************************
      image reveal
    *************************/ 

      const images = document.querySelectorAll(".img-container");

      const removeOverlay = overlay => {
          let tl = gsap.timeline();
          tl.to(overlay, {
              duration: 1.4,
              ease: "Power2.easeInOut",
              width: "0%"
          });
          return tl;
      };
  
      const scaleInImage = image => {
          let tl = gsap.timeline();
  
          tl.from(image, {
              duration: 1.4,
              scale: 1.4,
              ease: "Power2.easeInOut"
          });
          return tl;
      };
  
      images.forEach(image => {
    
          gsap.set(image, {
              visibility: "visible"
          });
    
          const overlay = image.querySelector('.img-overlay');
          const img = image.querySelector("img");
  
          const masterTL = gsap.timeline({ paused: true });
          masterTL
          .add(removeOverlay(overlay))
          .add(scaleInImage(img), "-=1.4");
      
          
          let options = {
              threshold: 0
          }
  
          const io = new IntersectionObserver((entries, options) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      masterTL.play();
                  } else {
              masterTL.progress(0).pause()
          }
              });
          }, options);
  
          io.observe(image);
      });

    /*----------------------------------------------------------/
    /*              flash info - Modern ticker             */
    /*----------------------------------------------------------*/

    $(".ticker1").modernTicker({ effect: "scroll", scrollType: "continuous", scrollStart: "inside", scrollInterval: 20, transitionTime: 500, autoplay: true });
    $(".ticker2").modernTicker({ effect: "fade", displayTime: 4e3, transitionTime: 300, autoplay: true });
    $(".ticker3").modernTicker({ effect: "type", typeInterval: 10, displayTime: 4e3, transitionTime: 300, autoplay: true });
    $(".ticker4").modernTicker({ effect: "slide", slideDistance: 100, displayTime: 4e3, transitionTime: 350, autoplay: true })

    /*************************
     Event - EasyTicker
     *************************/

     $('.myWrapper').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 6000,
        height: 'auto',
        visible: 1,
        mousePause: true,
        controls: {
            up: '',
            down: '',
            toggle: '',
            playText: 'Play',
            stopText: 'Stop'
        },
        callbacks: {
            before: false,
            after: false
        }
    });

    /*************************
    phototheque
    *************************/
    if ($('#lightgallery').length) {
        $(document).ready(function(){
            jQuery('#lightgallery').lightGallery({
                thumbnail:false,
                animateThumb: false,
                showThumbByDefault: false,
            });
        });
    }

    /*************************
     date
    *************************/

    /*document.getElementById("date_zone").innerHTML = formatAMPM();
    function formatAMPM() {
    var d = new Date(),
        minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
        hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
        ampm = d.getHours() >= 12 ? 'pm' : 'am',
        months = ['Jan','Fev','Mar','Avr','Mai','Jui','Juil','Aou','Sep','Oct','Nov','Dec'],
        days = ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'];
    return days[d.getDay()]+' '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+' '+hours+':'+minutes+ampm;
    }*/

    /*************************
     Superslide
    *************************/
    $('#slides').superslides({
        animation: 'fade',
        pagination:true,
        play:10000,
        inherit_width_from: '.wide-container',
        inherit_height_from: '.wide-container'
    });

    /*************************
     Owl Slider Init
    *************************/

     if ($('#photo_slider').length) {
        var config = CONFIG.photo_slider;
        $("#photo_slider").owlCarousel(config);
    }
    if ($('#focus_elmts').length) {
        var config = CONFIG.focus_elmts;
        $("#focus_elmts").owlCarousel(config);
    }
    if ($('#structure').length) {
        var config = CONFIG.structure;
        $("#structure").owlCarousel(config);
    }

    /*************************
     Event - EasyTicker
    *************************

    $('.myWrapper').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 6000,
        height: 'auto',
        visible: 1,
        mousePause: true,
        controls: {
            up: '',
            down: '',
            toggle: '',
            playText: 'Play',
            stopText: 'Stop'
        },
        callbacks: {
            before: false,
            after: false
        }
    });

    $('.wrapper_month_birth').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 6000,
        height: 'auto',
        visible: 3,
        mousePause: true,
        controls: {
            up: '',
            down: '',
            toggle: '',
            playText: 'Play',
            stopText: 'Stop'
        },
        callbacks: {
            before: false,
            after: false
        }
    });

    /*==============================
     tchatmenu
    ==============================*/

    jQuery('#site').on("click", ".option_btn_menu", function() { 
        jQuery('body').toggleClass('menu_shown_option');
    });
    jQuery('#site').on("click", ".close_zone", function() { 
        jQuery('body').toggleClass('menu_shown_option');
    });

    /*************************
     Video modal
    *************************/

    jQuery(".js-modal-btn").modalVideo({
        youtube:{
            controls:1,
            autoplay: true,
            nocookie: true
        }
    })
    jQuery(".video_launch").modalVideo({
        youtube:{
            controls:1,
            autoplay: true,
            nocookie: true
        }
    })

    /*************************
     menu_responsive
    *************************/

    jQuery('header').on("click", ".menu-button", function() { 
        jQuery('body').toggleClass('menu_shown');
        $('body').toggleClass('body--static')
    });

    function hiddenBarMenuConfig() {
        var menuWrap = $('.menu_wrapper .menu');
        // appending expander button
        menuWrap.find('.dropdown').children('a').append(function () {
            return '<button type="button" class="btn expander"><i class="icon fa fa-angle-down"></i></button>';
        });

        menuWrap.find('.sub_menu').hide();
        menuWrap.find('a.expander').each(function () {
        $(this).on('click', function () {
            $(this).parent().children('ul').slideToggle();
            $(this).toggleClass('current');
            $(this).children().find('i').toggleClass('fa-angle-up fa-angle-down');
            return false;
        });
        });
    }
    hiddenBarMenuConfig();


    /*************************
                parallax_object
    /*************************/

    $.fn.moveIt = function(){
        var $window = $(window);
        var instances = [];
        
        $(this).each(function(){
          instances.push(new moveItItem($(this)));
        });
        
        window.onscroll = function(){
          var scrollTop = $window.scrollTop();
          instances.forEach(function(inst){
            inst.update(scrollTop);
          });
        }
      }
      
      var moveItItem = function(el){
        this.el = $(el);
        this.speed = parseInt(this.el.attr('data-scroll-speed'));
      };
      
      moveItItem.prototype.update = function(scrollTop){
        var pos = scrollTop / this.speed;
        this.el.css('transform', 'translateY(' + -pos + 'px)');
      };
      
      $(function(){
        $('[data-scroll-speed]').moveIt();
      });
    
    /*************************
    Appear JS
    **************************/

    if ($.fn.appear){
        $('[data-ride="animated"]').appear();
        if( !$('html').hasClass('ie no-ie10') ) {
            $('[data-ride="animated"]').addClass('appear');
            $('[data-ride="animated"]').on('appear', function() {
                var $el = $(this), $ani = ($el.data('animation') || 'fadeIn'), $delay;
                if ( !$el.hasClass('animated') ) {
                    $delay = $el.data('delay') || 0;
                    setTimeout(function(){
                        $el.removeClass('appear').addClass( $ani + " animated" );
                    }, $delay);
                }
            });
        };
        $('.animated').appear();
        $('.number-animator').appear();
        $('.number-animator').on('appear', function() {
            $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-animation-duration")));
        });
    }

    /*************************
     aos effect
    *************************/

    AOS.init();
    

  
    /*************************
		Search Box Popup JS
    *************************/
    function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
        $($searchOpen).on('click', function (e) {
            e.preventDefault();
            $($searchBox).addClass($toggleCls);
        });
        $($searchBox).on('click', function (e) {
            e.stopPropagation();
            $($searchBox).removeClass($toggleCls);
        });
        $($searchBox).find('form').on('click', function (e) {
            e.stopPropagation();
            $($searchBox).addClass($toggleCls);
        });
        $($searchCls).on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $($searchBox).removeClass($toggleCls);
        });
    };
    popupSarchBox('.popup-search-box', '.searchBoxTrigger', '.searchClose', 'show');

    /*---------------------------------------------- 
                phrasesZ
    ------------------------------------------------*/

    if ($('.phrases').length) {
        jQuery(function($){
            var data = {
                // to add a new more phrases just a replicate below
                phrases: [
                    { phrase: "la marque indispensable dans vos ménages" }, 
                    { phrase: "une valeur ajoutée pour votre entreprise" },    
                    { phrase: "un accélérateur d'avenir"},              
                ]
            };
            $.each(data.phrases,function(i,itemData){
                var p = $('<span>').text(itemData.phrase);
                if (i == 0) p.addClass('active');
                else p.css({'opacity': '0.0', 'display':'none'});
                $('.phrases').append(p);
            });
            function nextPhrase() {
                var $active = $('.phrases span.active');
                if ( $active.length == 0 ) $active = $('.phrases span:last');
                var $next =  $active.next().length ? $active.next() : $('.phrases span:first');

                $active.removeClass('active').animate({opacity: 0.0}, 1000, function(){
                    $active.hide();
                    $next.show().addClass('active').animate({opacity: 1.0}, 1000);
                });
            }
            // phrases currently change every 5 seconds. You can edit this time below
            setInterval(nextPhrase, 5000 );
        });
    };

    /*************************
     member_bot
    *************************
    jQuery('#site').on("click", ".member_bot", function() { 
        jQuery('body').toggleClass('open_member_bot');
    });
    $('.close_zone').on("click", function() { 
        $("body").removeClass('open_member_bot');
    });

    /*************************
     phototheque
    *************************
    if ($('#lightgallery').length) {
        $(document).ready(function(){
            jQuery('#lightgallery').lightGallery({
                thumbnail:false,
                animateThumb: false,
                showThumbByDefault: false,

            });
        });
    }
    */

    if ($('.slide_news').length) {
        $(document).ready(function(){
            var swiper = new Swiper(".swiper-container", {
                slidesPerView: 1,
                spaceBetween: 1,
                freeMode: false,
                effect: "fade",
                loop: true,
                centeredSlides: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                     },
                    480: {
                      slidesPerView: 1,
                    },
                    769: {
                      slidesPerView: 1,
                    },
                    1199: {
                      slidesPerView: 1,
                    },
                },
            });
        });
    };
    




});
