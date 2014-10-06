<?php

/*
 * TMT MultiLang Theme Function (Service database update)
 * sql update data.
 *
 */
 
require_once('../../../../../wp-config.php');

$idx			=	$_POST['ID'];
$postTitleTmt	=	$_POST['post_title_tmt'];
$postContentTmt	=	$_POST['post_content_tmt'];
$fea2ndTmt		=	$_POST['fea2nd_img_tmt'];

$updatesql = 'UPDATE  '.TMTMULTILANG_DB_TABLE.' set wp_posts.post_title_tmt = "'.$postTitleTmt.'" ,wp_posts.post_content_tmt = "'.$postContentTmt.'" ,wp_posts.post_content_tmt = "'.$postContentTmt.'" ,wp_posts.fea2nd_img_tmt = "'.$fea2ndTmt.'" WHERE wp_posts.ID = "'.$idx.'"';


$updated = $wpdb->query($updatesql);

echo "Update Complete !!";

?>