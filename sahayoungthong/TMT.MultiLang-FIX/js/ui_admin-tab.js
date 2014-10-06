/*
 * TMT MultiLang Theme Function (Generator tab menu for page & post)
 * generator tab menu.
 *
 */
/* $jq = jQuery.noConflict(true); */
jQuery(document).ready(function($) {
	var post_id = $('#post_ID').val();
	//var post_ids = parseInt(post_id) - parseInt(1);

/*//////////////////////////////////////
 * GEN TAB
/*//////////////////////////////////////
	var chk = $('.wrap h2').text();
	if(chk == 'Edit Post Add New' || chk == 'Edit Page Add New' || chk == 'Add New Post' || chk == 'Add New Page'){
	var bloginfo_vars = {"langs":[["th","Thai"],["en","English"]],"default_str":"Default"}
	if( $('#post-body-content')){
		$('#post-body-content').before('<div id="bloginfo-tabs"></div>');
		$('#bloginfo-tabs').prepend('<div class="tabs-nav"><ul></ul></div>');
		// 
		for(i = 0; i < bloginfo_vars['langs'].length;i++){
			if( i == 0 ) $('#bloginfo-tabs .tabs-nav ul').append('<li><a href="#bloginfo-tab-'+ bloginfo_vars['langs'][i][0]+'" id="'+ bloginfo_vars['langs'][i][0]+'">' + bloginfo_vars['langs'][i][1] + '<span class="default-label"> ( ' + bloginfo_vars['default_str'] + ' )</span></a></li>');
			else $('#bloginfo-tabs .tabs-nav ul').append('<li><a href="#bloginfo-tab-'+ bloginfo_vars['langs'][i][0]+'" id="'+ bloginfo_vars['langs'][i][0]+'">' + bloginfo_vars['langs'][i][1] + '</a></li>');
			$('#bloginfo-tabs').append('<div id="bloginfo-tab-' + bloginfo_vars['langs'][i][0] + '"><table class="form-table"></table></div>');
			if( i == 0) {
				var blog_content1 = $('#post-body-content').detach();
				$('#bloginfo-tab-' + bloginfo_vars['langs'][i][0] + ' table').append(blog_content1);
			}else{
				var blog_content2 = $('#wp-secondEditor'+ post_id +'-wrap').detach();   
				$('#bloginfo-tab-' + bloginfo_vars['langs'][i][0] + ' table').append(blog_content2);
				
				
/*//////////////////////////////////////
 * GEN FEATURE IMAGES
/*//////////////////////////////////////
			$('#featured2nd').hide();
			$('#postimagediv').show();
			
			$('#th').click(function(){
			
				$('#featured2nd').hide();
				$('#postimagediv').show();
			});
			
			$('#en').click(function(){
			
				$('#featured2nd').show();
				$('#postimagediv').hide();
			});				
						
/*//////////////////////////////////////
 * GEN FEATURE IMAGES
/*//////////////////////////////////////
				$('.fea2nd_remove').hide();
				$('.fea2nd_upload').click(function() {
				    //e.preventDefault();
				
				    var fea2nd = wp.media({
				        title: 'Set Featured Image',
				        button: {
				            text: 'Set featured image'
				        },
				        multiple: false  // Set this to true to allow multiple files to be selected
				    })
				    .on('select', function() {
				        var attachment = fea2nd.state().get('selection').first().toJSON();
				        $('.fea2nd_image').show();
				        $('.fea2nd_image').attr('src', attachment.url);
				        $('.fea2nd_url').val(attachment.url);
				        $('.fea2nd_chk').val(attachment.url);
				        $('.fea2nd_id').val(attachment.id);
				        $(this).closest('div');
				        $('.fea2nd_upload, .fea2nd_remove').toggle();
				        //console.log(attachment);
				        //console.log(attachment.editLink);
				    })
				    .open()
				});
				
				$('.fea2nd_remove').click(function () {
				     //e.preventDefault();
				     
				    $('.fea2nd_image').attr('src', '').hide();
				    $('.fea2nd_id').val('');
				    $(this).closest('div');
				    $('.fea2nd_upload, .fea2nd_remove').toggle();
				});

			
/*//////////////////////////////////////
 * GET JSON
/*//////////////////////////////////////
				$.ajax({ 
				url: url_select_one_mtlf,
				type: "POST",
				data: { 'ID': post_id},
				dataType: 'json',
				success: function(data) 
				{
				
				var blog_title = ('<div id="titlediv"><div id="titlewrap"><label class="screen-reader-text" id="title-prompt-text" for="title">Enter title here</label><input type="text" name="edit_post_title_'+ post_id +'" size="30" class="title'+ post_id +'" value="'+ data[0].postTitleTmt +'" id="title" autocomplete="off"><div id="edit-slug-box" class="hide-if-no-js"></div></div></div>')     		
				$('#wp-secondEditor'+ post_id +'-wrap').before(blog_title);			
				//$('#secondEditor'+ post_id +'_ifr').contents().find('#tinymce').html(data[0].postContentTmt);
				$('#fea2nd_'+ post_id).attr('src', data[0].fea2ndTmt);


/*//////////////////////////////////////
 * CHECK IMG FEA 2ND
/*//////////////////////////////////////
				if( $('#fea2nd_'+ post_id).attr('src') !== '' ){
					$('.fea2nd_upload').hide();
					$('.fea2nd_remove').show();
				}
				
				
/*//////////////////////////////////////
 * CSS EDITOR FORM ID
/*//////////////////////////////////////
				$('#wp-secondEditor'+ post_id +'-wrap').css( "margin-bottom", "20px" );
				$('#secondEditor'+ post_id +'_toolbar1').css( "margin-top", "2px" );
				}
				});	// END GETJSON //			
				
			}	// END ELSE //
		} // END FOR I //
	}	// END IF //
	$('#bloginfo-tabs').tabs();

/*//////////////////////////////////////
 * SAVE
/*//////////////////////////////////////
	$('#publish').mousedown(function(){
	
	var postTitleTmt = $('.title'+ post_id).val();
	var fea2ndTmt = $('#fea2nd_'+ post_id).attr('src');
	var clear0 = $('#secondEditor'+ post_id +'_ifr').contents().find('#tinymce').html();
	clearA = clear0.replace(/<\/p>+/g,' ');
	clearB = clearA.replace(/<p>+/g,' ');
	postContentTmt = clearB.replace(/&nbsp;+/g,' ');
	//var postContentTmt = $('#secondEditor7_ifr').css("background-color", "red");
	//alert(postContentTmt);
	
	var request = jQuery.ajax({
		url: url_update_mtlf,
		type: "POST",
		data: { ID: post_id, post_title_tmt: postTitleTmt, post_content_tmt: postContentTmt, fea2nd_img_tmt: fea2ndTmt}
		});	
	
/* 	console.log('test'); */
/* 	alert('success');	 */
	
	}); // END SAVE //	
	}else if(chk == 'Edit Media Add New'){
		$('#wp-secondEditor'+post_id+'-wrap').hide();
	}else{}
});
