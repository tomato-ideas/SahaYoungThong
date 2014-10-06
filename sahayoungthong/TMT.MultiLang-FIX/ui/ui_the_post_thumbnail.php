<?php

/*
 * TMT MultiLang Theme Function (2nd post_thumbnail multilang for theme)
 * 2nd post thumbnail page post multilang.
 *
 */
 
function ui_the_post_thumbnail($id){
	global $wpdb;
	$mylink = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE  ID = $id ");
	foreach($mylink as $row){
	$chk = $row->fea2nd_img_tmt;
	if($chk !== ''){	
		?> <img src="<?php echo $row->fea2nd_img_tmt; ?>" class="attachment-post-thumbnail wp-post-image" alt="-1"> <?php
	}else{}
	}
}
?>