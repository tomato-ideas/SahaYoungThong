/*
 * TMT IMG Slide Theme Function (UI ADMIN)
 * CRUD.
 *
 */
 
jQuery(document).ready(function($) {
	
/*//////////////////////////////////////
 * SELECT
/*//////////////////////////////////////

	$('#loadingData').fadeIn('slow');
	$.ajax({ 
		url: url_imgSld_select_all,
		type: "POST",
		dataType: 'json'
	}) // END SELECT //
	.done(function(data){
		var imgSlide_W = $('#imgSlideLeftSettingMenu-sizeW input').val(data[0].select_width);
		var imgSlide_H = $('#imgSlideLeftSettingMenu-sizeH input').val(data[0].select_height);
		var imgSlide_Animduration = $('#imgSlideLeftSettingMenu-sizeAnimduration input').val(data[0].select_animduration);
		var imgSlide_Animspeed = $('#imgSlideLeftSettingMenu-sizeAnimspeed input').val(data[0].select_animspeed);
		var imgSlide_Navi = $('#imgSlideLeftSettingMenu-sizeNavi').val(data[0].select_navigation);
		var imgSlide_ฺBull = $('#imgSlideLeftSettingMenu-sizeBull').val(data[0].select_bullet);
		var imgSlide_Usec = $('#imgSlideLeftSettingMenu-sizeUsec').val(data[0].select_usecaptions);
		var imgSlide_Hove = $('#imgSlideLeftSettingMenu-sizeHove').val(data[0].select_hoverpause);
		var imgSlide_Rand = $('#imgSlideLeftSettingMenu-sizeRand').val(data[0].select_randomstart);
		var imgSlide_Resp = $('#imgSlideLeftSettingMenu-sizeResp').val(data[0].select_responsive);
		
		var chkListImg = 0;
		for (var chkImgHolder = 1; chkImgHolder < data.length; chkImgHolder++) {
			chkListImg++;
			$('#imgSlideRightImgAll').append('<div class="imgSlideRightImg imgSlideRightImgHolder imgSlideRightImgHolder_'+chkListImg+'" id="imgSldHolder_'+data[chkImgHolder].select_id+'" title="'+data[chkImgHolder].select_id+'">'+
									''+'<div class="spanWrapper"><span>'+chkListImg+'. image</span></div>'+
									''+'<div class="imgSlideRightImgs">'+
										''+'<span>Image</span>'+
										''+'<div class="imgSlideRightImgsWrapper">'+
											''+'<div class="imgSlideRightImgsBt">'+
												''+'<a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img=\'imgSldHolder_'+data[chkImgHolder].select_id+'\'">'+
													''+'<img id="img_imgSldHolder_'+data[chkImgHolder].select_id+'" class="img-preview" src="'+data[chkImgHolder].select_imgurl+'">'+
												''+'</a>'+
												''+'<input type="hidden" id="img_hide_imgSldHolder_'+data[chkImgHolder].select_id+'" name="'+data[chkImgHolder].select_id+'" value="'+data[chkImgHolder].select_imgurl+'">'+
											''+'</div>'+
										''+'</div>'+
										''+'<span>Website URL</span>'+
										''+'<input class="imgSldWbUrl" id="imgSldWbUrl_'+data[chkImgHolder].select_id+'" type="text" name="" value="'+data[chkImgHolder].select_linkurl+'">'+
										''+'<input type="button" class="imgSldRemove" name="'+data[chkImgHolder].select_id+'" onclick="remove_data('+data[chkImgHolder].select_id+')" value="Remove">'+
									''+'</div>'+
								''+'</div>');
								$('#imgSldHolder_'+data[chkImgHolder].select_id+'').hide().fadeIn('slow');
		}
		imgSldToggle();
		imgSldRemove();
		$('#loadingData').hide();
			$('#completeData').show();
			setInterval(function(){
				$('#completeData').fadeOut('slow')
			},1000);
	}) // END DONE SELECT //
	.fail(function(data){
		//alert('FAIL \nSELECT \nADMIN SELECT DATA ALL \nTMT.IMGSLIDE');
	}); // END FAIL SELECT //
	
	
/*//////////////////////////////////////
 * SELECT 2ND
/*//////////////////////////////////////

	function select2nd(){
		i=0;
		$('#pendingData').hide();
		$('#loadingData').show();
		$('.imgSlideRightImg').remove();
		$('#imgSlideLeftSave').attr('class','upd');
		$('#imgSld-insUpd').attr('style','display:none;');
		$('#imgSld-upd').attr('style','display:block;');
		$.ajax({ 
			url: url_imgSld_select_all,
			type: "POST",
			dataType: 'json'
		}) // END SELECT //
		.done(function(data){
			var imgSlide_W = $('#imgSlideLeftSettingMenu-sizeW input').val(data[0].select_width);
			var imgSlide_H = $('#imgSlideLeftSettingMenu-sizeH input').val(data[0].select_height);
			var imgSlide_Animduration = $('#imgSlideLeftSettingMenu-sizeAnimduration input').val(data[0].select_animduration);
			var imgSlide_Animspeed = $('#imgSlideLeftSettingMenu-sizeAnimspeed input').val(data[0].select_animspeed);
			var imgSlide_Navi = $('#imgSlideLeftSettingMenu-sizeNavi').val(data[0].select_navigation);
			var imgSlide_ฺBull = $('#imgSlideLeftSettingMenu-sizeBull').val(data[0].select_bullet);
			var imgSlide_Usec = $('#imgSlideLeftSettingMenu-sizeUsec').val(data[0].select_usecaptions);
			var imgSlide_Hove = $('#imgSlideLeftSettingMenu-sizeHove').val(data[0].select_hoverpause);
			var imgSlide_Rand = $('#imgSlideLeftSettingMenu-sizeRand').val(data[0].select_randomstart);
			var imgSlide_Resp = $('#imgSlideLeftSettingMenu-sizeResp').val(data[0].select_responsive);
			
			var chkListImg = 0;
			for (var chkImgHolder = 1; chkImgHolder < data.length; chkImgHolder++) {
				chkListImg++;
				$('#imgSlideRightImgAll').append('<div class="imgSlideRightImg imgSlideRightImgHolder imgSlideRightImgHolder_'+chkListImg+'" id="imgSldHolder_'+data[chkImgHolder].select_id+'" title="'+data[chkImgHolder].select_id+'">'+
										''+'<div class="spanWrapper"><span>'+chkListImg+'. image</span></div>'+
										''+'<div class="imgSlideRightImgs">'+
											''+'<span>Image</span>'+
											''+'<div class="imgSlideRightImgsWrapper">'+
												''+'<div class="imgSlideRightImgsBt">'+
													''+'<a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img=\'imgSldHolder_'+data[chkImgHolder].select_id+'\'">'+
														''+'<img id="img_imgSldHolder_'+data[chkImgHolder].select_id+'" class="img-preview" src="'+data[chkImgHolder].select_imgurl+'">'+
													''+'</a>'+
													''+'<input type="hidden" id="img_hide_imgSldHolder_'+data[chkImgHolder].select_id+'" name="'+data[chkImgHolder].select_id+'" value="'+data[chkImgHolder].select_imgurl+'">'+
												''+'</div>'+
											''+'</div>'+
											''+'<span>Website URL</span>'+
											''+'<input class="imgSldWbUrl" id="imgSldWbUrl_'+data[chkImgHolder].select_id+'" type="text" name="" value="'+data[chkImgHolder].select_linkurl+'">'+
											''+'<input type="button" class="imgSldRemove" name="'+data[chkImgHolder].select_id+'" onclick="remove_data('+data[chkImgHolder].select_id+')" value="Remove">'+
										''+'</div>'+
									''+'</div>');
									$('#imgSldHolder_'+data[chkImgHolder].select_id+'').hide().fadeIn('slow');
			}
			imgSldToggle();
			imgSldRemove();
			$('#loadingData').hide();
				$('#completeData').show();
				setInterval(function(){
					$('#completeData').fadeOut('slow')
				},1000);
		}) // END DONE SELECT //
		.fail(function(data){
			//alert('FAIL \nSELECT \nADMIN SELECT DATA ALL \nTMT.IMGSLIDE');
		}); // END FAIL SELECT //
	};


/*//////////////////////////////////////
 * REMOVE
/*//////////////////////////////////////

	function imgSldRemove(){
		$('.imgSldRemove').click(function(){
			$('#waitingData').fadeIn('slow');
			var chkIdRm = $(this).attr('name');
			$.ajax({ 
				url: url_imgSld_remove,
				type: "POST",
				data: { 'ID':chkIdRm},
				dataType: 'html'
			}) // END SELECT //
			.done(function(data){
				$('#imgSldHolder_'+chkIdRm+'').fadeOut('slow');
				$('#waitingData').hide();
					$('#removeData').show();
					setInterval(function(){
						$('#removeData').fadeOut('slow')
					},1000);
			}) // END DONE SELECT //
			.fail(function(data){
				alert('FAIL \nDelete \n'+data+".");
			}); // END FAIL SELECT //
		});
	}

/*//////////////////////////////////////
 * CHK NUMBER ONLY
/*//////////////////////////////////////

	$('.numberOnly').keypress(function(event) {
/* 	    console.log(event.which); */
	    if (event.which < 48 || event.which > 58 ){
	        event.preventDefault();
	    }
	});



/*//////////////////////////////////////
 * ADD IMG SLD
/*//////////////////////////////////////

	i=0;
	$('#imgSlideLeftAddImg').click(function(){
	$('.spanWrapper').unbind();
	$('#imgSlideLeftSave').attr('class','');
	$('#imgSlideLeftSave').addClass('insUpd');
	$('#imgSld-upd').hide();
	$('#imgSld-insUpd').show();
	i++;
		$('#imgSldDraft').after('<div class="imgSlideRightImg imgSlideRightImgDraft" id="imgSldDraft_'+i+'">'+
									''+'<div class="spanWrapper"><span>draft image</span></div>'+
									''+'<div class="imgSlideRightImgs">'+
										''+'<span>Image</span>'+
										''+'<div class="imgSlideRightImgsWrapper">'+
											''+'<div class="imgSlideRightImgsBt">'+
												''+'<a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img=\'imgSldDraft_'+i+'\'">'+
													''+'<img id="img_imgSldDraft_'+i+'" class="img-preview" src="http://www.thaitoyassociation.com/wp-content/themes/ttia/TMT.IMGSlide/images/imgEmpty.png">'+
												''+'</a>'+
												''+'<input type="hidden" id="img_hide_imgSldDraft_'+i+'" name="'+i+'" value="">'+
											''+'</div>'+
										''+'</div>'+
										''+'<span>Website URL</span>'+
										''+'<input class="imgSldWbUrl" id="imgSldWbUrl_'+i+'" type="text" name="" value="">'+
									''+'</div>'+
								''+'</div>');
								$('#imgSldDraft_'+i+'').hide().fadeIn('slow');
								$('.spanWrapper').bind();
								imgSldToggle();
								
	});

/*//////////////////////////////////////
 * IMG SLIDE TOGGLE
/*//////////////////////////////////////

	function imgSldToggle(){
		$('.spanWrapper').click(function(){
			$(this).toggleClass('spanWrapperTT');
			var chkClassImgSld = $(this).next().slideToggle();
		});
	}

/*//////////////////////////////////////
 * CHK UPDATE OR INSERT & UPDATE
/*//////////////////////////////////////
	
	$('#imgSlideLeftSave').click(function(){
		var chkUpd = $('#imgSlideLeftSave').attr('class');
		if(chkUpd == 'upd'){
			
			/*//////////////////////////////////////
			 * UPDATE
			/*//////////////////////////////////////
				
				$('#pendingData').fadeIn('slow');
				
				imgSldUpdate 		= [];
				
				var dataImgSldUpdate = {select_id			: '1',
										select_imgurl		: '',
										select_linkurl 		: '',
										select_width		: $('#imgSlideLeftSettingMenu-sizeW input').val(), 
										select_height		: $('#imgSlideLeftSettingMenu-sizeH input').val(),
										select_animduration	: $('#imgSlideLeftSettingMenu-sizeAnimduration input').val(), 
										select_animspeed	: $('#imgSlideLeftSettingMenu-sizeAnimspeed input').val(),
										select_navigation	: $('#imgSlideLeftSettingMenu-sizeNavi').val(),
										select_bullet		: $('#imgSlideLeftSettingMenu-sizeBull').val(),
										select_usecaptions	: $('#imgSlideLeftSettingMenu-sizeUsec').val(),
										select_hoverpause	: $('#imgSlideLeftSettingMenu-sizeHove').val(),
										select_randomstart	: $('#imgSlideLeftSettingMenu-sizeRand').val(),
										select_responsive	: $('#imgSlideLeftSettingMenu-sizeResp').val()
									};
				var objImgSldUpdate = dataImgSldUpdate;
				imgSldUpdate.push(objImgSldUpdate);
				
				var chkSize = $('.imgSlideRightImgHolder').size();
					for (var chkImgHolder = 1; chkImgHolder < chkSize+1; chkImgHolder++) {
						var chkImgSldID = $('.imgSlideRightImgHolder_'+chkImgHolder+'').attr('title');
						var dataImgSldUpdate2 = {select_id			: chkImgSldID,
												select_imgurl		: $('#img_hide_imgSldHolder_'+chkImgSldID+'').val(),
												select_linkurl 		: $('#imgSldWbUrl_'+chkImgSldID+'').val(),
												select_width		: '', 
												select_height		: '',
												select_animduration	: '', 
												select_animspeed	: '',
												select_navigation	: '',
												select_bullet		: '',
												select_usecaptions	: '',
												select_hoverpause	: '',
												select_randomstart	: '',
												select_responsive	: ''
											};
						var objImgSldUpdate2 = dataImgSldUpdate2;
						imgSldUpdate.push(objImgSldUpdate2);
					}
				
				$.ajax({
						url: url_imgSld_update,
						type: "POST",
						data: {arrImgSldUpdate : imgSldUpdate},
					}) // END UPDATE ALL CHANGE //
					.done(function(data){
						select2nd();
						//$('#pendingData').hide();
					}) // END DONE UPDATE ALL CHANGE //
					.fail(function(data){
						alert('FAIL \nSAVE ALL CHANGE \nUPDATE & INSERT PART UPDATE \nTMT.IMGSLIDE');
					}); // END FAIL UPDATE ALL CHANGE //
				
		}else{
		
			/*//////////////////////////////////////
			 * INSERT & UPDATE
			/*//////////////////////////////////////
				
				$('#pendingData').fadeIn('slow');
				//console.log('222222222222')
				
				
				/*//////////////////////////////////////
				 * INSERT & UPDATE (PART INSERT)
				/*//////////////////////////////////////
				
					imgSldInsert 		= [];
					
					var chkSize = $('.imgSlideRightImgDraft').size();
					//console.log('chkSize '+chkSize);
					for (var chkImgDraft = 1; chkImgDraft < chkSize+1; chkImgDraft++) {
						var chkImgDraftFor = $('#img_hide_imgSldDraft_'+chkImgDraft+'').val();
						if(chkImgDraftFor == '' || chkImgDraftFor == undefined){
							/* NONE */
						}else{
							//console.log('chkImgDraftFor '+chkImgDraftFor);
							var dataImgSldInsert = {select_imgurl		: $('#img_hide_imgSldDraft_'+chkImgDraft+'').val(),
													select_linkurl 		: $('#imgSldWbUrl_'+chkImgDraft+'').val(),
													select_width		: '', 
													select_height		: '',
													select_animduration	: '', 
													select_animspeed	: '',
													select_navigation	: '',
													select_bullet		: '',
													select_usecaptions	: '',
													select_hoverpause	: '',
													select_randomstart	: '',
													select_responsive	: ''
												};
							var objImgSldInsert = dataImgSldInsert;
							imgSldInsert.push(objImgSldInsert);
							//console.log('imgSldInsert '+imgSldInsert);
						}
					} //END FOR
					
					$.ajax({
						url: url_imgSld_insert,
						type: "POST",
						data: {arrImgSldInsert : imgSldInsert},
					}) // END INSERT ALL CHANGE //
					.done(function(data){
						
					/*//////////////////////////////////////
					 * INSERT & UPDATE (PART UPDATE)
					/*//////////////////////////////////////
					
						imgSldUpdate 		= [];
						
						var dataImgSldUpdate = {select_id			: '1',
												select_imgurl		: '',
												select_linkurl 		: '',
												select_width		: $('#imgSlideLeftSettingMenu-sizeW input').val(), 
												select_height		: $('#imgSlideLeftSettingMenu-sizeH input').val(),
												select_animduration	: $('#imgSlideLeftSettingMenu-sizeAnimduration input').val(), 
												select_animspeed	: $('#imgSlideLeftSettingMenu-sizeAnimspeed input').val(),
												select_navigation	: $('#imgSlideLeftSettingMenu-sizeNavi').val(),
												select_bullet		: $('#imgSlideLeftSettingMenu-sizeBull').val(),
												select_usecaptions	: $('#imgSlideLeftSettingMenu-sizeUsec').val(),
												select_hoverpause	: $('#imgSlideLeftSettingMenu-sizeHove').val(),
												select_randomstart	: $('#imgSlideLeftSettingMenu-sizeRand').val(),
												select_responsive	: $('#imgSlideLeftSettingMenu-sizeResp').val()
											};
						var objImgSldUpdate = dataImgSldUpdate;
						imgSldUpdate.push(objImgSldUpdate);
						
						$.ajax({
							url: url_imgSld_update,
							type: "POST",
							data: {arrImgSldUpdate : imgSldUpdate},
						}) // END UPDATE ALL CHANGE //
						.done(function(data){
							select2nd();
						}) // END DONE UPDATE ALL CHANGE //
						.fail(function(data){
							alert('FAIL \nSAVE ALL CHANGE \nUPDATE \nTMT.IMGSLIDE');
						}); // END FAIL UPDATE ALL CHANGE //
						
					}) // END DONE INSERT ALL CHANGE //
					.fail(function(data){
						alert('FAIL \nSAVE ALL CHANGE \nUPDATE & INSERT PART INSERT \nTMT.IMGSLIDE');
					}); // END FAIL UPDATE ALL CHANGE //
				

		}
	});
	
}); // END JQUERY READY //