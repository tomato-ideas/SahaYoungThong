<?php

/*
 * tmt multilang fix plugin (Service database select)
 *
 */

require_once('../../../../../wp-config.php');
//require_once('../../../../wp-includes/wp-db.php');

//$idx	=	$_POST['ID'];
$idx	=	1;

$sql = 'SELECT * FROM '.TMTMEMBERS_DB_TABLE.' WHERE ID = '.$idx.'';
    $qr=mysql_query($sql);
	$rs=mysql_fetch_array($qr);
	$json_data[]=array(
		"id"=>$rs['ID'],
		"userPhone"=>$rs['user_phone'],
		"userIdCard"=>$rs['user_id_card'],
		"userAddress"=>$rs['user_address']
	);	
	
$json= json_encode($json_data);
echo $json;
//echo $rs;
?>