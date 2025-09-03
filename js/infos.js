jQuery(document).ready(function($){
	"use strict";							
	
	jQuery('.images').bind('mouseover', function() {
	  jQuery(this).find('.infos').stop().animate({
    "opacity": "1"
  }, 200 );
	  jQuery(this).find('.infos .wrapper').stop().animate({
    "margin-top": "0"
  }, 250 );
	   });
	
	jQuery('.images').bind('mouseout', function() {
	  jQuery(this).find('.infos').stop().animate({
    "opacity": "0"
  }, 200 );
	   jQuery(this).find('.infos .wrapper').stop().animate({
    "margin-top": "25px"
  }, 200 );
	   });
	
	

});