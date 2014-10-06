<?php

/*
 * TMT Members Function (Service database update)
 * sql update data.
 *
 */
 
require_once('../../../../../wp-config.php');

$membersUpdate = $_POST['arrMembersUpdate'];
$now = date("Y-m-d H:i:s");
reset($membersUpdate);
foreach($membersUpdate as $ArrUD)
{
	$dko = explode("/",$ArrUD['br_Pic']);
	$sowhat = $dko[6]."/".$dko[7]."/".$dko[8];
    $wpdb->update('wp_brand',array(	'brand_name' => $ArrUD['br_name'],
    									'brand_type' => $ArrUD['br_type'],
										'brand_picture' => $sowhat
									), 
									array('brand_id' => $ArrUD['id']),
									array('%s','%s','%s') );
												
												
}
// $wpdb->insert( $table, $data, $format );
// Format values: %s as string; %d as integer (whole number); and %f as float. (See below for more information.)

mysql_query( $wpdb );

if( mysql_error() )
{
  echo '<br>Could not enter data: '.mysql_error();
}


?>