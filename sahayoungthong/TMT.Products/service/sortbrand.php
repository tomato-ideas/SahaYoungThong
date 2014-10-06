<?php
/*
 * tmt multilang fix plugin (Service database select)
 *
 */
//echo "fail";
require_once('../../../../../wp-config.php');

$key = $_REQUEST['bkk'];

if($key == 0){
$sql = "SELECT * FROM wp_brand";
}else{
$sql = "SELECT * FROM wp_brand WHERE brand_type = '$key'";
}
$query = mysql_query($sql);
$numrow = mysql_num_rows($query);
if($numrow > 0){
	while($result = mysql_fetch_array($query)){
		echo "<tr>";
			echo "<td>".$result['brand_id']."</td>";
			echo "<td>".$result['brand_name']."</td>";
			$solo =  $result['brand_type'];
			$sql2 = "SELECT type_name FROM wp_type WHERE type_id = $solo";
			$query2 = mysql_query($sql2);
			$result2 = mysql_fetch_array($query2);
			echo "<td>".$result2['type_name']."</td>";
			echo "<td>".$result['brand_picture']."</td>";
			echo "<td>".$result['create_date']."</td>";
			echo "<td style='text-align:center;'><button id='brandAddBt' onclick='toeditb(".$result['brand_id'].")' >Edit</button>
			<button id='brandAddBt' onclick='todelb(".$result['brand_id'].")' >Delete</button></td>";
		echo "</tr>";
	}
}else{
	echo "<tr>";
			echo "<td colspan='5' align='center'> Not Found. </td>";
	echo "</tr>";
}

	






?>