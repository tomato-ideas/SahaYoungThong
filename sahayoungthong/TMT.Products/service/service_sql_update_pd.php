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
	$dko = explode("/",$ArrUD['productPic']);
	$sowhat = $dko[6]."/".$dko[7]."/".$dko[8];
    $wpdb->update('wp_product',array(	'pd_code' => $ArrUD['pd_code'],
    									'pd_price' => $ArrUD['pd_price'],
										'brand_id' => $ArrUD['pd_brand'], 
										'pd_type'=> $ArrUD['pd_type'],
										'pd_front'=> $ArrUD['pd_front'],
										'pd_series'=> $ArrUD['pd_series'],
										'pd_pan_wheels'=> $ArrUD['pd_wheel'],
										'pd_description_th'=> $ArrUD['productDesTH'],
										'pd_description_en'=> $ArrUD['productDesEN'],
										'pd_detail_th'=> $ArrUD['productDetTH'],
										'pd_detail_en'=> $ArrUD['productDetEN'],
										'pd_tb_img'=> $ArrUD['productDetPic'],
										'pd_picture'=> $sowhat,
										'update_date'=> $now
									), 
									array('pd_id' => $ArrUD['id']),
									array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') );
												
												
}
// $wpdb->insert( $table, $data, $format );
// Format values: %s as string; %d as integer (whole number); and %f as float. (See below for more information.)

mysql_query( $wpdb );

if( mysql_error() )
{
  echo '<br>Could not enter data: '.mysql_error();
}


?>