<?php

/*
 * TMT MultiLang Theme Function (2nd title multilang for theme)
 * 2nd title page post multilang.
 *
 */
 
function ui_the_title($id){
	global $wpdb;
	$mylink = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE  ID = $id ");
	foreach($mylink as $row){ 
		echo $row->post_title_tmt;
	}
}
?>