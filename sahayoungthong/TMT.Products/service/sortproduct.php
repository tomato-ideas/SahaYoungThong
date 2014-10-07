<?php
/*
 * tmt multilang fix plugin (Service database select)
 *
 */
//echo "fail";
require_once('../../../../../wp-config.php');

$key = $_REQUEST['bkk'];

if($key == 0){
$sql = "SELECT * FROM wp_product";
}else{
$sql = "SELECT * FROM wp_product WHERE pd_type = '$key'";
}
$query = mysql_query($sql);
$numrow = mysql_num_rows($query);
if($numrow > 0){
	while($result = mysql_fetch_array($query)){
		echo "<tr>";
		    echo "<td style='text-align:center;'>".$result['pd_id']."</td>";
		    if($result['pd_picture'] == '//' || $result['pd_picture'] == ''){
			    echo "<td class='imgThbAll'></td>";
		    }else{
			    echo "<td class='imgThbAll'><img src='../wp-content/uploads/".$result['pd_picture']."'></td>";
		    }
			echo "<td>".$result['pd_code']."</td>";
				$solo3 =  $result['brand_id'];
				$sql3 = "SELECT brand_name FROM wp_brand WHERE brand_id = $solo3";
				$query3 = mysql_query($sql3);
				$result3 = mysql_fetch_array($query3);
			echo "<td>".$result3['brand_name']."</td>";
				$solo =  $result['pd_type'];
				$sql2 = "SELECT type_name FROM wp_type WHERE type_id = $solo";
				$query2 = mysql_query($sql2);
				$result2 = mysql_fetch_array($query2);
			echo "<td>".$result2['type_name']."</td>";
			echo "<td>".$result['pd_front']."</td>";
			echo "<td>".$result['pd_series']."</td>";
			echo "<td>".$result['pd_pan_wheels']."</td>";
			echo "<td>".$result['pd_price']."</td>";
			echo "<td>".$result['create_date']."</td>";
			echo "<td style='text-align:center;'><button id='productAddBt' onclick='toedit(".$result['pd_id'].")' >Edit</button>
			<button id='productAddBt' onclick='todel(".$result['pd_id'].")' >Delete</button></td>";
		echo "</tr>";
	}
}else{
	echo "<tr>";
			echo "<td colspan='10' align='center'> Not Found. </td>";
	echo "</tr>";
}

	






?>