<?php

/*
 * tmt multilang fix plugin (Service database select)
 *
 */

require_once('../../../../../wp-config.php');
//require_once('../../../../wp-includes/wp-db.php');

//$idx	=	$_POST['ID'];
$idx	=	1;

$sql = 'SELECT * FROM '.TMTHIGHLIGHT_DB_TABLE.' WHERE idx = '.$idx.'';
    $qr=mysql_query($sql);
	$rs=mysql_fetch_array($qr);
	$json_data[]=array(
		"id"=>$rs['idx'],
		"select_tt_th"=>$rs['title_th'],
		"select_tt_en"=>$rs['title_en'],
		"select_des_th"=>$rs['description_th'],
		"select_des_en"=>$rs['description_en'],
		"select_link"=>$rs['linkurl'],
		"select_img"=>$rs['imgurl'],
	);	
	
$json= json_encode($json_data);
echo $json;
//echo $rs;
?>