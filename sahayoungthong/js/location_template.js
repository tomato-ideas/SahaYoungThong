/*
 * Location-Template Function ()
 * ...
 *
 */
 
jQuery(document).ready(function($) {

/*//////////////////////////////////////
 * ACCORDION
/*//////////////////////////////////////
	
	$('.branch_name').click(function(){
			var chkId = $(this).attr('id');
			var chkStyle = $('#'+chkId+'Wrap').attr('style');
			if(chkStyle == 'display: block;' || chkStyle == ''){}
			else{
				$('.branchWrap').slideUp();
				$('#'+chkId+'Wrap').slideDown();
			}
			
	});
	    
}); /* END JQUERY READY */