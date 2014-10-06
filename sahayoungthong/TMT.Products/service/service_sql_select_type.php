<?php

/*
 * tmt multilang fix plugin (Service database select)
 *
 */

require_once('../../../../../wp-config.php');
//require_once('../../../../wp-includes/wp-db.php');

$idx	=	$_POST['id'];
//$idx	=	1;

$sql = 'SELECT * FROM wp_product WHERE pd_type = '.$idx.'';
    $qr=mysql_query($sql);
	while($rs=mysql_fetch_array($qr)){

		$sql3 = 'SELECT recommend_id FROM wp_type WHERE type_id = '.$rs['pd_type'].'';
	    $qr3=mysql_query($sql3);
		$rs3=mysql_fetch_array($qr3);
		$sko = $rs3['recommend_id'];

		if($sko == $rs['pd_id']){
			$json_data[]=array(
				"id"=>$rs['pd_id'],
				"pd_code"=>$rs['pd_code'],
				"select"=>'1'
			);
		}else{
			$json_data[]=array(
				"id"=>$rs['pd_id'],
				"pd_code"=>$rs['pd_code'],
				"select"=>'0'
			);
		}	
	}
$json= json_encode($json_data);
echo $json;
//echo $rs;
?>