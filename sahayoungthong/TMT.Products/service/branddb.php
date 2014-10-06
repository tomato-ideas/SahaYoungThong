<?php
/*
 * tmt multilang fix plugin (Service database select)
 *
 */
require_once('../../../../../wp-config.php');

//echo get_template_directory_uri();
$name = $_REQUEST['bname'];
$type = $_REQUEST['btype'];
$pic = $_REQUEST['bpic'];
$dko = explode("/",$pic);
$now = date("Y-m-d H:i:s");
$sowhat = $dko[6]."/".$dko[7]."/".$dko[8];
//http://visarut.tomatohub.info/sahayoungthong/wp-content/uploads/2014/09/img3.jpg 
$qlo = "INSERT INTO wp_brand(brand_name,brand_type,brand_picture,create_date,create_by) VALUES ('$name','$type','$sowhat','$now','admin')";
$sqp = mysql_query($qlo);
if($sqp){
	echo "1";
}else{
	echo $sqp;
}
?>