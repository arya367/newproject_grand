<?php
mysql_connect('localhost','cityfull_newhco','hcodng@123');
mysql_select_db('cityfull_newhcorealestates');

$sql=mysql_query("select id,name from builders where status='active'");
while($fetch=mysql_fetch_array($sql))
{
	echo '"'.$fetch['id'].'":"'.$fetch['name'].'",';
	}

?>
