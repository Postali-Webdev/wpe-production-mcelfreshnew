/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	
	$('.awards-slider').slick({
		dots: false,
		infinite: true,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 2500,
  		speed: 1300,
		slidesToShow: 5,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4
				}
			},
			{
				breakpoint: 820,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 400,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});

	$('.case-results-slider').slick({
		dots: false,
		infinite: true,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 2000,
		speed: 1300,
		vertical: true,
		slidesToShow: 1,
		slidesToScroll: 1,
    	swipeToSlide: false,
		cssEase: 'ease-in-out',
	})
	
});