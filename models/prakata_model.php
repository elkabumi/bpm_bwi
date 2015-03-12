<?php


function read_id(){
	$query 	= mysql_query("select * FROM prakata");
	$result = mysql_fetch_object($query);
	return $result;
}


function update($data, $id){
	mysql_query("update prakata set ".$data." where prakata_id  = '$id'");
}


?>