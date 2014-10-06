<?php

/*
 * TMT IMG Slide Function (Service database update)
 * sql update data.
 *
 */
 
require_once('../../../../../wp-config.php');

$imgSldUpdate = $_POST['arrImgSldUpdate'];

reset($imgSldUpdate);
foreach($imgSldUpdate as $ArrUD)
{
    $wpdb->update(''.TMTIMGSLD_DB_TABLE.'',array('imgurl' => $ArrUD['select_imgurl'],
												'linkurl' => $ArrUD['select_linkurl'], 
												'width'=> $ArrUD['select_width'],
												'height'=> $ArrUD['select_height'],
												'animduration'=> $ArrUD['select_animduration'],
												'animspeed'=> $ArrUD['select_animspeed'],
												'navigation'=> $ArrUD['select_navigation'],
												'bullet'=> $ArrUD['select_bullet'],
												'usecaptions'=> $ArrUD['select_usecaptions'],
												'hoverpause'=> $ArrUD['select_hoverpause'],
												'randomstart'=> $ArrUD['select_randomstart'],
												'responsive'=> $ArrUD['select_responsive'] 
												), 
												array('idx' => $ArrUD['select_id']),
												array('%s','%s','%d','%d','%d','%d','%s','%s','%s','%s','%s','%s') );
}
// $wpdb->insert( $table, $data, $format );
// Format values: %s as string; %d as integer (whole number); and %f as float. (See below for more information.)

mysql_query( $wpdb );

if( mysql_error() )
{
  echo '<br>Could not enter data: '.mysql_error();
}


?>