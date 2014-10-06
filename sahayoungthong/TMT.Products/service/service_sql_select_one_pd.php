<?php

/*
 * tmt multilang fix plugin (Service database select)
 *
 */

require_once('../../../../../wp-config.php');
//require_once('../../../../wp-includes/wp-db.php');

$idx	=	$_POST['ID'];
//$idx	=	1;

$sql = 'SELECT * FROM wp_product WHERE pd_id = '.$idx.'';
    $qr=mysql_query($sql);
	$rs=mysql_fetch_array($qr);

	$sql2 = 'SELECT brand_name,brand_id FROM wp_brand WHERE brand_id = '.$rs['brand_id'].'';
    $qr2=mysql_query($sql2);
	$rs2=mysql_fetch_array($qr2);

	$sql3 = 'SELECT type_name,type_id FROM wp_type WHERE type_id = '.$rs['pd_type'].'';
    $qr3=mysql_query($sql3);
	$rs3=mysql_fetch_array($qr3);

	$json_data[]=array(
		"id"=>$rs['pd_id'],
		"pd_code"=>$rs['pd_code'],
		"brandId"=>$rs2['brand_id'],
		"brandName"=>$rs2['brand_name'],
		"pd_price"=>$rs['pd_price'],
		"pd_picture"=>$rs['pd_picture'],
		"pd_type_id"=>$rs3['type_id'],
		"pd_type"=>$rs3['type_name'],
		"pd_front"=>$rs['pd_front'],
		"pd_series"=>$rs['pd_series'],
		"pd_pan_wheels"=>$rs['pd_pan_wheels'],
		"pd_tb_img"=>$rs['pd_tb_img'],
		"pd_description_th"=>$rs['pd_description_th'],
		"pd_description_en"=>$rs['pd_description_en'],
		"pd_detail_th"=>$rs['pd_detail_th'],
		"pd_detail_en"=>$rs['pd_detail_en']
	);	
	
$json= json_encode($json_data);
echo $json;
//echo $rs;
?>