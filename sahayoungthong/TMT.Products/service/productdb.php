<?php 
/*
 * tmt multilang fix plugin (Service database select)
 *
 */
require_once('../../../../../wp-config.php');

$code = $_REQUEST['pdcode'];
$brand = $_REQUEST['pdbrand'];
$type = $_REQUEST['pdtype'];
$front = $_REQUEST['pdfront'];
$series = $_REQUEST['pdseries'];
$wheel = $_REQUEST['pdwheel'];
$price = $_REQUEST['pdprice'];
$pic = $_REQUEST['pdpic'];
if($front == ''){
   $front = '-';
}
if($series == ''){
	$series = '-';
}
if($wheel == ''){
	$wheel ='-';
}

$tbImg = $_REQUEST['pdtbImg'];
$desTH = $_REQUEST['pddesTH'];
$desEN = $_REQUEST['pddesEN'];
$detTH = $_REQUEST['pddetTH'];
$detEN = $_REQUEST['pddetEN'];

$dko = explode("/",$pic);
$now = date("Y-m-d H:i:s");
$sowhat = $dko[6]."/".$dko[7]."/".$dko[8];
$qlop = "INSERT INTO wp_product(pd_code, brand_id, pd_price, pd_picture, pd_type, pd_front, pd_series, pd_pan_wheels, create_date, create_by, pd_tb_img, pd_description_th, pd_description_en, pd_detail_th, pd_detail_en) 
		VALUES ('$code', '$brand', '$price', '$sowhat', '$type','$front','$series','$wheel','$now','admin','$tbImg','$desTH','$desEN','$detTH','$detEN')";
//echo $qlo;
$sqp = mysql_query($qlop);
if($sqp){
	echo "1";
}else{
	echo $sqp;
}


?>