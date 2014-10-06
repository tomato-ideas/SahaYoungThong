/*
 * TMT Shop Theme Function (upload img)
 * admin page upload images gallery.
 * all page admin
 */
 
jQuery().ready(function() {

}); // END JQUERY READY //

/*//////////////////////////////////////
 * UPLOAD IMG (PUT IMG)
/*//////////////////////////////////////

	var upload_img = '';
	
	function send_to_editor(html) {
/* 		console.log('aa'); */
		var imgurl = html.match(/src=\".*\" alt/);
		imgurl = imgurl[0].replace(/^src=\"/, "").replace(/" alt$/, "");
		jQuery('#img_'+upload_img).attr('src', imgurl);
		jQuery('#img_hide_'+upload_img).val(imgurl);
		jQuery('#closeBt').css('display','block');
		tb_remove();
		
		/*//////////////////////////////////////
		 * OVERRIDE FN (PUT IMG)
		/*//////////////////////////////////////
		
		var editor,
			hasTinymce = typeof tinymce !== 'undefined',
			hasQuicktags = typeof QTags !== 'undefined';
	
		if ( ! wpActiveEditor ) {
			if ( hasTinymce && tinymce.activeEditor ) {
				editor = tinymce.activeEditor;
				wpActiveEditor = editor.id;
			} else if ( ! hasQuicktags ) {
				return false;
			}
		} else if ( hasTinymce ) {
			editor = tinymce.get( wpActiveEditor );
		}
	
		if ( editor && ! editor.isHidden() ) {
			editor.execCommand( 'mceInsertContent', false, html );
		} else if ( hasQuicktags ) {
			QTags.insertContent( html );
		} else {
			document.getElementById( wpActiveEditor ).value += html;
		}
		if ( window.tb_remove ) {
			try { window.tb_remove(); } catch( e ) {}
		}
	}
