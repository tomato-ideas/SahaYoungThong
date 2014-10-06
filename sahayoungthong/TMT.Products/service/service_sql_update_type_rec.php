<?php

/*
 * TMT Members Function (Service database update)
 * sql update data.
 *
 */
 
require_once('../../../../../wp-config.php');

$membersUpdate = $_POST['arrTypeUpdate'];
$now = date("Y-m-d H:i:s");
reset($membersUpdate);
foreach($membersUpdate as $ArrUD)
{
	
    $wpdb->update('wp_type',array(	'recommend_id' => $ArrUD['pd_id']), 
									array('type_id' => $ArrUD['id']),
									array('%s') );
												
												
}
// $wpdb->insert( $table, $data, $format );
// Format values: %s as string; %d as integer (whole number); and %f as float. (See below for more information.)

mysql_query( $wpdb );

if( mysql_error() )
{
  echo '<br>Could not enter data: '.mysql_error();
}


?>