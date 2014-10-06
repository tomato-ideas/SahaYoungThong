<?php

/*
 * TMT IMG Slide Function (Service database update)
 * sql update data.
 *
 */
 
require_once('../../../../../wp-config.php');

$imgSldUpdate = $_POST['arrloUpdate'];

reset($imgSldUpdate);
foreach($imgSldUpdate as $ArrIS)
{
    $wpdb->update('wp_location',array('lct_title_th' => $ArrIS['ti_th'],
												  'lct_title_en' => $ArrIS['ti_en'], 
												  'lct_description_th'=> $ArrIS['de_th'],
												  'lct_description_en'=> $ArrIS['de_en'],
												  'lct_picture'=> $ArrIS['picture'],
												  'lat'=>$ArrIS['lat'],
												  'long'=>$ArrIS['llong'],
												  'zoom'=>$ArrIS['zzoom']
												), 
												array('lct_id' => $ArrIS['select_id']),
												array('%s','%s','%s','%s','%s','%s','%s','%s') );
}
// $wpdb->insert( $table, $data, $format );
// Format values: %s as string; %d as integer (whole number); and %f as float. (See below for more information.)

mysql_query( $wpdb );

if( mysql_error() )
{
  echo '<br>Could not enter data: '.mysql_error();
}


?>