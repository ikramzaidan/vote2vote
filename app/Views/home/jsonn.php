<?php
mysql_connect("localhost", "root", "root");
mysql_select_db("aws");
$sql = mysql_query("SELECT * FROM candidates WHERE 'type'='2'");
$result = array();
 
while($row = mysql_fetch_array($sql)){
	array_push($result, array('nama' => $row[2], 'voter' => $row[5]));
}
echo json_encode(array("result" => $result));
?>