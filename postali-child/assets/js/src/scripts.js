/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";


	/** Updated Menu */
	//Hamburger animation
    $('.toggle-nav').click(function() {
        $(this).toggleClass('active');
        $('#menu-main-menu, #header-top_right .menu').toggleClass('opened');
        $('#menu-main-menu, #header-top_right .menu').toggleClass('active'); 
        $('.sub-menu').removeClass('opened');
        $('.sub-menu').addClass('closed');
        return false;
    });
     
    //Close navigation on anchor tap
    $('.active').click(function() {	
        $('#menu-main-menu, #menu-spanish-header-menu').addClass('closed');
        $('#menu-main-menu, #menu-spanish-header-menu').toggleClass('opened');
        $('#menu-main-menu .sub-menu, #menu-spanish-header-menu .sub-menu').removeClass('opened');
        $('#menu-main-menu .sub-menu, #menu-spanish-header-menu .sub-menu').addClass('closed');
    });	

    //Mobile menu accordion toggle for sub pages
    $('#menu-main-menu > li.menu-item-has-children, #menu-spanish-header-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle"><span class="icon-chevron-right"></span></div>');
    $('#menu-main-menu > li.menu-item-has-children > .sub-menu, #menu-spanish-header-menu > li.menu-item-has-children .sub-menu').prepend('<div class="child-close"><span class="icon-chevron-left"></span> back</div>');

    //Mobile menu accordion toggle for third-level pages
    $('#menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children, #menu-spanish-header-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle2"><span class="icon-chevron-right"></span></div>');
    $('#menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu, #menu-spanish-header-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="tertiary-close"><span class="icon-chevron-left"></span> back</div>');

    $('#menu-main-menu .accordion-toggle, #menu-spanish-header-menu .accordion-toggle').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
    });

    $('#menu-main-menu .accordion-toggle2, #menu-spanish-header-menu .accordion-toggle2').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
        console.log('clicked');
    });

    $('.child-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    $('.tertiary-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });
	/** /Updated Menu */

    //Hamburger animation
	// $('#menu-icon').click(function() {
	// 	$(this).toggleClass('active');
	// 	$('#menu-main-menu').toggleClass('active');
	// 	return false;
	// });

	// //Toggle mobile menu & search
	// $('.toggle-nav').click(function() {
	// 	$('#menu-main-menu').slideToggle(400);
	// });
	 
	// //Close navigation on anchor tap
	// $('.toggle-nav.active').click(function() {	
	// 	$('#menu-main-menu').slideUp(400);
	// });	

	// //Mobile menu accordion toggle for sub pages
	// $('#menu-main-menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-icon-chevron-right"></span></span></div>');

	//   $('#menu-main-menu .accordion-toggle').click(function() {
	// 	$(this).parent().find('> ul').slideToggle(400);
	// 	$(this).toggleClass('toggle-background');
	// 	$(this).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
	//   });

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	// $(document).ready(function() {
	// 	$('.menu-item-has-children').on('focusin', function() {
	// 		var subMenu = $(this).find('.sub-menu');
	// 		subMenu.css('display', 'block');

	// 		$(this).find('.sub-menu > li:last-child').on('focusout', function() {
	// 			console.log('blur!');
	// 			subMenu.css('display', 'none');
	// 		})
	// 	})
	// });

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth()
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
						$('#menu-main-menu li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

});