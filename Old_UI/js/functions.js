// JavaScript Document
function scrollToAnchor(aid){
	"use strict";
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

jQuery(document).ready(function($){
	
	"use strict";

	/* ---------------------------------------------------------------------- */
	/*	PreLoader
	/* ---------------------------------------------------------------------- */
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 5);
	
	/* ---------------------------------------------------------------------- */
	/*	Search Script
	/* ---------------------------------------------------------------------- */
	$(".search-fld").on('click',function(){
		if($(this).hasClass('minus')){        
			$(this).toggleClass("plus minus");
			$('.search-area').fadeOut();
		}else{
			$('.search-area').fadeIn();
			$(this).toggleClass("minus plus");
		}
	});
	
	/* ---------------------------------------------------------------------- */
	/*	Slider inside Tabs Script
	/* ---------------------------------------------------------------------- */
	$('a[href="#profile"]').one('shown.bs.tab', function (e) {
		$('.bxslider-1').bxSlider();
	});
	$('a[href="#messages"]').one('shown.bs.tab', function (e) {
		$('.bxslider-2').bxSlider();
	});
	$('a[href="#settings"]').one('shown.bs.tab', function (e) {
		$('.bxslider-3').bxSlider();
	});
	$('a[href="#settings2"]').one('shown.bs.tab', function (e) {
		$('.bxslider-4').bxSlider();
	});
	
	$('a[href="#Biographies"]').one('shown.bs.tab', function (e) {
		$('.bxslider-1').bxSlider();
	});
	$('a[href="#Business"]').one('shown.bs.tab', function (e) {
		$('.bxslider-3').bxSlider();
	});
	$('a[href="#Computers"]').one('shown.bs.tab', function (e) {
		$('.bxslider-4').bxSlider();
	});
	
	
	
	/* ---------------------------------------------------------------------- */
	/*	Back To TOp Script
	/* ---------------------------------------------------------------------- */
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').css('opacity','1');
		} else {
			$('.back-to-top').css('opacity','0');
		}
	});
	
	/* ---------------------------------------------------------------------- */
	/*	Back to Top Script
	/* ---------------------------------------------------------------------- */
	$('.back-to-top a').on('click',function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});



	/* ---------------------------------------------------------------------- */
	/*	PrettyPhoto Script
	/* ---------------------------------------------------------------------- */
	if($("[rel^='prettyPhoto']").length){
		$("[rel^='prettyPhoto']").prettyPhoto();
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Tooltip Script
	/* ---------------------------------------------------------------------- */
	if($("[data-toggle='tooltip']").length){
		$('[data-toggle="tooltip"]').tooltip();
	}

	/* ---------------------------------------------------------------------- */
	/*	Owl Slider Owl Demo Script
	/* ---------------------------------------------------------------------- */
	if($("#owl-demo").length){
		 
		var owl = $("#owl-demo");
		 
		owl.owlCarousel({
			itemsCustom : [
				[0, 2],
				[450, 2],
				[700, 3],
				[1000, 5],
				[1200, 5],
				[1360, 6],
			],
			navigation : true
		});
		 
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Owl BLog Script
	/* ---------------------------------------------------------------------- */
	if($(".owl-blog").length){
		 
		var owl = $(".owl-blog");
		 
		owl.owlCarousel({
			itemsCustom : [
				[0, 1],
				[450, 1],
				[700, 3],
				[1000, 4],
				[1200, 4],
				[1360, 5],
			],
			navigation : true
		});
		 
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Owl Slider Release Script
	/* ---------------------------------------------------------------------- */
	if($(".owl-release").length){
		 
		var owl = $(".owl-release");
		 
		owl.owlCarousel({
			itemsCustom : [
				[0, 1],
				[450, 1],
				[700, 2],
				[1000, 4],
				[1200, 4],
				[1360, 5],
			],
			navigation : true
		});
		 
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Owl Slider Library Script
	/* ---------------------------------------------------------------------- */
	if($(".owl-library").length){
		 
		var owl = $(".owl-library");
		 
		owl.owlCarousel({
			itemsCustom : [
				[0, 1],
				[450, 1],
				[700, 3],
				[1000, 4],
				[1200, 4],
				[1360, 3],
			],
			navigation : true
		});
		 
	}
	
	
	/* ---------------------------------------------------------------------- */
	/*	Testimonial Slider Script
	/* ---------------------------------------------------------------------- */
	if($(".owl-testimonials").length){
		 
		var owl = $(".owl-testimonials");
		 
		owl.owlCarousel({
			itemsCustom : [
				[0, 1],
				[450, 1],
				[700, 1],
				[1000, 2],
				[1200, 2],
				[1360, 2],
			],
			navigation : true
		});
	}


	/* ---------------------------------------------------------------------- */
	/*	Accordion Script
	/* ---------------------------------------------------------------------- */
	if($("#ex2").length){
		$("#ex2").slider({});
	}

	/* ---------------------------------------------------------------------- */
	/*	Accordion Script
	/* ---------------------------------------------------------------------- */
	if($('.accordion').length){
		//custom animation for open/close
		$.fn.slideFadeToggle = function(speed, easing, callback) {
		  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};

		$('.accordion').accordion({
		  defaultOpen: '#section2',
		  cookieName: 'nav',
		  speed: 'slow',
		  animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  },
		  animateClose: function (elem, opts) { //replace the standard slideDown with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  }
		});
	}

	/* ---------------------------------------------------------------------- */
	/*	Select Menu Script
	/* ---------------------------------------------------------------------- */
	if($(".select-menu").length){
			$(".select-menu").selectbox();{
		}
	}


	/* ---------------------------------------------------------------------- */
	/*	Range Script
	/* ---------------------------------------------------------------------- */
	if($(".range").length){
		$(".range").slider();
		$(".range").on("slide", function(slideEvt) {
			$(".range-slider").text(slideEvt.value);
		});
	}

	/* ---------------------------------------------------------------------- */
	/*	Range Script
	/* ---------------------------------------------------------------------- */
	if($(".range2").length){
		$(".range2").slider();
		$(".range2").on("slide", function(slideEvt) {
			$(".range-slider2").text(slideEvt.value);
		});
	}

	/* ---------------------------------------------------------------------- */
	/*	BxSlider Script
	/* ---------------------------------------------------------------------- */
	if($(".bxslider").length){
		$('.bxslider').bxSlider();
	}
	
	/* ---------------------------------------------------------------------- */
	/*	BxSlider2 Script
	/* ---------------------------------------------------------------------- */
	if($(".bxslider2").length){
		$('.bxslider2').bxSlider({
		  mode: 'fade',
		  auto: true,
		  autoControls: true,
		  pause: 2000
		});
	}
	
	/* ---------------------------------------------------------------------- */
	/*	BxSlider-thumbs Script
	/* ---------------------------------------------------------------------- */
	if($(".bxslider-thums").length){
		$('.bxslider-thums').bxSlider({
		  pagerCustom: '#bx-pager'
		});
	}

	/* ---------------------------------------------------------------------- */
	/*	Counter Script
	/* ---------------------------------------------------------------------- */
	if($(".counter").length){
		$('.counter').counterUp({
			delay: 10,
			time: 1000
			
		});
	}

	/* ---------------------------------------------------------------------- */
	/*	Default CountDown Script
	/* ---------------------------------------------------------------------- */
	if($("#defaultCountdown").length){
		$(function () {
			var austDay = new Date();
			austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
			$('#defaultCountdown').countdown({until: austDay});
			$('#year').text(austDay.getFullYear());
		});
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Google Map Script
	/* ---------------------------------------------------------------------- */
	var map;
	function initMap() {
	  map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 8
	  });
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Tabs Script
	/* ---------------------------------------------------------------------- */
	if($("#tabs").length){
		$('#tabs').tab();
	}
	
	/* ---------------------------------------------------------------------- */
	/*	DL Responsive Menu
	/* ---------------------------------------------------------------------- */
	if(typeof($.fn.dlmenu) == 'function'){
		$('#kode-responsive-navigation').each(function(){
			$(this).find('.dl-submenu').each(function(){
				if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
					var parent_nav = $('<li class="menu-item kode-parent-menu"></li>');
					parent_nav.append($(this).siblings('a').clone());
					
					$(this).prepend(parent_nav);
				}
			});
			$(this).dlmenu();
		});
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Contact Form
	/* ---------------------------------------------------------------------- */
	
	if($('#contactform').length) {

		var $form = $('#contactform'),
		$loader = '<img src="images/ajax_loading.gif" alt="Loading..." />';
		$form.append('<div class="hidden-me" id="contact_form_responce">');

		var $response = $('#contact_form_responce');
		$response.append('<p></p>');

		$form.submit(function(e){

			$response.find('p').html($loader);

			var data = {
				action: "contact_form_request",
				values: $("#contactform").serialize()
			};

			//send data to server
			$.post("inc/contact-send.php", data, function(response) {

				response = $.parseJSON(response);
				
				$(".incorrect-data").removeClass("incorrect-data");
				$response.find('img').remove();

				if(response.is_errors){

					$response.find('p').removeClass().addClass("error type-2");
					$.each(response.info,function(input_name, input_label) {

						$("[name="+input_name+"]").addClass("incorrect-data");
						$response.find('p').append('Please enter correct "'+input_label+'"!'+ '</br>');
					});

				} else {

					$response.find('p').removeClass().addClass('success type-2');

					if(response.info == 'success'){

						$response.find('p').append('Your email has been sent!');
						$form.find('input:not(input[type="submit"], button), textarea, select').val('').attr( 'checked', false );
						$response.delay(1500).hide(400);
					}

					if(response.info == 'server_fail'){
						$response.find('p').append('Server failed. Send later!');
					}
				}

				// Scroll to bottom of the form to show respond message
				var bottomPosition = $form.offset().top + $form.outerHeight() - $(window).height();

				if($(document).scrollTop() < bottomPosition) {
					$('html, body').animate({
						scrollTop : bottomPosition
					});
				}

				if(!$('#contact_form_responce').css('display') == 'block') {
					$response.show(450);
				}

			});

			e.preventDefault();

		});				

	}
	
	/* ---------------------------------------------------------------------- */
	/*	Google Map Script
	/* ---------------------------------------------------------------------- */
	if($('#map-canvas').length){
		google.maps.event.addDomListener(window, 'load', initialize);
	}
	
	/* ---------------------------------------------------------------------- */
	/*	Filterable Script
	/* ---------------------------------------------------------------------- */
	if($("#filterable-item-holder-1").length){
		jQuery(window).load(function($) {
			var filter_container = jQuery('#filterable-item-holder-1');

			filter_container.children().css('position','relative');	
			filter_container.masonry({
				singleMode: true,
				itemSelector: '.filterable-item:not(.hide)',
				animate: true,
				animationOptions:{ duration: 800, queue: false }
			});	
			jQuery(window).resize(function(){
				var temp_width =  filter_container.children().filter(':first').width()+30;
				filter_container.masonry({
					columnWidth: temp_width,
					singleMode: true,
					itemSelector: '.filterable-item:not(.hide)',
					animate: true,
					animationOptions:{ duration: 800, queue: false }
				});		
			});	
			jQuery('ul#filterable-item-filter-1 a').on('click',function(e){	

				jQuery(this).addClass("active");
				jQuery(this).parents("li").siblings().children("a").removeClass("active");
				e.preventDefault();
				
				var select_filter = jQuery(this).attr('data-value');
				
				if( select_filter == "All" || jQuery(this).parent().index() == 0 ){		
					filter_container.children().each(function(){
						if( jQuery(this).hasClass('hide') ){
							jQuery(this).removeClass('hide');
							jQuery(this).fadeIn();
						}
					});
				}else{
					filter_container.children().not('.' + select_filter).each(function(){
						if( !jQuery(this).hasClass('hide') ){
							jQuery(this).addClass('hide');
							jQuery(this).fadeOut();
						}
					});
					filter_container.children('.' + select_filter).each(function(){
						if( jQuery(this).hasClass('hide') ){
							jQuery(this).removeClass('hide');
							jQuery(this).fadeIn();
						}
					});
				}
				
				filter_container.masonry();	
				
			});
		});
	}
	
});

/* ---------------------------------------------------------------------- */
/*	Google Map Function for Custom Style
/* ---------------------------------------------------------------------- */
function initialize() {
	"use strict";
	var MY_MAPTYPE_ID = 'custom_style';
	var map;
	var brooklyn = new google.maps.LatLng(-37.821982, 144.9581352);
	var featureOpts = [
		{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}

	];
	var mapOptions = {
		zoom: 12,
		center: brooklyn,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};

	map = new google.maps.Map(
		document.getElementById('map-canvas'),
		mapOptions
	);

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}


/* ---------------------------------------------------------------------- */
/*	Bookblock Script
/* ---------------------------------------------------------------------- */
var Page = (function() {
	
	var config = {
			$bookBlock : $( '#bb-bookblock' ),
			$navNext : $( '#bb-nav-next' ),
			$navPrev : $( '#bb-nav-prev' ),
			$navFirst : $( '#bb-nav-first' ),
			$navLast : $( '#bb-nav-last' )
		},
		init = function() {
			config.$bookBlock.bookblock( {
				speed : 1000,
				shadowSides : 0.8,
				shadowFlip : 0.4
			} );
			initEvents();
		},
		initEvents = function() {
			
			var $slides = config.$bookBlock.children();

			// add navigation events
			config.$navNext.on( 'click touchstart', function() {
				config.$bookBlock.bookblock( 'next' );
				return false;
			} );

			config.$navPrev.on( 'click touchstart', function() {
				config.$bookBlock.bookblock( 'prev' );
				return false;
			} );

			config.$navFirst.on( 'click touchstart', function() {
				config.$bookBlock.bookblock( 'first' );
				return false;
			} );

			config.$navLast.on( 'click touchstart', function() {
				config.$bookBlock.bookblock( 'last' );
				return false;
			} );
			
			// add swipe events
			$slides.on( {
				'swipeleft' : function( event ) {
					config.$bookBlock.bookblock( 'next' );
					return false;
				},
				'swiperight' : function( event ) {
					config.$bookBlock.bookblock( 'prev' );
					return false;
				}
			} );

			// add keyboard events
			$( document ).keydown( function(e) {
				var keyCode = e.keyCode || e.which,
					arrow = {
						left : 37,
						up : 38,
						right : 39,
						down : 40
					};

				switch (keyCode) {
					case arrow.left:
						config.$bookBlock.bookblock( 'prev' );
						break;
					case arrow.right:
						config.$bookBlock.bookblock( 'next' );
						break;
				}
			} );
		};

		return { init : init };

})();
/* ---------------------------------------------------------------------- */
/*	Bookblock Script
/* ---------------------------------------------------------------------- */
if($( '#bb-bookblock' ).length){
	Page.init();
}	
