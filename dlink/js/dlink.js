/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
var delayInSeconds = parseInt(5);
var delayInMilliseconds = delayInSeconds*1000;

window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;

  if ( 230 > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
	if (typeof document.getElementsByClassName("breadcrumbs")[0] !== 'undefined') {
		//document.getElementsByClassName("breadcrumbs")[0].style.top = "0";
		document.getElementsByClassName("breadcrumbs")[0].style.display = "block";		
	}
	
	if (typeof document.querySelectorAll("body.node-type-hero-media div.breadcrumbs ol.breadcrumb")[0] !== 'undefined') {
		//Start from here: vérifier la taille de l'écran avant de configurer les top.
		var screen_width = document.documentElement.clientWidth;
		//document.getElementsByClassName("jumplinks")[0].style.top = "68px";
		console.log ("redimension");
		if (screen_width>=768){
			document.querySelectorAll("body.node-type-hero-media div.breadcrumbs ol.breadcrumb")[0].style.top = "68px";
			console.log ("redimension1");
			
		}
		else{
			document.querySelectorAll("body.node-type-hero-media div.breadcrumbs ol.breadcrumb")[0].style.top = "52px";
			console.log ("redimension2");
		}	
	}	
	
	if (typeof document.querySelectorAll("body.node-type-home-products div.breadcrumbs ol.breadcrumb")[0] !== 'undefined') {
		//Start from here: vérifier la taille de l'écran avant de configurer les top.
		var screen_width = document.documentElement.clientWidth;
		document.getElementsByClassName("jumplinks")[0].style.top = "68px";
		if (screen_width>=768){
			document.querySelectorAll("body.node-type-home-products div.breadcrumbs ol.breadcrumb")[0].style.top = "68px";
			
		}
		else{
			document.querySelectorAll("body.node-type-home-products div.breadcrumbs ol.breadcrumb")[0].style.top = "52px";
		}	
	}
	if (typeof document.querySelectorAll("body.node-type-business-products div.breadcrumbs ol.breadcrumb")[0] !== 'undefined') {
		//Start from here: vérifier la taille de l'écran avant de configurer les top.
		var screen_width = document.documentElement.clientWidth;
		document.getElementsByClassName("jumplinks")[0].style.top = "68px";
		if (screen_width>=768){
			document.querySelectorAll("body.node-type-business-products div.breadcrumbs ol.breadcrumb")[0].style.top = "68px";
			
		}
		else{
			document.querySelectorAll("body.node-type-business-products div.breadcrumbs ol.breadcrumb")[0].style.top = "52px";
		}	
	}	
  } 
  else {
    document.getElementById("navbar").style.top = "-70px";
	
	if (typeof document.querySelectorAll("body.page-for-home div.breadcrumbs")[0] !== 'undefined') {
		document.querySelectorAll("body.page-for-home div.breadcrumbs")[0].style.display = "none";
	}
	if (typeof document.querySelectorAll("body.page-for-business div.breadcrumbs")[0] !== 'undefined') {
		document.querySelectorAll("body.page-for-business div.breadcrumbs")[0].style.display = "none";
	}

	if (typeof document.querySelectorAll("body.page-ev-icin div.breadcrumbs")[0] !== 'undefined') {
		document.querySelectorAll("body.page-ev-icin div.breadcrumbs")[0].style.display = "none";
	}
	
	if (typeof document.querySelectorAll("body.page-for-business div.breadcrumbs")[0] !== 'undefined') {
		document.querySelectorAll("body.page-for-business div.breadcrumbs")[0].style.display = "none";
	}

	if (typeof document.querySelectorAll("body.page-is-icin div.breadcrumbs")[0] !== 'undefined') {
		document.querySelectorAll("body.page-is-icin div.breadcrumbs")[0].style.display = "none";
	}
	
	if (typeof document.querySelectorAll("body.node-type-hero-media div.breadcrumbs")[0] !== 'undefined') {
		document.querySelectorAll("body.node-type-hero-media div.breadcrumbs")[0].style.display = "none";
	}
	
	
	
	if (typeof document.querySelectorAll("body.node-type-home-products div.breadcrumbs ol.breadcrumb")[0] !== 'undefined') {
		document.querySelectorAll("body.node-type-home-products div.breadcrumbs ol.breadcrumb")[0].style.top = "0";
		document.getElementsByClassName("jumplinks")[0].style.top = "0";
	}
	if (typeof document.querySelectorAll("body.node-type-business-products div.breadcrumbs ol.breadcrumb")[0] !== 'undefined') {
		document.querySelectorAll("body.node-type-business-products div.breadcrumbs ol.breadcrumb")[0].style.top = "0";
		document.getElementsByClassName("jumplinks")[0].style.top = "0";
	}
	if (typeof document.querySelectorAll("body.node-type-hero-media div.breadcrumbs ol.breadcrumb")[0] !== 'undefined') {
		document.querySelectorAll("body.node-type-hero-media div.breadcrumbs ol.breadcrumb")[0].style.top = "0";
		//document.getElementsByClassName("jumplinks")[0].style.top = "0";
	}	
  }  
}


// Allow other JavaScript libraries to use $.
jQuery.noConflict();

jQuery(function ($) { 
	$("#edit-reset-trigger").click(function(){
		jQuery("#edit-reset").click();
	});
  
	$( document ).ajaxSuccess(function( event, xhr, settings ) {
		if (settings.url="/views/ajax"){
			$("#edit-reset-trigger").click(function(){
				jQuery("#edit-reset").click();
			});			
		}
	});  
});


