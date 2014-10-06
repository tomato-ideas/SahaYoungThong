<?php
require_once('../../../../../wp-config.php');


$search	=	trim($_POST['searchtext']);
$sort = $_POST['sortf'];
if($sort == 0){ $sqlsort = ""; }else{ $sqlsort = "WHERE brand_type = '$sort'"; $sqlsortnow = "AND brand_type = '$sort'"; }

if($search == ''){
		$sql = "SELECT * FROM wp_brand $sqlsort";
}else{	
		$sql = "SELECT * FROM wp_brand WHERE brand_name LIKE '%$search%' $sqlsortnow";
}
    //$sql = "SELECT * FROM wp_product $sqlsort";
    $qr=mysql_query($sql);
	while($rs=mysql_fetch_array($qr)){

	$sql3 = 'SELECT type_name,type_id FROM wp_type WHERE type_id = '.$rs['brand_type'].'';
    $qr3=mysql_query($sql3);
	$rs3=mysql_fetch_array($qr3);

	$json_data[]=array(
		"id"=>$rs['brand_id'],
		"brand_name"=>$rs['brand_name'],
		"brand_type_id"=>$rs3['type_id'],
		"brand_type"=>$rs3['type_name'],
		"brand_pic"=>$rs['brand_picture'],
		"create_date"=>$rs['create_date']			
	);	
    }
//$json_data[]=array("id"=>$sql);
$json= json_encode($json_data);
echo $json;
?>