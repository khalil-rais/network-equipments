// Allow other JavaScript libraries to use $.
jQuery.noConflict();

jQuery(function ($) { 

	function slickHeight() {
	var winWidth = $(window).width();
		if (winWidth > 767) {
			var sliderHeight = $('.slick-slider').height();
			console.log(sliderHeight);
			/*$('#slick-pager .slick-pager').css('height', sliderHeight - 60);
			$('#slick-pager .slick-pager').css('width', 100);*/
		}
	}
	$( window ).resize(function() {
		slickHeight();
	});
	jQuery(document).ready(function($) {
		$('#Product-Technical-Specifications-Section').waypoint(               // create a waypoint
			function() {
				$('li.jumplinks__item.jumplinks__item--active').removeClass("jumplinks__item--active");
				$('li.jumplinks__item:nth-child(1)').addClass("jumplinks__item--active");
			}
		);
		
		$('#downloads').waypoint(               // create a waypoint
			function() {
				$('li.jumplinks__item.jumplinks__item--active').removeClass("jumplinks__item--active");
				$('li.jumplinks__item:nth-child(2)').addClass("jumplinks__item--active");
			}
		);
		$('.featuredPostSlider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			autoplay: false,
			adaptiveHeight: true,
			asNavFor: '.slick-pager',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						dots: false
					}
				},
				{
					breakpoint: 600,
					settings: {
						dots: true
					}
				},
				{
					breakpoint: 480,
					settings: {
						dots: true
					}
				}
			]
		});
		$('.slick-pager').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			arrows: false,
			asNavFor: '.featuredPostSlider',
			focusOnSelect: true,
			vertical: true,
			responsive: [{
				breakpoint: 767,
				settings: {
					vertical: false
				}
			}]
		});
		slickHeight();
	});
});