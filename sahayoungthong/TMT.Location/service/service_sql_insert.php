<?php

/*
 * TMT IMG Slide Function (Service database insert)
 * sql insert data.
 *
 */
 
require_once('../../../../../wp-config.php');

$imgSldInsert = $_POST['arrMembersInsert'];
$th=mktime(gmdate("H")+7,gmdate("i"),gmdate("m"),gmdate("d"),gmdate("Y"));
$format="Y-m-d H:i:s";
 
$now=date($format,$th);
reset($imgSldInsert);
foreach($imgSldInsert as $ArrIS)
{
   $wpdb->insert('wp_location',array('lct_title_th' => $ArrIS['ti_th'],
									  'lct_title_en' => $ArrIS['ti_en'], 
									  'lct_description_th'=> $ArrIS['de_th'],
									  'lct_description_en'=> $ArrIS['de_en'],
									  'create_date'=> $now,
									  'lct_picture'=> $ArrIS['picture'],
									  'lat'=>$ArrIS['lat'],
									  'long'=>$ArrIS['llong'],
									  'zoom'=>$ArrIS['zzoom'] 
									  ), 
									  array('%s','%s','%s','%s','%s','%s','%s','%s','%s') );
}
// $wpdb->insert( $table, $data, $format );
// Format values: %s as string; %d as integer (whole number); and %f as float. (See below for more information.)

mysql_query( $wpdb );

if( mysql_error() )
{
  echo '<br>Could not enter data: '.mysql_error();
}


?>
