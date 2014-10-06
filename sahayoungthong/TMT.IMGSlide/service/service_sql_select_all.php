<?php

/*
 * TMT Members Theme Function (Service database select)
 * sql select all.
 *
 */

require_once('../../../../../wp-config.php');
//require_once('../../../../wp-includes/wp-db.php');

$sql = 'SELECT * FROM '.TMTIMGSLD_DB_TABLE;
    $qr=mysql_query($sql);
    while($rs=mysql_fetch_array($qr)){
	$json_data[]=array(
		"select_id"=>$rs['idx'],
		"select_imgurl"=>$rs['imgurl'],
		"select_linkurl"=>$rs['linkurl'],
		"select_width"=>$rs['width'],
		"select_height"=>$rs['height'],
		"select_animduration"=>$rs['animduration'],
		"select_animspeed"=>$rs['animspeed'],
		"select_navigation"=>$rs['navigation'],
		"select_bullet"=>$rs['bullet'],
		"select_usecaptions"=>$rs['usecaptions'],
		"select_hoverpause"=>$rs['hoverpause'],
		"select_randomstart"=>$rs['randomstart'],
		"select_responsive"=>$rs['responsive'],
	);	
}
//echo $sql;
$json= json_encode($json_data);
echo $json;

?>