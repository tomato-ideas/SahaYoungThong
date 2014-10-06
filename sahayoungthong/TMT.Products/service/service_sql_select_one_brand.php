<?php

/*
 * tmt multilang fix plugin (Service database select)
 *
 */

require_once('../../../../../wp-config.php');
//require_once('../../../../wp-includes/wp-db.php');

$idx	=	$_POST['ID'];
//$idx	=	1;

$sql = 'SELECT * FROM wp_brand WHERE brand_id = '.$idx.'';
    $qr=mysql_query($sql);
	$rs=mysql_fetch_array($qr);

	$sql3 = 'SELECT type_name,type_id FROM wp_type WHERE type_id = '.$rs['brand_type'].'';
    $qr3=mysql_query($sql3);
	$rs3=mysql_fetch_array($qr3);

	$json_data[]=array(
		"id"=>$rs['brand_id'],
		"brand_name"=>$rs['brand_name'],
		"brand_type_id"=>$rs3['type_id'],
		"brand_type"=>$rs3['type_name'],
		"brand_pic"=>$rs['brand_picture']			
	);	
	
$json= json_encode($json_data);
echo $json;
//echo $rs;
?>