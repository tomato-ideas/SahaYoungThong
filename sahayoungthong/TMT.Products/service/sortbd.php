<?php
require_once('../../../../../wp-config.php');


$search	=	$_REQUEST['searchtext'];
$cat = $_REQUEST['cate'];
$sortby = $_REQUEST['sortby'];
$order = $_REQUEST['order'];
	if($cat == 0){ $sqlsort = ""; }else{ $sqlsort = "WHERE brand_type = '$cat'"; $sqlsortbt = "WHERE m.brand_type = '$cat'"; $sqlnoad = "AND m.brand_type = '$cat'"; $sqlsortnow = "AND brand_type = '$cat'"; }
	if($sortby == 'brand_type'){
		if($search == ''){
			$sql = "SELECT  m.* FROM wp_brand AS m  INNER JOIN wp_type AS p on m.brand_type = p.type_id $sqlsortbt ORDER BY p.type_name ".$order."";  
		}else{
			$sql = "SELECT  m.* FROM wp_brand AS m  INNER JOIN wp_type AS p on m.brand_type = p.type_id WHERE m.brand_name LIKE '%$search%'  $sqlnoad ORDER BY p.type_name ".$order.""; 
		}
	}else{
		if($search == ''){
			$sql = "SELECT * FROM wp_brand $sqlsort ORDER BY ".$sortby." ".$order."";  
		}else{
			$sql = "SELECT * FROM wp_brand WHERE brand_name LIKE '%$search%'  $sqlsortnow ORDER BY ".$sortby." ".$order.""; 
		}
	}
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