/*
 * Home-Template Function ()
 * ...
 *
 */
 
jQuery(document).ready(function($) {

/*//////////////////////////////////////
 * SELECT PRODUCT & PROMOTION
/*//////////////////////////////////////
	
	$('#menuR li a').click(function(){
		var chkId = $(this).attr('id');
		$('#menuR li a').removeClass('underScrollCurrent');
		$(this).addClass('underScrollCurrent');
		$('.tabPDPM').hide();
		$('#ta'+chkId).fadeIn();
	});
	    
}); /* END JQUERY READY */