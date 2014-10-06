<?php

/*
 * TMT IMG Slide Function (Service database insert)
 * sql insert data.
 *
 */
 
require_once('../../../../../wp-config.php');

$imgSldInsert = $_POST['arrImgSldInsert'];

reset($imgSldInsert);
foreach($imgSldInsert as $ArrIS)
{
    $wpdb->insert(''.TMTIMGSLD_DB_TABLE.'',array('imgurl' => $ArrIS['select_imgurl'],
												'linkurl' => $ArrIS['select_linkurl'], 
												'width'=> $ArrIS['select_width'],
												'height'=> $ArrIS['select_height'],
												'animduration'=> $ArrIS['select_animduration'],
												'animspeed'=> $ArrIS['select_animspeed'],
												'navigation'=> $ArrIS['select_navigation'],
												'bullet'=> $ArrIS['select_bullet'],
												'usecaptions'=> $ArrIS['select_usecaptions'],
												'hoverpause'=> $ArrIS['select_hoverpause'],
												'randomstart'=> $ArrIS['select_randomstart'],
												'responsive'=> $ArrIS['select_responsive'] 
												), 
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
<div >
