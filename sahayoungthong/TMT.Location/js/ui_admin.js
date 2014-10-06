/*
 * TMT IMG Highlight Theme Function (UI ADMIN)
 * CRUD.
 *
 */
 
jQuery(document).ready(function($) {

/*//////////////////////////////////////
 * REMOVE IMG
/*//////////////////////////////////////
	
	$('#closeBt').click(function(){
		$(this).hide();
		$('#img_imgHighlight_1').attr('src',url_highl_imgDF);
		$('#img_hide_imgHighlight_1').val('');
	});


/*//////////////////////////////////////
 * SWITCH LANG
/*//////////////////////////////////////

	$('#langTTAll li').click(function(){
		$('#langTTAll li').removeClass('btCurrent');
		$(this).addClass('btCurrent');
		$('.ttAll').hide();
		var chkId = $(this).attr('id');
		$('#T'+chkId).show();
	});
	
	$('#langDESAll li').click(function(){
		$('#langDESAll li').removeClass('btCurrent');
		$(this).addClass('btCurrent');
		$('.desAll').hide();
		var chkId = $(this).attr('id');
		$('#DE'+chkId).show();
	});

/*//////////////////////////////////////
 * SELECT
/*//////////////////////////////////////
	
/*//////////////////////////////////////
 * UPDATE
/*//////////////////////////////////////
	
	
}); // END JQUERY READY //