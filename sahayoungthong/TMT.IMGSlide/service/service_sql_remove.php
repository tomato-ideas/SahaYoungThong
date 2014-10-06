<?php

/*
 * TMT IMG Slide Function (Service database remove)
 * sql remove data.
 *
 */
 
require_once('../../../../../wp-config.php');
	//require_once('../../../../wp-includes/wp-db.php');
	
	/* $rmv	=	1; */
	$rmv	=	$_POST['ID'];
	
	$delsql = 'DELETE from '.TMTIMGSLD_DB_TABLE.' WHERE idx = '.$rmv.';';
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
