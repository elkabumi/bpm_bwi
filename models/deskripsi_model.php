<?php


function read_id(){
	$query 	= mysql_query("select * FROM deskripsi");
	$result = mysql_fetch_object($query);
	return $result;
}


function update($data, $id){
	mysql_query("update deskripsi set ".$data." where deskripsi_id  = '$id'");
}


?>