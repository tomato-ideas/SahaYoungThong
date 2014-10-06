<?php

/*
 * TMT Members Function (Service database remove)
 * sql remove data.
 *
 */
 
require_once('../../../../../wp-config.php');
	//require_once('../../../../wp-includes/wp-db.php');
	
	/* $rmv	=	1; */
	$rmv	=	$_POST['ID'];
	
	$delsql = 'DELETE from wp_product WHERE pd_id = '.$rmv.';';
			$delete = $wpdb->query($delsql);
	if($delete)
	{
		echo "Delete Complete";
	}
	else
	{
		echo "Error Delete";
	}			
	/* 	echo "Remove Complete !!"; */


?>
