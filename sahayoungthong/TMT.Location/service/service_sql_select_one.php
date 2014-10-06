<?php

/*
 * tmt multilang fix plugin (Service database select)
 *
 */

require_once('../../../../../wp-config.php');
//require_once('../../../../wp-includes/wp-db.php');

//$idx	=	$_POST['ID'];
$tt = $_POST['tt'];
$te = $_POST['te'];
$dt  = $_POST['dt'];
$de  = $_POST['de'];
$pic =  $_POST['pic'];

$skl = "SELECT lct_id FROM wp_location WHERE lct_title_th LIKE '%$tt%' AND lct_title_en LIKE '%$te%' AND lct_description_th LIKE '%$dt%' AND lct_description_en LIKE '%$de%' AND lct_picture LIKE '%$pic%' ";
//$sql = 'SELECT * FROM '.TMTMEMBERS_DB_TABLE.' WHERE ID = '.$idx.'';
    $qr=mysql_query($skl);
	$rs=mysql_fetch_array($qr);
	$json_data[]=array(
		"id"=>$rs['lct_id']
	);
$json= json_encode($json_data);
echo $json;
//echo $rs;
?>