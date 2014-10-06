<?php
	//echo 1;
	//global $wpdb;
	require_once('../../../../../wp-config.php');
	$search = trim($_REQUEST['searchtext']);
	$fill = $_REQUEST['filter'];
	$cat = $_REQUEST['cate'];
    $sortby = $_REQUEST['sortby'];
    $order = $_REQUEST['order'];
    
	if($search == ''){
			if($sortby == 'brand_id'){
				if($cat > 0){  
					$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_brand AS p on p.brand_id = m.brand_id WHERE m.pd_type = $cat ORDER BY p.brand_name $order";
				}else{
					$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_brand AS p on p.brand_id = m.brand_id ORDER BY p.brand_name $order ";
				}
			}else if($sortby == 'pd_type'){
				if($cat > 0){
					$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_type AS p on p.type_id = m.pd_type WHERE m.pd_type = $cat ORDER BY p.type_name $order ";	
				}else{
					$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_type AS p on p.type_id = m.pd_type  ORDER BY p.type_name $order";
				}	
			}else{
				if($cat > 0){ $sql = "SELECT * FROM wp_product WHERE pd_type = $cat ORDER BY  $sortby $order ";
				}else{ $sql = "SELECT * FROM wp_product ORDER BY $sortby $order "; }
			}
	}else{		

		if($fill == 'ALL'){ 
			if($sortby == 'pd_type'){
			$sqw = "(m.pd_code LIKE '%$search%' OR b.brand_name LIKE '%$search%')";}else{
			$sqw = "(m.pd_code LIKE '%$search%' OR p.brand_name LIKE '%$search%')";	
			}

		}else if($fill == 'pd_code'){
			$sqw = "m.pd_code LIKE '%$search%' "; 
		}else if($fill == 'brand'){
			if($sortby == 'pd_type'){
			$sqw = "b.brand_name LIKE '%$search%'"; }else{
			$sqw = "p.brand_name LIKE '%$search%'";
			}
		}

		if($sortby != ''){
			if($sortby == 'brand_id'){
				if($cat > 0){  
					$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_brand AS p on p.brand_id = m.brand_id WHERE m.pd_type = $cat AND $sqw ORDER BY p.brand_name $order";
				}else{
					$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_brand AS p on p.brand_id = m.brand_id WHERE  $sqw ORDER BY p.brand_name $order ";
				}
			}else if($sortby == 'pd_type'){
				if($fill != 'pd_code'){
					if($cat > 0){
						$sql = "SELECT m.* FROM wp_product AS m LEFT OUTER JOIN wp_type AS p ON (p.type_id = m.pd_type)LEFT OUTER JOIN wp_brand AS b ON (b.brand_id = m.brand_id) 
						WHERE m.pd_type = $cat AND $sqw ORDER BY p.type_name $order ";
						//$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_type AS p on p.type_id = m.pd_type WHERE m.pd_type = $cat $sqw ORDER BY p.type_name $order ";	
					}else{
						$sql = "SELECT m.* FROM wp_product AS m LEFT OUTER JOIN wp_type AS p ON (p.type_id = m.pd_type)LEFT OUTER JOIN wp_brand AS b ON (b.brand_id = m.brand_id)
						WHERE  $sqw ORDER BY p.type_name $order";
					}	
				}else{
					if($cat > 0){
						$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_type AS p on p.type_id = m.pd_type WHERE m.pd_type = $cat AND $sqw ORDER BY p.type_name $order ";	
					}else{
						$sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_type AS p on p.type_id = m.pd_type WHERE  $sqw ORDER BY p.type_name $order";
					}
				}
			}else{
				if($fill != 'pd_code'){
					if($cat > 0){ $sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_brand AS p on p.brand_id = m.brand_id WHERE m.pd_type = $cat AND $sqw ORDER BY  $sortby $order ";
					}else{ $sql = "SELECT  m.* FROM wp_product AS m  INNER JOIN wp_brand AS p on p.brand_id = m.brand_id WHERE $sqw ORDER BY $sortby $order "; }
				}else{
					if($cat > 0){ $sql = "SELECT * FROM wp_product AS m WHERE pd_type = $cat AND $sqw ORDER BY  $sortby $order ";
					}else{ $sql = "SELECT * FROM wp_product AS m WHERE $sqw ORDER BY $sortby $order "; }
				}
			}
		}
	}
	//echo $sql;
	$qr=mysql_query($sql);
	while($rs=mysql_fetch_array($qr)){

		$sql2 = 'SELECT brand_name,brand_id FROM wp_brand WHERE brand_id = '.$rs['brand_id'].'';
	    $qr2=mysql_query($sql2);
		$rs2=mysql_fetch_array($qr2);

		$sql3 = 'SELECT type_name,type_id FROM wp_type WHERE type_id = '.$rs['pd_type'].'';
	    $qr3=mysql_query($sql3);
		$rs3=mysql_fetch_array($qr3);

		$json_data[]=array(
			"id"=>$rs['pd_id'],
			"pd_code"=>$rs['pd_code'],
			"brandName"=>$rs2['brand_name'],
			"pd_price"=>$rs['pd_price'],
			"pd_picture"=>$rs['pd_picture'],
			"pd_type"=>$rs3['type_name'],
			"pd_front"=>$rs['pd_front'],
			"pd_series"=>$rs['pd_series'],
			"pd_pan_wheels"=>$rs['pd_pan_wheels'],
			"create_date"=>$rs['create_date']
		);	
	}
//$json_data[]=array(	"id" => $sql );	
$json= json_encode($json_data);
echo $json;
	//echo json_encode($result);
?>