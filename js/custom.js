/*-----------------------------------------------------------------------------------
/*
/* Custom JS
/*
/* Changes
/*    - Mn - removed isotope sections
/*
-----------------------------------------------------------------------------------*/

/* Start Document */

jQuery(document).ready(function($) {

/*----------------------------------------------------*/
/*	Responsive Menu
/*----------------------------------------------------*/

			// Create the dropdown bases
			jQuery("<select />").appendTo("#navigation");
			
			// Create default option "Go to..."
			jQuery("<option />", {
			   "selected": "selected",
			   "value"   : "",
			   "text"    : "Menu"
			}).appendTo("#navigation select");
			
				
			// Populate dropdowns with the first menu items
			jQuery("#navigation li a").each(function() {
			 	var el = jQuery(this);
			 	jQuery("<option />", {
			     	"value"   : el.attr("href"),
			    	"text"    : el.text()
			 	}).appendTo("#navigation select");
			});
			
				
			//make responsive dropdown menu actually work			
	     	jQuery("#navigation select").change(function() {
		       	window.location = jQuery(this).find("option:selected").val();
		   	});

/*----------------------------------------------------*/
/*	Isotope Portfolio Filter
/*----------------------------------------------------*/

// removed - MN 

/*----------------------------------------------------*/
/*	Back To Top Button
/*----------------------------------------------------*/
		var pxShow = 300;//height on which the button will show
		var fadeInTime = 400;//how slow/fast you want the button to show
		var fadeOutTime = 400;//how slow/fast you want the button to hide
		var scrollSpeed = 400;//how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'

		jQuery(window).scroll(function(){
			if(jQuery(window).scrollTop() >= pxShow){
				jQuery("#backtotop").fadeIn(fadeInTime);
			}else{
				jQuery("#backtotop").fadeOut(fadeOutTime);
			}
		});
		 
		jQuery('#backtotop a').click(function(){
			jQuery('html, body').animate({scrollTop:0}, scrollSpeed); 
			return false; 
		}); 

/* End Document */
});

