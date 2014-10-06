<?php
require_once('../../../../../wp-config.php');


$search	=	trim($_POST['searchtext']);
$filter	=	$_POST['filter'];
$sort = $_POST['sortf'];
if($sort == 0){ $sqlsort = ""; }else{ $sqlsort = "WHERE pd_type = '$sort'"; $sqlsortnow = "AND pd_type = '$sort'"; }
if($search != '' && $filter != 'pd_code'){
	$sql2 = "SELECT brand_id,brand_name FROM wp_brand WHERE brand_name LIKE '%$search%' ";
    $qr2=mysql_query($sql2);
    $numb = mysql_num_rows($qr2);
    if($numb == 0){
    	$brandidx = "";	
    }else{
    	$sol = 1;
		while($rs2=mysql_fetch_array($qr2)){
			if($sol == 1){
				$bidx .= $rs2['brand_id'];	
			}else{
				$bidx .= ",".$rs2['brand_id'];
			}			
			$sol++;
		}
		if($filter == 'ALL'){
			$brandidx = " OR brand_id in(".$bidx.")";
		}else{
			$brandidx = "brand_id in(".$bidx.")";
		}

	}
}

if($search == ''){
		$sql = "SELECT * FROM wp_product $sqlsort";
}else{
	if($filter == 'ALL'){
		$sql = "SELECT * FROM wp_product WHERE (pd_code LIKE '%$search%' $brandidx)  $sqlsortnow";
	}else if($filter == 'pd_code'){	
		$sql = "SELECT * FROM wp_product WHERE  pd_code LIKE '%$search%' $sqlsortnow";
	}else if($filter == 'brand'){	
		$sql = "SELECT * FROM wp_product WHERE $brandidx $sqlsortnow";
	}
}
    //$sql = "SELECT * FROM wp_product $sqlsort";
    $qr=mysql_query($sql);
	$sql3 = "SELECT type_name,type_id FROM wp_type WHERE type_id = '".$rs['pd_type']."'";
    $qr3=mysql_query($sql3);
	$rs3=mysql_fetch_array($qr3);
	while($rs=mysql_fetch_array($qr)){

		$sql3 = "SELECT brand_id,brand_name FROM  wp_brand WHERE brand_id = ".$rs['brand_id']." ";
	    $qr3=mysql_query($sql3);
		$rs3=mysql_fetch_array($qr3);

		$sql4 = "SELECT type_name,type_id FROM wp_type WHERE type_id = ".$rs['pd_type']." ";
	    $qr4=mysql_query($sql4);
		$rs4=mysql_fetch_array($qr4);

		$json_data[]=array(
			"id"=>$rs['pd_id'],
			"pd_code"=>$rs['pd_code'],
			"brandId"=>$rs3['brand_id'],
			"brandName"=>$rs3['brand_name'],
			"pd_price"=>$rs['pd_price'],
			"pd_picture"=>$rs['pd_picture'],
			"pd_type_id"=>$rs4['type_id'],
			"pd_type"=>$rs4['type_name'],
			"pd_front"=>$rs['pd_front'],
			"pd_series"=>$rs['pd_series'],
			"pd_pan_wheels"=>$rs['pd_pan_wheels'],
			"create_date"=>$rs['create_date']
		);
	}	
//$json_data[]=array("id"=>$sql);	
$json= json_encode($json_data);
echo $json;
?>