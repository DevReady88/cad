;(function($) { 

	"use strict";

	$(document).ready(function(){
		

		// initialise superfish
		if ( $.isFunction( $.fn.superfish ) ) {
			
			$(function(){
				$('ul.sf-menu').superfish({
				delay:       50,
				speed:       400,
				autoArrows:  false,
				dropShadows: false
				});
			});
		
		}
		
		
		// scrollup call
		if ( $.isFunction($.fn.scrollUp ) ) {
			jQuery(function () {
				jQuery.scrollUp({
					scrollName: 'scrollUp', // Element ID
					scrollDistance: 300, // Distance from top/bottom before showing element (px)
					scrollFrom: 'top', // 'top' or 'bottom'
					scrollSpeed: 600, // Speed back to top (ms)
					easingType: 'jswing', // Scroll to top easing (see http://easings.net/)
					animation: 'fade', // Fade, slide, none
					animationInSpeed: 200, // Animation in speed (ms)
					animationOutSpeed: 200, // Animation out speed (ms)
					scrollText: '', // Text for element, can contain HTML
					scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
					scrollImg: false, // Set true to use image
					activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
					zIndex: 1000 // Z-Index for the overlay
				});
			});	
		}
		
		
		// Responsive Menu
		if ( $.isFunction( $.fn.mmenu ) ) {
			
			$("#wpadminbar").css( "position", "fixed" ).addClass( "mm-slideout" );
			
			$("#standard-menu").mmenu({			
				// options
				navbars : {
					content : [ "close" ]
				},
				extensions: ["shadow-page"]
         				
			}, {
				// configuration
				clone : true,
				offCanvas : {
					pageSelector: "#celestial-canvas"
				},
				
			});
	
		}
		
		
		// Beautiful Dropdowns
		if ( $.isFunction( $.fn.select2 ) ) {
			$('.wpcf7-form-control-wrap select').select2();
			$('.page-content select').select2();
		}
		
		
		// Fluid Videos
		if ( $.isFunction($.fn.fitVids ) ) {
			$(function(){
				$('body').fitVids();
			});
		}
		
		
		/* entire block clickable for header contact box */	
		jQuery( ".celestial-main, .cel-homepage-slider-wrapper" ).on( "click", ".block-click", function() {
			window.location = jQuery(this).find( "a" ).attr( "href" );
			return false;
		});
		
		
		
		if ( $.isFunction( $.fn.slick ) ) {
			
			$(".cel-slider-parent").slick({
				dots: true,
				arrows: true,
				infinite: true,
				centerMode: false,
				slidesToShow: 1,
				slidesToScroll: 1,
				speed: 1000,
				fade: true,
				cssEase: 'linear',
				autoplay: true,
				appendArrows: $(".cel-slider-parent"),
				appendDots: $(".cel-slider-parent"),				
				responsive: [
					{
						breakpoint: 1440,
					  	settings: {
							slidesToShow: 1,
							infinite: true,
							dots: true,
							arrows: true
					  	}
							
					},
					{
						breakpoint: 991,
					  	settings: {
							slidesToShow: 1,
							infinite: true,
							dots: false,
							arrows: false
					  	}
							
					}					
					
					
				]
			});
			
		}
		
	
		// Magnific Popup
		if ( $.isFunction( $.fn.magnificPopup ) ) {		
		
		
			$('.magnific-popup').magnificPopup({
				type: 'image',
				gallery: { enabled:true },
				zoom: {
					enabled: true, // By default it's false, so don't forget to enable it
					duration: 300, // duration of the effect, in milliseconds
					easing: 'ease-in-out', // CSS transition easing function 

					// The "opener" function should return the element from which popup will be zoomed in
					// and to which popup will be scaled down
					// By defailt it looks for an image tag:
					opener: function(openerElement) {
					// openerElement is the element on which popup was initialized, in this case its <a> tag
					// you don't need to add "opener" option if this code matches your needs, it's defailt one.
					return openerElement.is('img') ? openerElement : openerElement.find('img');
					}
				}		


			});

			$('.magnific-popup-single').magnificPopup({
				type: 'image',
				gallery:{ enabled:false },
				zoom: {
					enabled: true, // By default it's false, so don't forget to enable it
					duration: 300, // duration of the effect, in milliseconds
					easing: 'ease-in-out', // CSS transition easing function 

					// The "opener" function should return the element from which popup will be zoomed in
					// and to which popup will be scaled down
					// By defailt it looks for an image tag:
					opener: function(openerElement) {
					// openerElement is the element on which popup was initialized, in this case its <a> tag
					// you don't need to add "opener" option if this code matches your needs, it's defailt one.
					return openerElement.is('img') ? openerElement : openerElement.find('img');
					}
				}		


			});	

			$('.magnific-popup-video').magnificPopup({
				type: 'iframe',
				gallery: { enabled:true }

			});	

			$('.magnific-popup-team').magnificPopup({
				type: 'inline',

				fixedContentPos: false,
				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,
				preloader: false,

				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'

			});		


			$('.magnific-popup-port').magnificPopup({
				type: 'image',
				gallery: { enabled:false },
				callbacks: {
					afterClose: function() {
					$('html').css('overflow', 'auto');
				}}
			});	
		
		}
		
		
		// Open Ressource Share Area
		$('.ressource-share').on( 'click', function(){
			$(this).next('.cel-ressources-share-content').fadeIn('fast', function(){
			});
		});

		
		// Close Ressource Share Area
		$('.cel-ressources-share-close').on('click', function(){
			$(this).parent().fadeOut('fast', function(){
			});
		});
		
		
		// Page Share
		$('.cps-open-close').on('click', function(){
			
			$( this ).toggleClass( "cps-open" );
			
			$( this ).next( '.cps-secondary-list' ).toggleClass( 'cps-secondary-list-block' );
			
		});		
		

		
	});
	
	

	$(window).on( 'load' , function() {
		
		
		$('body').addClass('cel-loaded').delay(300).queue(function(next){
			$( '.celestial-body-cover' ).css( 'display', 'none' );
			next();
		});		
	
	});
	

})(jQuery);



