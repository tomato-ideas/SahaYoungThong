<?php

/*
 * TMT IMG Slide Function (Service database update)
 * sql update data.
 *
 */
 
require_once('../../../../../wp-config.php');

$highlUpdate = $_POST['arrHighlUpdate'];

reset($highlUpdate);
foreach($highlUpdate as $ArrUD)
{
    $wpdb->update(''.TMTHIGHLIGHT_DB_TABLE.'',array('imgurl' => $ArrUD['select_img'],
												'linkurl' => $ArrUD['select_link'], 
												'title_th'=> $ArrUD['select_tt_th'],
												'title_en'=> $ArrUD['select_tt_en'],
												'description_th'=> $ArrUD['select_des_th'],
												'description_en'=> $ArrUD['select_des_en']
												), 
												array('idx' => $ArrUD['select_id']),
												array('%s','%s','%s','%s','%s','%s') );
}
// $wpdb->insert( $table, $data, $format );
// Format values: %s as string; %d as integer (whole number); and %f as float. (See below for more information.)

mysql_query( $wpdb );

if( mysql_error() )
{
  echo '<br>Could not enter data: '.mysql_error();
}


?>