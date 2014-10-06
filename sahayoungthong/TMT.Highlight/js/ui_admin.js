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
	
	$('#loadingData').fadeIn('slow');
	$.ajax({ 
		url: url_highl_select_one,
		type: "POST",
		data: { 'ID': 1},
		dataType: 'json'
	}) // END SELECT //
	.done(function(data){
		$('#TTTH').val(data[0].select_tt_th),
		$('#TTEN').val(data[0].select_tt_en);
		var desTH = data[0].select_des_th.replace(/\\/g, '');
		$('#DESTH').val(desTH);
		var desEN = data[0].select_des_en.replace(/\\/g, '')
		$('#DESEN').val(desEN);
		$('#link').val(data[0].select_link);
		
		if(data[0].select_img == '' || data[0].select_img == undefined){}
		else{
			$('#closeBt').show();
			$('#img_imgHighlight_1').attr('src',data[0].select_img);
			$('#img_hide_imgHighlight_1').val(data[0].select_img);
		}
		
		$('#loadingData').hide();
		$('#completeData').show();
		setInterval(function(){
			$('#completeData').fadeOut('slow')
		},1000);
	}) // END DONE SELECT //
	.fail(function(data){
		console.log('FAIL \nSELECT \nADMIN CONTACT METHODS \nTMT.BACKGROUND');
	}); // END FAIL SELECT //
	
	
	
/*//////////////////////////////////////
 * UPDATE
/*//////////////////////////////////////
	
	$('#submitBt').click(function(){	
		$('#pendingData').fadeIn('slow');
		
		highlUpdate 		= [];
		
		var dataHighlUpdate = {select_id			: '1',
								select_tt_th		: $('#TTTH').val(),
								select_tt_en 		: $('#TTEN').val(),
								select_des_th		: $('#DESTH').val(), 
								select_des_en		: $('#DESEN').val(),
								select_link			: $('#link').val(), 
								select_img			: $('#img_hide_imgHighlight_1').val()
							};
		var objHighlUpdate = dataHighlUpdate;
		highlUpdate.push(objHighlUpdate);
		
		$.ajax({
			url: url_highl_update,
			type: "POST",
			data: {arrHighlUpdate : highlUpdate},
		}) // END UPDATE ALL CHANGE //
		.done(function(data){
			//$('#pendingData').hide();
			$('#pendingData').hide();
				$('#completeData').show();
				setInterval(function(){
					$('#completeData').fadeOut('slow')
				},1000);
		}) // END DONE UPDATE ALL CHANGE //
		.fail(function(data){
			alert('FAIL \nSAVE ALL CHANGE \nUPDATE & INSERT PART UPDATE \nTMT.HIGHLIGHT');
		}); // END FAIL UPDATE ALL CHANGE //
	});
	
	
	
}); // END JQUERY READY //