<?php

/*
 * TMT MultiLang Theme Function (menu tab multilang for Theme)
 * Generator wp_editor for page & post second form.
 *
 */
 
function ui_admin_tab(){
	
	// echo "<p>HELLO</p>";
	$post_id = get_the_ID();
	//$post = get_post( $post_id, ARRAY_A, 'edit' );
	$post = get_post( $post_id, ARRAY_A);
	$contents 	= $post['post_content_tmt'];
	$editor_id 	= 'secondEditor'.$post_id.'';
	$settings = array(
    'media_buttons' => true, // show & hide media button
    );
	//var_dump($content);
	wp_editor( $contents , $editor_id , $settings);

}

?>